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


<form action="uploads.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<?php



$target_dir = "../uploads/";



$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
//echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
      //  echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
   // echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  //  echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  //  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
 //   echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload filee
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {


	 $imgName = $_FILES["fileToUpload"]["name"];
	
        $target_file = "images/". basename($_FILES["fileToUpload"]["name"]);
       shell_exec ("exiftool -g -XMP:all -IPTC:all -EXIF:all -json  $target_file >output/$imgName.json");
       shell_exec ("exiftool -xmp -b $target_file >xmp/$imgName.xmp");
       
       
      
       header('Location: details.php?imgid='.$imgName);

	exit;

    } else {
       // echo "Sorry, there was an error uploading your file.";
    }
}



?> 
</body>
</html>