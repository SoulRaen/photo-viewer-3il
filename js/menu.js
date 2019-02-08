/**
 * Affiche/cache le menu du site (en d�calant le bouton associ�)
 */
function toggleExpand() {
    var largeurMenu = $("nav").css("width");
    if ($("#expand-button").css("left") == "0px") { 
        $("#expand-button").css("opacity", "1.0"); //adapte l'opacit� du bouton
        $("nav").animate({width: "toggle"}, 350); //effet de slide horizontal
        $("#expand-button").animate({left: largeurMenu}, 350); //d�cale le bouton vers la droite
    } else { 
        $("#expand-button").animate({left: "0px"}, 350, "swing", //cale le bouton sur la gauche
        function () {
            $(this).css("opacity", ""); //adapte l'opacit� du bouton apr�s l'animation 
            //supprime la propri�t� � l'int�rieur de l'�l�ment par jQuery pour laisser 
            //la propri�t� du d�finie dans le CSS prendre effet
        }); 
        $("nav").animate({width: "toggle"}, 350); //effet de slide horizontal
    }
}

$(window).resize(function() {
    var largeurMenu = $("nav").css("width");
    if ($(window).width() <= 900) {
        $("nav").hide();
        $("#expand-button").css("left","0px");
    } else {
        $("nav").show();
        $("#expand-button");
        $("#expand-button").css("left", largeurMenu);
    }
});