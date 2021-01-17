<?php
require_once '../includes/init.php';

if (isset($_SESSION['logged_in'])){

    //pridavam prazdne pole do premennej $_SESSION
    $_SESSION = [];

    //koniec platnosti cookie
    setcookie(session_name(), session_id(), time()-1000, "/");

    //vymazanie cookie
    session_destroy();

    header('location: ../../Views/home.php');

//    die("<meta http-equiv='refresh' content='0;url=login.php'>");

}
else{
    header('location: ../../Views/home.php?error=Prosim, prihlaste sa Vasim kontom.');
}

