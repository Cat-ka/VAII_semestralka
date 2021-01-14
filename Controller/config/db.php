<?php

//vytvoríme pripojenie
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//kontrola pripojenia
if(mysqli_connect_errno()) {
    echo 'Chyba pripojenia ' . mysqli_connect_errno();
}

