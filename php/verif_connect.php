<?php
session_start();
if(isset($_SESSION['login'])){
    $dureesessionmin = 1;
    $dureesessionsec = $dureesessionmin*60;
    $datefinsession=$_SESSION['date-heure-login']+$dureesessionsec;
    if(  $datefinsession < time()){
        session_unset();
    }
}

?>