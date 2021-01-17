<?php
if(!isset($_SESSION))
{
    session_start();
}

require ('config/config.php');
require ('config/db.php');

if(isset($_POST['submit'])) {
    $updated_id = mysqli_real_escape_string($conn, $_POST['update_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $author = $_SESSION['logged_in']['name'];

    $query = "UPDATE posts SET 
                        title='$title',
                        author='$author',
                        body='$body'
                            WHERE id = {$updated_id}";

    $_SESSION['message'] = 'Príspevok bol editovaný.';
    $_SESSION['msg_type'] = 'warning';
    header('location: post.php');

    if(mysqli_query($conn, $query)) {
        header('Location: ' .INDEX_URL. '');
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
        <h1>Pridaj príspevok</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Nadpis</label>
                <input type="text" name="title" class="form-control" minlength="4" maxlength="50" pattern=".*\S+.*" required
                        value="<?php echo $post['title']; ?>">
            </div>
<!--            <div class="form-group">-->
<!--                <label>Autor</label>-->
<!--                <input type="text"janko name="author" class="form-control" minlength="4" maxlength="50" pattern=".*\S+.*" required-->
<!--                       value="--><?php //echo $post['author']; ?><!--"-->
<!--                       required>-->
<!--            </div>-->
            <div class="form-group">
                <label>Text</label>
                <textarea name="body" class="form-control" minlength="4" maxlength="500" pattern=".*\S+.*" required><?php echo $post['body']; ?></textarea>
            </div>
            <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
</body>
</html>

