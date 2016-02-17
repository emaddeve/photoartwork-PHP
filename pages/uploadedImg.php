<html>
<head>

    <?php include_once("../include/header.html"); ?>

</head>
<body>
<div id="main">
    <!-- begin header -->


    <!--
    <form action="edit.php" method="post" enctype="multipart/form-data">

        Name</br>

        <input style="display: none" type="text" name="Name"  value="" id="Name" /></br>

        Title</br>
        <input type="text" name="Title" value="" id="Title" /></br>
        Description</br>
        <textarea  name="Description" value="" id="Description"></textarea></br>
        Country</br>
        <input type="text" name="Country" value="" id="Country" /></br>
        City</br>
        <input type="text" name="City" value="" id="City" /></br>
        DateCreated</br>
        <input type="text" name="DateCreated" value="" id="DateCreated" /></br>
        <input id="submit" type="submit" value="Edit data" class="myButton" />

    </form>
    -->
    <?php


    $imgid = $_GET['imgid'];
    $src= "../ui/images/".$imgid;
    exec("exiftool -g -FileName -XMP:all -IPTC:all -EXIF:all -json ".$src ,$response);
    $res = implode("",$response);
    $data = json_decode($res,true);
    $XMP = $data[0]['XMP'];

    // $jsonPath = "../ui/output/$imgid.json";


    // $json = file_get_contents("../ui/output/$imgid.json");
    // $data = json_decode($json);
    //$result = $data[0].EXIF.Orientation;
    ?>
    <img id='img' src="../ui/images/<?php echo $imgid; ?>">

    <form class="form-style-7" action="edit.php?imgid=<?php echo $imgid;?>" method="post" enctype="multipart/form-data">
        <ul>

            <input style="display: none" type="text" name="Name" value="" id="Name">



            <li>
                <label for="Country">Country</label>
                <input type="text" name="Country" value="<?php if(array_key_exists('Country',$XMP)) echo $XMP['Country']; ?>" id="Country">

            </li>
            <li>
                <label for="City">City</label>
                <input type="text" name="City" value="<?php if(array_key_exists('City',$XMP)) echo $XMP['City']; ?>" id="City">

            </li>
            <li>
                <label for="DateCreated">DateCreated</label>
                <input type="text" name="DateCreated" value="<?php if(array_key_exists('DateCreated',$XMP)) echo $XMP['DateCreated']; ?>" id="DateCreated">

            </li>

            <li>
                <label for="Title">Title</label>
                <input type="text" name="Title" value="<?php if(array_key_exists('Title',$XMP)) echo $XMP['Title']; ?>" id="Title">

            </li>

            <li>
                <label for="bio">Description</label>
                <textarea name="Description" id="Description" onclick="adjust_textarea(this)"><?php if(array_key_exists('Description',$XMP)) echo $XMP['Description']; ?></textarea>
                <span>click to expand</span>
            </li>
            <li>
                <input id="submit" type="submit" value="Edit data" class="myButton">
            </li>
        </ul>
    </form>




</div>
</body>
</html>