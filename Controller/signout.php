<?php
require_once 'includes/init.php';

if (isset($_SESSION['logged_in'])){

    //pridavam prazdne pole do premennej $_SESSION
    $_SESSION = [];

    //koniec platnosti cookie
    setcookie(session_name(), session_id(), time()-1000, "/");

    //vymazanie cookie
    session_destroy();

    header('location: headerLogin.php');
}
else{
    header('location: home.php?error=Prosim, prihlaste sa Vasim kontom.');
}