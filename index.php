<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMI Travel</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="headfoot/header.css">
    <link rel="stylesheet" href="headfoot/footer.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>

<!-- Header import -->
<?php
include ('headfoot/header.php');
?>

<main>
    <?php
    // Checking if user is logged in
    if (isset($_SESSION['email'])){
        ?>
        <div class="isloggedin">
            <h1 class="ml2">Welcome <?= $_SESSION['Name']?></h1>
            <h3 class="ml2"> Let's travel!</h3>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
            <script>
                var textWrapper = document.querySelector('.ml2');
                textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

                anime.timeline()
                    .add({
                        targets: '.ml2 .letter',
                        scale: [4,1],
                        opacity: [0,1],
                        translateZ: 0,
                        easing: "easeOutExpo",

                        delay: (el, i) => 70*i
                    }).add({
                    targets: '.ml2',
                    easing: "easeOutExpo",
                });
            </script>
        </div>
        <?php
    }
    ?>

    <div class="top">
        <div class="slideshow-container">

            <div class="mySlides fade">
                <div class="numbertext">1 / 5</div>
                <img src="assets/rome.jpg" style="width:100%; border-radius: 15px; border: 2px solid mediumpurple" alt="rome">
                <div class="text">Rome</div>
                <div class="description">
                    <p>The year 753 BC marked the beginning of <span>Rome</span>, which would dominate the western world for centuries: politically until the fall of its western Empire in 476 AD, culturally and artistically, under many points of view, still influencing western culture today.The traditional story states that Rome was founded by the brothers Romulus and Remus, who were the sons of Rhea Silvia and Mars, the god of war.Eventually they funded a village on the Palatine Hill, a hill which would eventually house the palaces of Roman Emperors such as Augustus and Tiberius. Scornful of the walls in the city, Remus met his death by Romulus who then proclaimed himself king of his new city of Rome. He invited peoples of all walks of life into his new city, ranging from ordinary folk to criminals running from the law. Travel already today and enjoy Rome during the summer break.
                    </p>
                </div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 5</div>
                <img src="assets/venice.jpg" style="width:100%; border-radius: 15px; border: 2px solid mediumpurple" alt="venice">
                <div class="text">Venice</div>
                <div class="description">
                    <p><span>The Republic of Venice</span> was founded in 697, after the decline of the Roman empire, by people escaping from Germanic invasions. People fled from the mainland to the small islands in the lagoon, which were difficult to reach and easy to defend. Since then, the Republic lasted more than a millennium until 1797. At the beginning, the Republic was under the influence of the Byzantine empire, but it gradually became independent. During the centuries, the Republic of Venice has dominated the trade routes on the Mediterranean Sea, from Asia to Africa. It became a rich merchant republic, home to a wealthy merchant class.Most important of all, Venetians are very proud of their history and particularly fond of their traditions. The Carnival, Redentore or the historic regatta are just few, of the many events, in which you will be able to experience this.
                    </p>
                </div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 5</div>
                <img src="assets/istanbul.jpg" style="width:100%; border-radius: 15px; border: 2px solid mediumpurple" alt="istanbul">
                <div class="text">Istanbul</div>
                <div class="description">
                    <p><span>Istanbul</span>, Turkish İstanbul, formerly Constantinople, ancient Byzantium, largest city and principal seaport of Turkey. It was the capital of both the Byzantine Empire and the Ottoman Empire.The old walled city of Istanbul stands on a triangular peninsula between Europe and Asia. Sometimes as a bridge, sometimes as a barrier, Istanbul for more than 2,500 years has stood between conflicting surges of religion, culture, and imperial power. For most of those years it was one of the most coveted cities in the world.The name Byzantium may derive from that of Byzas, leader of the Greeks from the city of Megara who, according to legend, captured the peninsula from pastoral Thracian tribes and built the town about 657 BCE.In 330 CE, when Constantine the Great dedicated the city as his capital, he called it New Rome.By the 13th century this Greek phrase had become an appellation for the city: Istinpolin. Through a series of speech permutations over a span of centuries, this name became Istanbul. IMI Travel offers trip to this historic and old city for the affordable price.</p>
                </div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">4 / 5</div>
                <img src="assets/dubrovnik.jpg" style="width:100%; border-radius: 15px; border: 2px solid mediumpurple" alt="dubrovnik">
                <div class="text">Dubrovnik</div>
                <div class="description">
                    <p><span>Dubrovnik’s</span> history witnesses the changing fortune of a borderland Mediterranean city-state that for centuries lived in harmony with its surroundings. Originally called Ragusa, the city was founded in the 7th century as a refuge for coastal residents fleeing the advancing barbarians. From the outset, the city was protected by defensive walls.Part of the Mediterranean cultural constellation, yet intimately connected to the Balkans. Catholic yet surrounded by Islamic and Orthodox neighbours. Visit Dubrovnik to see all things this city can offer.
                    </p>
                </div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">5 / 5</div>
                <img src="assets/sarajevo.jpg" style="width:100%; border-radius: 15px; border: 2px solid mediumpurple" alt="sarajevo">
                <div class="text">Sarajevo</div>
                <div class="description">
                    <p><span>Sarajevo</span>, capital and cultural centre of Bosnia and Herzegovina. It lies in the narrow valley of the Miljacka River at the foot of Mount Trebević. The city retains a strong Muslim character, having many mosques, wooden houses with ornate interiors, and the ancient Turkish marketplace (the Baščaršija); much of the population is Muslim. The city’s principal mosques are the Gazi Husreff-Bey’s Mosque, or Begova Džamija (1530), and the Mosque of Ali Pasha (1560–61). Husreff-Bey also built the medrese (madrasah), a Muslim school of theology; the Imaret, a free kitchen for the poor; and the hamam, public baths. A late 16th-century clock tower is adjacent to the Begova Džamija. Museums include the Mlada Bosna (“Young Bosnia”), an annex of the town museum; the Museum of the Revolution, chronicling the history of Bosnia and Herzegovina since 1878; and a Jewish museum. Sarajevo has a university (1949) that includes faculties in mining and technology, an academy of sciences, an art college, and several hospitals.A number of streets named for trades survive from an original 37, and the Kazandžviluk (coppersmith’s bazaar) is preserved in its original form. Travel with us and experience beauties of Sarajevo!</p>
                </div>
            </div>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
        </div>
        <div class="routebutton">
            <a href=
            <?php
            if (isset($_SESSION['email'])){?>
                "routes/routes.php"
                <?php
                } else{?>
                    "userlog/login.php"
               <?php }
            ?>
            >Routes</a>
        </div>
    </div>
    <div class="bottom">
        <div class="aboutus" id="second">
            <h2>About</h2>
            <div class="cards">
                <div class="aboutsection">
                    <img src="assets/ismar.jpg" alt="ismar" style="border: 2px solid goldenrod">
                    <h3 style="text-align: center; color: goldenrod">Ismar Bećirspahić</h3>
                    <p style="margin-top: 10px !important;">is a computer science student who attends to Sarajevo School of Science and Technology. He previously attended Gymnasium Dobrinja in Sarajevo where he expanded his knowledge and skills in maths and creativity. Today he is a part of the origin team of 3 admins, making IMI Travel agency better day by day.</p>
                </div>
                <div class="aboutsection">
                    <img src="assets/mirza.jpg" alt="mirza" style="border: 2px solid goldenrod">
                    <h3 style="text-align: center; color: goldenrod">Mirza Arslanagić</h3>
                    <p style="margin-top: 10px !important;">is a computer science student who attends to Sarajevo School of Science and Technology. He previously attended Second Gymnasium in Sarajevo being one of the best students in the school. Today he is also a part of 3 admins responsible for making IMI Travel one of the most popular travel agencies in the entire country.</p>
                </div>
                <div class="aboutsection">
                    <img src="assets/irfan.jpg" alt="irfan" style="border: 2px solid goldenrod">
                    <h3 style="text-align: center; color: goldenrod">Irfan Parić</h3>
                    <p style="margin-top: 10px !important;">is a computer science student who attends to Sarajevo School of Science and Technology. He previously attended School of Electrical Engineering in Sarajevo where he finished numerous projects improving his team-working and leadership skills. He is one of the 3 origin creators of IMI Travel company.</p>
                </div>
            </div>
        </div>
        <h2>Contact us</h2>
        <div class="contact" id="first">
            <div class="contactform">
                <p>E-mail: imitravel2021@gmail.com</p>
                <p>Phone: 062/555-555</p>
                <p>Address: address of bussiness</p>
            </div>
            <div class="contactimg">
                <img src="assets/contact.png" alt="contact">
            </div>
        </div>
</main>

<!-- Footer import -->
<?php
include ('headfoot/footer.php');
?>
</body>

<!-- JS script for picture slideshow -->
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }
</script>

<!-- JS script for scrolling page on button press (buttons inside hamburger menu, about us and contact) -->
<script>
    window.smoothScroll = function(target) {
        var scrollContainer = target;
        do { //find scroll container
            scrollContainer = scrollContainer.parentNode;
            if (!scrollContainer) return;
            scrollContainer.scrollTop += 1;
        } while (scrollContainer.scrollTop == 0);

        var targetY = 0;
        do { //find the top of target relatively to the container
            if (target == scrollContainer) break;
            targetY += target.offsetTop;
        } while (target = target.offsetParent);

        scroll = function(c, a, b, i) {
            i++; if (i > 30) return;
            c.scrollTop = a + (b - a) / 30 * i;
            setTimeout(function(){ scroll(c, a, b, i); }, 20);
        }
        // start scrolling
        scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);
    }
</script>
</html>
