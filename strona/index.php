<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Najświeższe newsy</title>
    <link rel="icon" type="image/png" href="img/ikona.png">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/mainBootstrap.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function(){
            removeSection = function(e){
                $(e).parents(".section").remove();

                $('[data-bs-spy="scroll"]').each(function(){
                    $(this).scrollspy("refresh");
                });
            }
        });
    </script>
  

    <style>
        .scroll-area{
            height: 200px;
            position: relative;

            overflow: auto;
        }
        <?php
        if($_SESSION['color']!=null && $_SESSION['color']=='grey')
        {
            echo "
                    #tlo {background:  ".$_SESSION['color'].";}
                    #tlo2 {background:  ".$_SESSION['color'].";}
                    #tlo3 {background:  ".$_SESSION['color'].";}
                    #tlo4 {background:  ".$_SESSION['color'].";}
                    #tlo5 {background:  ".$_SESSION['color'].";}
                    #tlo6 {background:  ".$_SESSION['color'].";}
            ";
        }
        ?>
    </style>
</head>
<body>
<nav id="myNavbar" class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top ">

    <div class="container-fluid " >

        <a href="#" class="navbar-brand">Dziękujemy za wsparcie. Dzięki Tobie mozemy się rozwijać.</a>
        <ul class="nav nav-pills">


            <li class="nav-item">
                <a href="#section1" class="nav-link">Wspierający</a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Patroni medialni</a>
                <div class="dropdown-menu">
                    <a href="#section2.1" class="dropdown-item">Patroni medialni 1</a>
                    <a href="#section2.2" class="dropdown-item">Patroni medialni 2</a>

                </div>
            </li>

        </ul>
    </div>

</nav>

<?php
include "dane.php";
include "function.php";
logowanie();



?>

<div class="container-fluid">
    <div class="row header_bg">
        <div class="col-sm-3">
            <img id="headerimg" class="img-fluid" src="img/headerimg.png" >
        </div>

        <div class="col-sm-9">
            <div class="mt-4 p-5 text-white rounded">
                <h1>strona testowa</h1>
                <h3>Strona internetowa na potrzeby zajęć laboratoryjnych z przedmiotu aplikacje WWW</h3>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" href="section1">Aktywny </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#logowanie" title="Informacja" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="Przejdziesz do panelu logowania i pogody">Logowanie i pogoda <div class="spinner-grow text-primary spinner-grow-sm"></div></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#footer" title="Informacja" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="Przejdziesz do stopki">Stopka <div class="spinner-grow text-primary spinner-grow-sm"></div></a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled"  href="#">Chwilowo niedostępne <div class="spinner-border spinner-border-sm"></div></a>
            </li>
        </ul>

        <ul class="nav nav-pills">
            <li class="nav-item">
                <button  class="nav-link" type="button" id="kolor" onclick="changeBodyBg('grey');">Zmień motyw <div class="spinner-grow text-muted spinner-grow-sm"></div></button>
            </li>
        </ul>
        <script>
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            })
        </script>
    </div>
</nav>



<div class="container-fluid">
<div class="row bg-light" >
       <div class="col-sm-4" id="tlo6">
        <div class="d-grid gap-1" id="tlo">

            <?php
            pokaz_menu($linki);
            ?>
            <div class="offcanvas offcanvas-end" id="demo">
                <div class="offcanvas-header">
                    <h1 class="offcanvas-title">Galeria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <img src="img/patroni/Aimp-icon.png">
                    <img src="img/patroni/Appstore-icon.png">

                </div>
            </div>


            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
                Galeria
            </button>

        </div>

        <div id="demo" class="carousel slide" data-bs-ride="carousel" >

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->

            <div class="carousel-inner" id="tlo5">
                <?php
                pokaz_karuzele($karuzela);
                ?>

            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
        <div id="logowanie">
            <div class="menu_margin" id="tlo2">
                <?php
                komunikat();
             
                include "logowanie.php";

                include "pogoda.php"
                ?>
            </div>
        </div>
    </div>
    <div class="col-sm-8"  id="tlo3">

        <?php
        if(!isset($_GET["k"]) || $_GET["k"] == 0)
        {
            pokaz_artykuly();
        }
        else
        {
            include pokaz_strone($_GET["k"]);
        }
        ?>
    </div>
