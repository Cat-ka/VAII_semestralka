<?php
session_start();

require ('config/config.php');
require ('config/db.php');

if(isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);

    $query = "INSERT INTO posts(title, author, body) VALUES('$title', '$author', '$body')";

    $_SESSION['message'] = 'Príspevok bol pridaný.';
    $_SESSION['msg_type'] = 'success';
    header('location: post.php');

    if(mysqli_query($conn, $query)) {
        header('Location: ' .INDEX_URL. '');
    } else {
        echo 'ERROR: ' .mysqli_error($conn);
    }
}

?>

<?php include('../Views/header.php'); ?>
    <div class="container">
        <h1>Pridaj príspevok</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Nadpis</label>
                <input placeholder="Napíš názov príspevku." type="text" name="title" class="form-control"
                       minlength="4" pattern=".*\S+.*" required>
            </div>
            <div class="form-group">
                <label>Autor</label>
                <input placeholder="Napíš autora príspevku." type="text" name="author" class="form-control"
                       minlength="4" maxlength="50" pattern=".*\S+.*" required>
            </div>
            <div class="form-group">
                <label>Text</label>
                <textarea placeholder="Napíš čo nám chceš odkázať." name="body" class="form-control"
                          minlength="4" maxlength="500" pattern=".*\S+.*" required></textarea>
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
</body>
</html>
