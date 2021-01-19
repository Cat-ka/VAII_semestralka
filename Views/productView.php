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
    ?>
    <!--    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true): ?>-->
    <?php

    if (isset($_SESSION['logged_in'])) {
    $author = $_SESSION['logged_in']['name'];
    if ($author === 'admin') { ?>

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
?>

<?php

//$output = '';
//if(isset($_POST["type_id"]))
//{
//    if($_POST["type_id"] != '')
//    {
//        $sql = "SELECT * FROM pricelist WHERE type_id= '".$_POST["type_id"]."'";
//    }
//    else
//    {
//        $sql = "SELECT * FROM pricelist";
//    }
//    $result = mysqli_query($conn, $sql);
//    while($row = mysqli_fetch_array($result))
//    {
////        $output .= '<div class="container container-md" >';
////        $output .= '<table class="table table-bordered">';
//        $output .= '<tbody>';
//        $output .= '<tr>';
//        $output .= '<td>'.$row["name"].'</td>';
//        $output .= '<td>'.$row["price"].'</td>';
//        $output .= '</tr>';
//        $output .= '</tbody>';
////        $output .= '</table>';
////        $output .= '</div>';
//
//
//    }
//    echo $output;
//}
//?>

<?php
include('footer.php');
?>

<!--<div class="container container-md">-->
<!--    <h2>Pridaj nový produkt</h2>-->
<!--    <form id="AddNewProduct" method="post" enctype="multipart/form-data" onsubmit="return AjaxPost(this)">-->
<!--        <div class="form-group">-->
<!--            <label>Názov produktu</label>-->
<!--            <input type="text" class="form-control" id="ProductName" name="ProductName"-->
<!--                   placeholder="Zadajte názov produktu">-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <label>Cena</label>-->
<!--            <input type="text" class="form-control" id="Price" name="Price"-->
<!--                   placeholder="Zadajte cenu produktu">-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <label for="exampleFormControlTextarea1">Popis produktu</label>-->
<!--            <textarea class="form-control" id="PopisProduktu" name="PopisProduktu" rows="5"></textarea>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <label for="exampleFormControlFile1">Vložte obrázok produktu</label>-->
<!--            <input type="file" class="form-control-file" id="ImageUpload" name="ImageUpload">-->
<!--        </div>-->
<!--        <button type="submit" class="btn btn-secondary">Vložiť</button>-->
<!--    </form>-->
<!---->
<!--</div>-->

<!--<script src="js/menoSkriptu.js"></script>-->
<!--<script>-->
<!--    function AjaxPost(formData) {-->
<!--        var ajaxConfig = {-->
<!--            type: "post",-->
<!--            url: "SaveData",-->
<!--            data: new FormData(formData),-->
<!--            success: function (result) {-->
<!--                alrert(result);-->
<!--                window.location.href = "AddNewProduct"-->
<!--            }-->
<!--        }-->
<!--        if ($(formData).attr('enctype') == "multipart/form-data") {-->
<!--            ajaxConfig["contentType"] = false;-->
<!--            ajaxConfig["processData"] = false;-->
<!---->
<!--        }-->
<!--        $ajax(ajaxConfig);-->
<!--        return false;-->
<!--    }-->
<!--</script>-->