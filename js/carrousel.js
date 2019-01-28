var listeImages = [];
var index = 0;

function image() {
    $.ajax("./php/images.php", {
        contentType: "application/json",
        success: function (donnees, statut, requette) {
            listeImages = donnees;
            var carrousel = document.getElementById("carrousel");
            carrousel.innerHTML = "<img src=\"./img/" + listeImages[index] + "\" alt=\"photo\" />";
            index = (index + 1) % listeImages.length;
        }
    });
}

$("#carrousel").on("click", function () {
    this.innerHTML = "<img src=\"./img/" + listeImages[index] + "\" alt=\"photo\" />";
            index = (index + 1) % listeImages.length
});