<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once 'config/config.php';
require_once 'config/db.php';

$output = '';
if(isset($_POST["type_id"]))
{
    if($_POST["type_id"] != '')
    {
        $sql = "SELECT * FROM pricelist WHERE type_id= '".$_POST["type_id"]."'";
    }
    else
    {
        $sql = "SELECT * FROM pricelist";
    }
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result))
    {
//        $output .= '<div class="container container-md" >';
//        $output .= '<table class="table table-bordered">';
        $output .= '<tbody>';
        $output .= '<tr>';
        $output .= '<td>'.$row["name"].'</td>';
        $output .= '<td>'.$row["price"].'</td>';
        $output .= '</tr>';
        $output .= '</tbody>';
//        $output .= '</table>';
//        $output .= '</div>';


    }
    echo $output;
}
?>


