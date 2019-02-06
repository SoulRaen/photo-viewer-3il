/**
 * Affiche/cache le menu du site (en décalant le bouton associé)
 */
function toggleExpand() {
    var largeurMenu = $("nav").css("width");
    if ($("#expand-button").css("left") == "0px") { 
        $("nav").animate({width: "toggle"}, 350); //effet de slide horizontal
        $("#expand-button").animate({left: largeurMenu}, 350); //décale le bouton vers la droite
    } else { 
        $("#expand-button").animate({left: "0px"}, 350); //cale le bouton sur la gauche
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