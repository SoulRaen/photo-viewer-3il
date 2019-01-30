var listeImages = [];

function image() {
    $.ajax("./php/images.php", {
        contentType: "application/json",
        success: function (donnees, statut, requette) {
            listeImages = donnees;
            var carrousel = $("#carrousel").first();
            for (i = 0; i < listeImages.length; i++) {
                carrousel.innerHTML += "<div class=\"img-container\"><img src=\"./img/" + listeImages[i] + "\" alt=\"photo\" /></div>";
            }
        }
    });
}

$("#bouton-carrousel-droite").on("click", function () {
    var positionPx = $(".img-container").css("right");
    var parentWidthPx = $(".img-container").parent().css("width");
    var positionPxVal = parseInt(positionPx);
    var parentWidthPxVal = parseInt(parentWidthPx);
    //ajoute 100% à la propriété "right" pour décaler les images et changer celle visible
    var newVal = (positionPxVal/parentWidthPxVal * 100 + 100) + "%";
    $(".img-container").css("right", newVal);
});

$("#bouton-carrousel-gauche").on("click", function () {
    var positionPx = $(".img-container").css("right");
    var parentWidthPx = $(".img-container").parent().css("width");
    var positionPxVal = parseInt(positionPx);
    var parentWidthPxVal = parseInt(parentWidthPx);
    //ajoute 100% à la propriété "right" pour décaler les images et changer celle visible
    var newVal = (positionPxVal/parentWidthPxVal * 100 - 100) + "%";
    $(".img-container").css("right", newVal);
});