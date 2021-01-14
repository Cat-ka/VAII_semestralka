<?php

require_once '../config/config.php';

try {
$db1 = new PDO("mysql:host=localhost;dbname=salon;", DB_USER, DB_PASS);
$db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
die($e->getMessage());
}