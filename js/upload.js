function upload() {
    if(window.XMLHttpRequest){          /* Si XMLHttpRequest supporté */
        var fileInput = document.getElementById('filename');
        var file = fileInput.files[0];
        var formData = new FormData();
        formData.append('file', file);  /* FormData : type de données très pratique en JS pour l'envoi de fichiers */
        var xmlhttp = new XMLHttpRequest();
        
        xmlhttp.open('POST', 'php/edit-pages/upload.php', true);
        xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
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

function supprimerImage() {
    
    if(window.XMLHttpRequest){          /* Si XMLHttpRequest supporté */
        /* récupère le nom/chemin de l'image sélectionnée à supprimer */
        //récupère les infos du compteur pour connaître l'image sélectionnée
        var compteur = document.getElementById("compteur-images");
        if (compteur.innerHTML == "") {
            alert("Veuillez sélectionner une image.");
            return;
        }
        var i = compteur.innerHTML.split("/")[0]-1;
        var nomImage = document.getElementById("carrousel").children[i].firstChild.attributes["src"].nodeValue;
        
        //demande confirmation à l'utilisateur
        if(!confirm("Vous êtes sur le point de supprimer l'image sélectionnée.")) {
            return;
        }
        
        /* envoie le chemin de l'image à supprimer */
        var xmlhttp = new XMLHttpRequest();
        
        xmlhttp.open('POST', 'php/edit-pages/supprimer-image.php', true);
        xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("chemin="+nomImage);
        /* Quand l'état change */
        xmlhttp.onreadystatechange = function (){
            /* Chargement de la réponse finie + status HTTP OK */
            if (xmlhttp.readyState ==4 && xmlhttp.status ==200){
                var jsonobj = JSON.parse(xmlhttp.responseText);

                /* Réaction à la réponse */
                switch (jsonobj["code resultat"]) {
                    case "ok" :
                        alert("L'image a bien été supprimée !");
                        //recharge mes images
                        if (typeof getImages === "function") { 
                            getImages();
                        }
                        break;
                    case "nok" :
                        alert("L'image n'a pas pu être supprimée !");
                        break;
                }
            }
        }
        
    } else {
        alert("Navigateur obsolète, veuillez le mettre à jour");
    }
}

function updateContent(uid){
    if(window.XMLHttpRequest){          /* Si XMLHttpRequest supporté */
        /* Envoie le contenu */
        var content = document.getElementById("text-window-"+uid).value;

        xmlhttp= new XMLHttpRequest();
        xmlhttp.open('POST', 'php/edit-pages/contenu-texte.php', true);
        xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("uid="+uid+"&contenu="+encodeURIComponent(content));
        /* Quand l'état change */
        xmlhttp.onreadystatechange = function (){
            /* Chargement de la réponse finie + status HTTP OK */
            if (xmlhttp.readyState ==4 && xmlhttp.status ==200){
                var jsonobj = JSON.parse(xmlhttp.responseText);

                /* Réaction à la réponse */
                switch (jsonobj["code resultat"]) {
                    case "OK" :
                        alert("Contenu mis à jour !");
                        break;
                    case "KO" :
                        alert("Erreur : le contenu n'a pas pu être mis à jour");
                        break;
                    case "exception" :
                        alert(jsonobj["contenuErr"]);
                        break;
                    case "deco" :
                        alert("Veuillez vous reconnecter");
                        break;
                }
            }
        }
    }else{
        alert("Navigateur obsolète, veuillez le mettre à jour");
    }
}

function abortChanges(nompage){
    /* Redirige vers l'accueil */
    window.location.replace(nompage);
}