var listeImages = [];
var idxImgCourante;

/**
 * Récupère les images présentes sur le serveur
 */
function getImages() {
    var xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			//en cas de succès de la requête, ajoute les images récupérées au DOM du carrousel
            listeImages = JSON.parse(this.responseText);
            $("#carrousel").html("");
            idxImgCourante = 0;
            $("#compteur-images").html(idxImgCourante+1 + "/" + listeImages.length);
            for (i = 0; i < listeImages.length; i++) {
                $("#carrousel").append("<div class=\"img-container\"><img src=\"./img/" + listeImages[i] + "\" alt=\"photo\" /></div>");
            }
            $("#bouton-carrousel-droite").show();
            $("#bouton-carrousel-gauche").hide();
            $("#compteur-images").show();
        }
    }
	//envoi de la requête à php/images.php
	xmlhttp.open("GET", "./php/edit-pages/images.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/json");
	xmlhttp.send();
    
}

$("#bouton-carrousel-droite").on("click", function () {
    idxImgCourante++;
    //se cale sur la position de l'image de manière à afficher celle correspondant à l'index courant et cacher les autres
    if (idxImgCourante >= 0 && idxImgCourante < listeImages.length) {
        var newVal = (idxImgCourante * 100) + "%";
        $(".img-container").css("right", newVal);
    }
    /* Cache le bouton droite si c'est la dernière image */
    if (idxImgCourante + 1 >= listeImages.length) {
        $("#bouton-carrousel-droite").hide();
    }
    /* Montre le bouton gauche en quittant la première image */
    if (idxImgCourante - 1 >= 0) {
        $("#bouton-carrousel-gauche").show();
    }
    //met le compteur à jour 
    $("#compteur-images").html(idxImgCourante+1 + "/" + listeImages.length);
    
});

$("#bouton-carrousel-gauche").on("click", function () {
    idxImgCourante--;
    //se cale sur la position de l'image de manière à afficher celle correspondant à l'index courant et cacher les autres
    if (idxImgCourante >= 0 && idxImgCourante < listeImages.length) {
        var newVal = (idxImgCourante * 100) + "%";
        $(".img-container").css("right", newVal);
    }
    /* Cache le bouton gauche si c'est la première image */
    if (idxImgCourante - 1 < 0) {
        $("#bouton-carrousel-gauche").hide();
    }
    /* Montre le bouton droite en quittant la dernière image */
    if (idxImgCourante + 1 < listeImages.length) {
        $("#bouton-carrousel-droite").show();
    }
    //met le compteur à jour 
    $("#compteur-images").html(idxImgCourante+1 + "/" + listeImages.length);
    
});