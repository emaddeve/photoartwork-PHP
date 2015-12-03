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
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <meta charset=utf-8 />
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <style type="text/css">
        #itemContent1,#itemContent2,#itemContent3 {
            display: none;
        }
	
    </style>
</head>
<body>

<!-- begin header -->
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
<button type="button" onclick="GetCellValues()">show</button>
<p id='php'>tesetset</p>

<?php


$imgid = $_GET['imgid'];
echo  "<img src='../images/$imgid' hight='300' width='300' align=\"center\" >";
echo "<a href='../images/' download='$imgid'> <button type='button'>Download Photo</button> </a>";
echo $imgid;
echo "<a href='../xmp/' download=$imgid'.xmp'><button type='button'>Download XMP format</button></a>";
echo "<a href='edit.php?imgid=$imgid'><button type='button'>Edit</button>";
$json=file_get_contents("../output/$imgid.json");
$data =  json_decode($json);
//$result = $data[0].EXIF.Orientation;
?>

<a href="#"  id="expandButton1">EXIF</a>
<div id="itemContent1" class="opened">
<div class="wrap">
<div id='slidingDiv' >

    <?php

    //$result = $data[0].EXIF.Orientation;




    foreach($data as $row)
    {
        foreach($row->EXIF as $key => $val)
        {

            echo "<table id='mytable'>
                 <tr>
                      <td ><div contenteditable>$key  :   </td>
                      <td id='$key'><div contenteditable>$val</td>
                </tr>
              </table>";
        }
    }




    ?>
</div>
</div>
</div>

<a href="#" id="expandButton2">XMP</a>
<div id="itemContent2" class="opened">
<div id='slidingDiv' >
    <?php

    foreach($data as $row)
    {
        foreach($row->XMP as $key => $val)
        {

            echo "<table>
                 <tr>
                      <td>$key</td>
                      <td id='$key'>$val</td>
                </tr>
              </table>";
        }
    }

    ?>
</div>
</div>

<a href="#" id="expandButton2">IPTC</a>
<div id="itemContent2" class="opened">

    <?php

    foreach($data as $row)
    {
        foreach($row->IPTC as $key => $val)
        {

            echo "<table>
                 <tr>
                      <td>$key</td>
                      <td>$val</td>
                </tr>
              </table>";
        }
    }



    ?>
</div>



<script src="SH.js"></script>
<script src="gettd.js"></script>

</body>
</html>
