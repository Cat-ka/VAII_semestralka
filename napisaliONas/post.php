<?php
session_start();

require ('config/config.php');
require ('config/db.php');

if(isset($_POST['delete'])) {
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    $query = "DELETE FROM posts WHERE id = {$delete_id}";

    $_SESSION['message'] = 'Príspevok bol vymazaný.';
    $_SESSION['msg_type'] = 'danger';
    header('location: post.php');

    if(mysqli_query($conn, $query)) {
        header('Location: ' .ROOT_URL. '');
    } else {
        echo 'ERROR: ' .mysqli_error($conn);
    }
}

//get ID
$id = mysqli_real_escape_string($conn, $_GET['id']);
//vytvor query
$query = 'SELECT * FROM posts WHERE id = ' .$id;
$result = mysqli_query($conn, $query);
$post = mysqli_fetch_assoc($result);
//var_dump($posts);
mysqli_free_result($result);
mysqli_close($conn);

?>

<?php include('../Views/header.php'); ?>
<div class="container">
    <h1><?php echo $post['title']; ?></h1>
    <small>Created on <?php echo $post['created_at']; ?> by
        <?php echo $post['author']; ?></small>
    <p><?php echo $post['body']; ?></p>
    <hr>
    <?php
    if (filter_has_var(INPUT_POST, 'data')) {
        $title = $_POST['data'];
        $title = filter_var($title, FILTER_SANITIZE_STRING);
        echo $title.'<br>';

        if (filter_var($title, FILTER_SANITIZE_STRING)) {
            echo 'Title is valid';
        } else {
            echo 'Title is NOT valid';
        }
    }
    ?>
    <form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
        <input type="submit" name="delete" value="Delete" class="btn btn-danger" style="font-weight:bold;">
    </form>
    <a href="<?php echo ROOT_URL; ?>" class="btn btn-default" style="font-weight:bold;">Späť</a>
    <a href="<?php echo ROOT_URL; ?>edit.php?id=<?php echo $post['id']; ?>" class="btn btn-default" style="font-weight:bold;">Editovať</a>

</div>
</body>
</html>

