<html>
<head>
    <title>PhotoArtWork2</title>
    <meta name="description" content="website description" />
    <meta name="keywords" content="website keywords, website keywords" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <!-- stylesheets -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <link href="../css/colour.css" rel="stylesheet" type="text/css" />
    <!-- modernizr enables HTML5 elements and feature detects -->
    <script type="text/javascript" src="../js/modernizr-1.5.min.js"></script>
</head>
<body>
<header>
    <div id="logo"><h1>by<a href="#">Al Rifai</a>Emad</h1></div>
    <nav>
        <ul class="sf-menu" id="nav">
            <li class="selected"><a href="../index.html">home</a></li>
            <li><a href="uploads.php">upload</a></li>
            <li><a href="#">my portfolio</a>
                <ul>
                    <li><a href="portfolio_one.html">portfolio_one</a></li>
                    <li><a href="portfolio_two.html">portfolio_two</a></li>
                </ul>
            </li>
            <li><a href="About.html">About</a></li>
            <li><a href="contact.html">contact</a></li>
        </ul>
    </nav>
</header>
<?php
$imgid = $_GET['imgid'];
echo $imgid;


?>