<?php
if(!isset($_SESSION))
{
    session_start();
}
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bodystyle</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Icon" type="text/css" href="../Views/obrazky/male_logo.jpg">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="js/script.js">
    <link rel="stylesheet" type="text/css" href="../Views/css/home.css">
    <link rel="stylesheet" type="text/css" href="../Views/css/style.css">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand"><img src="../Views/obrazky/logo_ovalne_velke_hore.jpg" alt="Bodystyle Logo">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="../Views/home.php">Domov</a></li>
                <li><a href="../Views/productView.php">Ponuka služieb</a></li>
                <li><a href="../Controller/priceList.php">Cenník</a></li>
                <li><a href="../Views/galeria.php">Fotogaléria</a></li>
                <li><a href="../Controller/postView.php">Napisali o nás</a></li>
            </ul>
            <div class="nav navbar-nav navbar-right"><a href="https://www.facebook.com/bodystyle.centra/"></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true): ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Vitaj <?= $_SESSION['logged_in']['name'] ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target="#change-password">Zmeň heslo</a></li>
                            <li><a href="../Controller/functions/logout.php">Odhlásenie</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li ><a href='#' data-toggle='modal' data-target='#login'>Prihlásenie</a ></li >
                    <li ><a href='#' data-toggle='modal' data-target='#signup'>Registrácia</a ></li >
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Login box -->
<div class="modal fade my-modal" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
                        &times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Prihlásenie</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="post" action="../Controller/includes/login.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-mail</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                               placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Heslo</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                               placeholder="Heslo">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Zapamätať heslo
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Prihlásiť sa</button>
                </form>
                <br>
                <p>
                    <a href="#" data-toggle="modal" data-target="#send-password-link">Zabudol som svoje heslo</a>
                </p>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- /Login box -->

<!-- Signup box -->
<div class="modal fade my-modal" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Nová registrácia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" method="post" action="../Controller/includes/signup.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Celé meno</label>
                        <input type="text" class="form-control" name="name" id="exampleInputName"
                               placeholder="Zadajte celé meno">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-mail</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail2"
                               placeholder="Zadajte e-mail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Heslo</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword2"
                               placeholder="Zadajte heslo">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Zopakujte heslo</label>
                        <input type="password" class="form-control" name="cpassword" id="exampleInputPassword3"
                               placeholder="Zopakujte heslo">
                    </div>

                    <button type="submit" class="btn btn-default">Registrácia</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- /Signup box -->

<!-- Reset password box -->
<div class="modal fade my-modal" id="send-password-link" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Pošli mi nové heslo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Zadajte e-mail pre odoslanie nového hesla</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="E-mail">
                    </div>
                    <button type="submit" class="btn btn-default">Odoslať nové heslo</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- /Reset password box -->

<!-- Change password box -->
<div class="modal fade my-modal" id="change-password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
                        &times;</span></button>
                <h4 class="modal-title" id="myModalLabel2">Zmeň si svoje heslo</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="post" action="../Controller/includes/change-passw.php">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Staré heslo</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword4"
                               placeholder="Zadajte Vaše staré heslo">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nové heslo</label>
                        <input type="password" class="form-control" name="npassword" id="exampleInputPassword5"
                               placeholder="Zadajte vaše nové heslo">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Zopakujte nové heslo</label>
                        <input type="password" class="form-control" name="cpassword" id="exampleInputPassword6"
                               placeholder="Zopakujte heslo">
                    </div>
                    <button type="submit" class="btn btn-default">Zmeniť heslo</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- Change password box -->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>