<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Rai's Book Shop</title>
    <link rel="stylesheet" href="css/stylemain.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/pageno.css">
    <link rel="stylesheet" href="css/genre.css">
    <link rel="icon" href="Image/logo.ico">
    <?php
    include("connect.php");
    include("query.php");

    echo "<style>
        body {
            background-color: $backgroundcolor;
        }
        .color, p,#w1>h2,#w2>h2, #w3>h2, #w4>h2, .subtitle, input{
            color: $color;
        }
        .fade-overlay {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0), $backgroundcolor 30%);
    </style>";
    ?>
</head>

<body>
    <?php
    include("header.php");
    include("popups.php");
    if ($username != 0 && $block == 1) {
        echo '<script>alert("Your account has been blocked. \n Please contact your administrator for assistance.");</script>';
        echo "<script>window.location.href = 'logut.php';</script>";
    }
    ?>
    <section id="banner"><a name="home"></a>
        <div class="wrapper" id="w1">
            <?php
            echo " <div id='bg' class='image-container'>
                <img src='$backgroundimg'>
                <div class='fade-overlay'></div>
            </div>";
            ?>
            <div class="one">
                <?php echo "<h2>$companyname</h2>"; ?>
                <p class="p">A place to find refuge in the world of books.<br>Where code is poetry, and innovation
                    blossoms.</p>
                <br><br><br>
            </div>

        </div>
    </section>
    <section><a name="Books"></a>
        <div class="wrapper" id="w2">
            <h2>Category</h2>
            <?php include("genres.php"); ?>
        </div>
        </div>
    </section>
    <section><a name="Trending"></a>
        <div class="wrapper" id="w3">
            <h2>What's Trending</h2>
            <?php
            include("trend.php");
            ?>
        </div>
    </section>
    <section>
        <div class="wrapper" id="w3">
            <h2>Dump's Trending</h2>
            <?php
            include("trend2.php");
            ?>
        </div>
    </section>
    <section><a name="Browse"></a>
        <div class="wrapper" id="w4">
            <h2>Browse</h2>
            <p class="subtitle">A place to find refuge in the world of books.</p>
            <?php
            include("page.php");
            ?>
        </div>
    </section>
    <footer id="footer">
        <h5 style="color: rgba(255, 255, 255, 0.574);">FOLLOW OUR SOCIAL MEDIA</h5>
        <ul class="icons">
            <li><a href="https://web.facebook.com/jamesraille.sitchon" class="social facebook"></a></li>
            <li><a href="https://x.com" class="social twitter"></a></li>
            <li><a href="https://www.instagram.com/jaimes_rai/" class="social instagram"></a></li>
        </ul>


        <ul class="copyright">
            <li><a href="Landingpage.html">Rai's Book Shop </a></li>
            <li>© 2023. ALL RIGHTS RESERVED.</li>
        </ul>
        <ul class="copyright">
            <li>
                <br>
                <p class="footer-links"><a href="#">Contact Us</a> I <a href="#">About Us</a> I <a href="#">Privacy</a>
                    I <a href="#">Terms of use</a></p> <br><br>
            </li>
        </ul>
    </footer>



    <script src="code.js"></script>
    <script>

    </script>

</body>

</html>