</div>
</div>
    <div class="scroll-area" data-bs-spy="scroll" data-bs-target="#myNavbar" id="tlo4">
        <div class="section">
            <h3 id="section1">Wspierający <small><a href="#" onclick="removeSection(this);">&times; Nie pokazuj</a></small></h3>
            <ol>
                <li>AdamK</li>
                <li>Zbigniew W</li>
                <li>Kamil E</li>
                <li>Karolina Młot</li>
            </ol>

        </div>
        <hr>
        <div class="section">
            <h3 id="section2.1">Patroni medialni<small><a href="#" onclick="removeSection(this);">&times; Nie pokazuj</a></small></h3>
            <img src="img/patroni/Aimp-icon.png">
            <img src="img/patroni/Appstore-icon.png">
        </div>
        <div class="section">
            <h4 id="section2.2">Patroni medialni<small><a href="#" onclick="removeSection(this);">&times; Nie pokazuj</a></small></h4>
            <img src="img/patroni/Boxee-icon.png">
            <img src="img/patroni/Foobar-icon.png">
        </div>
    </div>

<div class="container-fluid footer_bg">
    <div class="row">
    <div class="col-sm-3">
        <div id="footer">
            <div id="footer_address">
                <p>Państwowa Wyższa Szkoła Techniczno-Ekonomiczna</p>
                <p> im. ks. Bronisława Markiewicza w Jarosławiu</p>
                <p>16 624 46 40</p>
                <p>pwste@pwste.edu.pl</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div id="footer_map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2563.9407665246854!2d22.672207815932648!3d50.012465426706974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473c9bd00702269d%3A0x34c3e02f77a47069!2sPa%C5%84stwowa%20Wy%C5%BCsza%20Szko%C5%82a%20Techniczno-Ekonomiczna!5e0!3m2!1spl!2spl!4v1646220856869!5m2!1spl!2spl"  style="border:0; width: 100%; height: 100%; " allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    <div class="col-sm-3">
        <div id="footer_social">
            <p>Social media:</p>
            <a href=#><img src="https://icons.iconarchive.com/icons/martz90/circle/64/fb-icon.png"></a>
            <a href=#><img src="https://icons.iconarchive.com/icons/xenatt/the-circle/64/App-Twitter-icon.png"></a>
        </div>
    </div>


</div>
</div>

</body>

    <script>
        var temp= sessionStorage.getItem("color");
       
            if(temp == 'grey')
            {
               document.getElementById("tlo").style.background = 'grey';
                document.getElementById("tlo2").style.background = 'grey';
                document.getElementById("tlo3").style.background = 'grey';
                document.getElementById("tlo4").style.background = 'grey';
                document.getElementById("tlo5").style.background = 'grey';
                document.getElementById("tlo6").style.background = 'grey';
            }
            else{
                  document.getElementById("tlo").style.background = 'white';
                document.getElementById("tlo2").style.background = 'white';
                document.getElementById("tlo3").style.background = 'white';
                document.getElementById("tlo4").style.background = 'white';
                document.getElementById("tlo5").style.background = 'white';
                document.getElementById("tlo6").style.background = 'white';
            }
             function changeBodyBg(color){
            if(temp=='grey')
            {
                sessionStorage.setItem("color","white");
                document.getElementById("tlo").style.background = 'white';
                document.getElementById("tlo2").style.background = 'white';
                document.getElementById("tlo3").style.background = 'white';
                document.getElementById("tlo4").style.background = 'white';
                document.getElementById("tlo5").style.background = 'white';
                document.getElementById("tlo6").style.background = 'white';
                temp= 'white';
            } else {
                sessionStorage.setItem("color","grey");
                document.getElementById("tlo").style.background = 'grey';
                document.getElementById("tlo2").style.background = 'grey';
                document.getElementById("tlo3").style.background = 'grey';
                document.getElementById("tlo4").style.background = 'grey';
                document.getElementById("tlo5").style.background = 'grey';
                document.getElementById("tlo6").style.background = 'grey';
                temp = 'grey';
            }
        }
</script>
</html>