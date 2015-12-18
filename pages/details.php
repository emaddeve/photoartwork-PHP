<html>
<head>
    <?php include_once("../include/header.html"); ?>


</head>
<body>
<div id="main">


    <?php
    $imgid = $_GET['imgid'];
    $json = file_get_contents("../ui/output/$imgid.json");
    $data = json_decode($json);
    foreach ($data as $row) {
        foreach ($row->XMP as $key => $val){

            if($key==Country)
                $Country=$val;
            elseif($key==City)
                $City=$val;
            elseif($key==State)
                $State=$val;
            elseif($key==Subject){
                $first=$val[0];
                $second=$val[1];
                $third=$val[2];
                $fourth=$val[3];
                echo $first;

            }


        }



    }


    ?>


    Search for image by tags:
    <br/>
    <button id="search" class="myButton">search</button>
    <select id="searchterm" class="myButton">

        <option value="<?php echo $Country ?>">Country : <?php echo $Country ?></option>
        <option value="<?php echo $City ?>">City : <?php echo $City ?></option>
        <option value="<?php echo $State ?>">State : <?php echo $State ?></option>
        <optgroup label="keywords" style="color: #444444"></optgroup>
        <option value="<?php echo $first ?>"> <?php echo $first; ?></option>
        <option value="<?php echo $second ?>"> <?php echo $second; ?></option>
        <option value="<?php echo $third ?>"> <?php echo $third; ?></option>
        <option value="<?php echo $fourth ?>"> <?php echo $fourth; ?></option>


    </select>


    <section class="tabs">
        <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked"/>
        <label for="tab-1" class="tab-label-1">EXIF</label>

        <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2"/>
        <label for="tab-2" class="tab-label-2">XMP</label>

        <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3"/>
        <label for="tab-3" class="tab-label-3">IPTC</label>


        <?php


        echo "<img id='img' src='../ui/images/$imgid'></br>";

        echo "<a title=\"download the image.\"style='float: right;' href='../ui/images/$imgid' class='glyphicon glyphicon-download-alt' download > </a>";
        echo "<a title=\"download XMP file.\" style='float: right;' href='../ui/xmp/$imgid.xmp' class='glyphicon glyphicon-file'  download> </a>";


        //$result = $data[0].EXIF.Orientation;
        ?>

        <div class="clear-shadow"></div>
        <div class="content">
            <div class="content-1">


                <?php

                //$result = $data[0].EXIF.Orientation;


                foreach ($data as $row) {
                    foreach ($row->EXIF as $key => $val) {

                        echo "<b>$key</b>: $val</br>";
                    }
                }


                ?>
            </div>


            <div class="content-2">

                <?php

                foreach ($data as $row) {
                    foreach ($row->XMP as $key => $val) {

                        echo "<b>$key</b>: $val</br>";

                    }
                }

                ?>
            </div>


            <div class="content-3">


                <?php

                foreach ($data as $row) {
                    foreach ($row->IPTC as $key => $val) {
                        echo "<b>$key</b>: $val</br>";

                    }
                }


                ?>
            </div>
        </div>
    </section>
</div>
<div id="results">
</div>
<script src="../ui/js/SH.js"></script>
<script src="gettd.js"></script>
<script src="../ui/js/flickr.js"></script>


</body>
</html>
