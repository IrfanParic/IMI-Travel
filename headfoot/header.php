<?php
session_start();
?>
<link rel="stylesheet" href="header.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">

<div class="wrap" id="myheader">
    <header>
        <div>
            <img class="slika" id="slikaid" src="../../PRODŽEKT/headfoot/logo.png" alt="logo">
            <img class="planeta" id="planetaid" src="../../PRODŽEKT/headfoot/planeta.png" alt="planeta">
        </div>
        <h1 id="nameid">IMI TRAVEL</h1>
        <div class="slicice">
            <div class="container" id="containerid" onclick="myFunction(this)" title="menu">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
                <div class="list">
                       <a href=
                       <?php
                       if (isset($_SESSION['email'])){?>
                       "../../PRODŽEKT/routes/routes.php"
                    <?php
                    } else{?>
                        "../../PRODŽEKT/userlog/login.php"
                    <?php }
                    ?>
                    >Routes</a>
                    <a type="button" onclick="smoothScroll(document.getElementById('second'))">About us</a>
                    <a type="button" onclick="smoothScroll(document.getElementById('first'))">Contact</a>
                </div>
            </div>

            <!-- PHP for account page -->
            <div><a href="
            <?php if( isset($_SESSION['email']))
                {
                    echo '../../PRODŽEKT/userlog/user.php';
                }else{
                    echo '../../PRODŽEKT/userlog/login.php';
                } ?>
                            " id="slikaloginid"><img class="slikalogin" src="../../PRODŽEKT/headfoot/enter.png" alt="login"></a></div>
            <div><a href="../../PRODŽEKT/index.php" id="slikahomeid"><img class="slikahome" src="../../PRODŽEKT/headfoot/home.png" alt="home"></a></div>
        </div>

        <!-- JS for hamburger menu click -->
        <script>
            function myFunction(x) {
                x.classList.toggle("change");
            }
        </script>
    </header>
</div>

<!-- JS for scrolling functionality -->
<script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("myheader").style.top = "0";
            document.getElementById("slikaid").style.opacity="100";
            document.getElementById("slikaid").style.transition="0.4s";
            document.getElementById("planetaid").style.visibility="visible";
            document.getElementById("containerid").style.visibility="visible";
            document.getElementById("containerid").style.opacity="100";
            document.getElementById("containerid").style.transition="0.4s";
            document.getElementById("slikaloginid").style.visibility="visible";
            document.getElementById("slikaloginid").style.opacity="100";
            document.getElementById("slikaloginid").style.transition="0.4s";
            document.getElementById("slikahomeid").style.visibility="visible";
            document.getElementById("slikahomeid").style.opacity="100";
            document.getElementById("slikahomeid").style.transition="0.4s";
            document.getElementById("nameid").style.position="unset";
            document.getElementById("nameid").style.visibility="hidden";
            document.getElementById("nameid").style.opacity="0";
            document.getElementById("nameid").style.transition="none";
        } else {
            document.getElementById("myheader").style.top = "-60px";
            document.getElementById("slikaid").style.opacity="0";
            document.getElementById("slikaid").style.transition="0.4s";
            document.getElementById("planetaid").style.visibility="hidden";
            document.getElementById("containerid").style.visibility="hidden";
            document.getElementById("containerid").style.opacity="0";
            document.getElementById("containerid").style.transition="0.4s";
            document.getElementById("slikaloginid").style.visibility="hidden";
            document.getElementById("slikaloginid").style.opacity="0";
            document.getElementById("slikaloginid").style.transition="0.4s";
            document.getElementById("slikahomeid").style.visibility="hidden";
            document.getElementById("slikahomeid").style.opacity="0";
            document.getElementById("slikahomeid").style.transition="0.4s";
            document.getElementById("nameid").style.position="fixed";
            document.getElementById("nameid").style.visibility="visible";
            document.getElementById("nameid").style.opacity="100";
            document.getElementById("nameid").style.transition="0.8s";
        }
        prevScrollpos = currentScrollPos;
    }
</script>

