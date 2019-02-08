function upload(){
    if(window.XMLHttpRequest){          /* Si XMLHttpRequest supporté */
        var fileInput = document.getElementById('filename');
        var file = fileInput.files[0];
        var formData = new FormData();
        formData.append('file', file);  /* FormData : type de données très pratique en JS pour l'envoi de fichiers */
        var xmlhttp = new XMLHttpRequest();
        
        
        xmlhttp.open('POST', 'php/upload.php', true);
        xmlhttp.send(formData);
        /* Quand l'état change */
        xmlhttp.onreadystatechange = function (){
            /* Chargement de la réponse finie + status HTTP OK */
            if (xmlhttp.readyState ==4 && xmlhttp.status ==200){
                var jsonobj = JSON.parse(xmlhttp.responseText);

                /* Réaction à la réponse */
                switch (jsonobj["code resultat"]) {
                    case "fichier existe deja" :
                        alert("Cette image existe déjà sur le serveur.");
                        break;
                    case "mauvais type image" :
                        alert("Type de fichier non autorisé.");
                        break;
                    case "upload OK" :
                        alert("L'envoi s'est déroulé avec succès.");
                        break;
                }
            }
        }
    }else{
        alert("Navigateur obsolète, veuillez le mettre à jour");
    }
}