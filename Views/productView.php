<?php
require('../Controller/includes/productIndex.php');
include('header.php');
?>

<div class="container container-md" id="content">
    <?php
    $db = mysqli_connect("localhost", "root", "dtb456", "salon");
    $sql = "SELECT * FROM services";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result)) {
        echo "<div id='img_div'>";
        echo "<img src='product_picture/" . $row['image'] . "'>";
        echo "<h3>" . $row['serv_title'] . "</h3>";
        echo "<p>" . $row['serv_body'] . "</p>";
        echo "</div>";
    }

    if (isset($_SESSION['logged_in'])) {
    $author = $_SESSION['logged_in']['id'];
    if ($author === '10') { ?>

    <form method="post" action="productView.php" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div>
            <input type="file" name="image" required>
        </div>
        <div>
            <textarea name="nameP" cols="40" placeholder="Napíš  názov tohto obrázku..." required></textarea>
        </div>
        <div>
            <textarea name="text" cols="40" rows="6" placeholder="Napíš niečo o tomto obrázku..." required></textarea>
        </div>
        <div>
            <input type="submit" name="upload" value="Upload Image">
        </div>
    </form>
</div>
<?php }
} else {
    echo '<div class="container">';
    echo '</div>';
}
include('footer.php');
?>
