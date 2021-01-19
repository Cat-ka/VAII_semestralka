<?php
$msg = "";
if (isset($_POST['upload'])) {
    $target = "D:/Škola/7.semester/VAII/php_mysql/www/VAII_semestralka/Views/product_picture/" . basename($_FILES['image']['name']);

    $db = mysqli_connect("localhost", "root", "dtb456", "salon");

    $image = $_FILES['image']['name'];
    $name = $_POST['nameP'];
    $text = $_POST['text'];

    $sql = "INSERT INTO services (image, serv_title, serv_body) VALUES ('$image', '$name', '$text')";
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target) && ($sql)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "There was a problem uploading image";
    }
}

?>
