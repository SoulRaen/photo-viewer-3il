function image() {
    $.ajax("./php/images.php", {
        contentType: "application/json",
        success: function(result){
            console.log(result);
            console.log([1,2,3,4]);
        }
    });
    var carrousel = document.getElementById("carrousel");
    carrousel.innerHTML = "<img src=\"./img/oiseaux.jpg\" alt=\"photo\" />";
}