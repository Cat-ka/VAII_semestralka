<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once 'config/config.php';
require_once 'config/db.php';

function vyber_znacku($conn)
{
    $output = '';
    $sql = "SELECT * FROM type";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $output .= '<option value="' . $row["ID"] . '">' . $row["type_name"] . '</option>';
    }
    return $output;
}

function vyber_osetrenie($conn)
{
    $output = '';
    $sql = "SELECT type_name, name, price FROM pricelist JOIN type on (ID = type_id)";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $output .= '<tr>';
        $output .= '<td >'.$row["type_name"].'</td>';
        $output .= '<td>'.$row["name"].'</td>';
        $output .= '<td class="price">'.$row["price"].'</td>';
        $output .= '</tr>';
    }
    return $output;
}
?>

<?php include('../Views/header.php'); ?>

<div class="container container-md">
    <h2>Cenník našich služieb a kozmetiky</h2>
    <form>
        <select name="type" id="type" ">
        <option value="">Vyberte si prístroj pre ošetrenie:</option>
        <?php
        echo vyber_znacku($conn);
        ?>
        </select>
    </form>
</div>

<div class="container container-md" id="showProduct">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ošetrenie</th>
            <th scope="col">Cena</th>
        </tr>
        </thead>
        <tbody>
        <?php
        echo vyber_osetrenie($conn);
        ?>
        </tbody>
    </table>
</div>
<?php include('../Views/footer.php'); ?>

<script src="../Views/js/script_priceList.js"></script>

