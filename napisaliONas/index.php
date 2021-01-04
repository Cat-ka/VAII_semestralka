<?php
session_start();

require ('config/config.php');
require ('config/db.php');

//vytvor query
$query = 'SELECT * FROM posts ORDER BY created_at DESC';
$result = mysqli_query($conn, $query);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
//var_dump($posts);
mysqli_free_result($result);
mysqli_close($conn);
?>


<?php include('../Views/header.php'); ?>
<?php
    if (isset($_SESSION['message'])): ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>

    <div class="container">
        <h2>Napísali o nás</h2>
        <a class="btn btn-secondary btn-lg" href="<?php echo ROOT_URL;?>add.php">Pridaj príspevok</a>
        <?php foreach ($posts as $post) : ?>
            <div class="well">
                <h3><?php echo $post['title']; ?></h3>
                <small>Created on <?php echo $post['created_at']; ?> by
                    <?php echo $post['author']; ?></small>
                <p><?php echo $post['body']; ?></p>
                <a class="btn btn-default" href="<?php echo ROOT_URL;?>post.php?id=<?php echo $post['id']; ?>">Viac o príspevku</a>
            </div>
        <?php endforeach; ?>
    </div>
<?php include('../Views/footer.php'); ?>