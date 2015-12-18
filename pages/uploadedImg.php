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
    $jsonPath = "../ui/output/$imgid.json";


    $json = file_get_contents("../ui/output/$imgid.json");
    $data = json_decode($json);
    //$result = $data[0].EXIF.Orientation;
    ?>
    <img id='img' src="../ui/images/<?php echo $imgid; ?>">

    <form class="form-style-7" action="edit.php" method="post" enctype="multipart/form-data">
        <ul>

            <input style="display: none" type="text" name="Name" value="" id="Name">



            <li>
                <label for="Country">Country</label>
                <input type="text" name="Country" value="" id="Country">

            </li>
            <li>
                <label for="City">City</label>
                <input type="text" name="City" value="" id="City">

            </li>
            <li>
                <label for="DateCreated">DateCreated</label>
                <input type="text" name="DateCreated" value="" id="DateCreated">

            </li>

            <li>
                <label for="Title">Title</label>
                <input type="text" name="Title" value="" id="Title">

            </li>

            <li>
                <label for="bio">Description</label>
                <textarea name="Description" id="Description" onclick="adjust_textarea(this)"></textarea>
                <span>click to expand</span>
            </li>
            <li>
                <input id="submit" type="submit" value="Edit data" class="myButton">
            </li>
        </ul>
    </form>


    <script type="text/javascript" language="javascript">


        $(window).ready(function () {
            $.getJSON("<?php echo $jsonPath?>", function (jd) {
                $('#Name').val(jd[0].File.FileName);
                $('#Title').val(jd[0].XMP.Title);
                $('#Description').val(jd[0].XMP.Description);

                $('#Country').val(jd[0].XMP.Country);
                $('#City').val(jd[0].XMP.City);
                $('#DateCreated').val(jd[0].XMP.DateCreated);
            });
        });


    </script>


</div>
</body>
</html>
