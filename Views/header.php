<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bodystyle</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Icon" type="text/css" href="../obrazky/male_logo.jpg">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="../Views/css/bootstrap.min.css"></script>
    <link rel="stylesheet" type="text/css" href="../Views/css/home.css">
    <link rel="stylesheet" type="text/css" href="../Views/css/style.css">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"><img src="../obrazky/logo_ovalne_velke_hore.jpg" alt="Bodystyle Logo">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="../Views/home.php">Domov</a></li>
                <li><a href="#">Ponuka služieb</a></li>
                <li><a href="#">Cenník</a></li>
                <li><a href="../Views/galeria.php">Fotogaléria</a></li>
                <li><a href="../napisaliONas/indexNapisali.php">Napisali o nás</a></li>
            </ul>
            <div class="nav navbar-nav navbar-right"><a href="https://www.facebook.com/bodystyle.centra/"></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" data-toggle="modal" data-target="#login">Prihlásenie</a></li>
                <li><a href="#" data-toggle="modal" data-target="#signup" >Registrácia</a></li>
            </ul>

        </div>
    </div>
</nav>

<!-- Login box -->
<div class="modal fade my-modal" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Prihlásenie</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-mail</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Heslo</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Heslo">
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
<div class="modal fade my-modal" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Nová registrácia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Celé meno</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Zadajte celé meno">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-mail</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Zadajte e-mail">
                    </div>
                    <div class="form-group">
                        <label fo r="exampleInputPassword1">Heslo</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Zadajte heslo">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Zopakujte heslo</label>
                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Zopakujte heslo">
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
<div class="modal fade my-modal" id="send-password-link" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Pošli mi nové heslo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Zadajte e-mail pre odoslanie nového hesla</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail">
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