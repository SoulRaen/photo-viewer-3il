<?php
session_start();
if(isset($_SESSION['login'])){
    $dureesessionsec = $_SESSION['duree-session-min']*60;
    $datefinsession=$_SESSION['date-heure-login']+$dureesessionsec;
    if(  $datefinsession < time()){
        session_unset();
    }
}

function verificationConnexion(){
    if(!isset($_SESSION["login"])){
        return false;
    }else{
        return true;
    }
}

?>