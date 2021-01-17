<?php
include('header.php');
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="obrazky/carousel_11.jpg" alt="Image">
            <div class="carousel-caption">
                <h3>Prístrojové ošetrenie pleti</h3>
                <p>aby Vaša pleť vyzerala mlado</p>
            </div>
        </div>

        <div class="item">
            <img src="obrazky/carousel_2.jpg" alt="Dermalogica">
            <div class="carousel-caption">
            </div>
        </div>
        <div class="item">
            <img src="obrazky/carousel_3.jpg" alt="Logo Bodystyle">
            <div class="carousel-caption">
            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="container text-center">
    <h3>Chvíľa, keď sa Vaša pleť navždy zmenila.</h3><br>
    <div class="row">
        <div class="col-sm-4">
            <img src="obrazky/fibroblast_1.jpg" class="img-responsive" style="width:100%" alt="Image">
            <p>Plastická operácie bez chirurgického zákroku.</p>
        </div>
        <div class="col-sm-4">
            <img src="obrazky/ipl.jpg" class="img-responsive" style="width:100%" alt="Image">
            <p>Intenzívne pulzné svetlo (IPL)</p>
        </div>
        <div class="col-sm-4">
            <div class="well">
                <p><u>Princíp funkcie Fibroblast :</u><br>
                    Fibroblast – je nový revolučný prístroj s detailne prepracovanou technológiou,
                    ktorý nám umožňuje vykonávať celú škálu neablatívnych zákrokov.
                    <br>
                    Výsledok: zreteľne vypnutá koža, ktorá vyzerá prirodzene.</p>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
