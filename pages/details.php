<html>
<head>
    <?php include_once("../include/header.html"); ?>


</head>
<body>
<div id="main">


    <?php
    $imgid = $_GET['imgid'];
    $src= "../ui/images/$imgid";
    exec("exiftool -g  -XMP:all -IPTC:all -EXIF:all -json ".$src ,$response);
    $res = implode("",$response);
    $data = json_decode($res,true);
    //var_dump($data[0]).die;
    //var_dump($data[0]["IPTC"]["Headline"]);die;
    //$json = file_get_contents("../ui/output/$imgid.json");
    //$data = json_decode($json);
    foreach ($data[0]['XMP'] as $key=>$val) {


        if($key=='Country' ){

            $Country=$val;
        }


        elseif($key=='City'){
            $City=$val;
        }


        elseif($key=='State' && $val!=null){


            $State=$val;}
        elseif($key=='Subject' && $val!=null){
            error_reporting(0);
            $first=$val[0];
            $second=$val[1];
            $third=$val[2];
            //   $fourth=$val2[3];

        }
        else {
            $Country="";
            $City = "";
            $State = "";

        }


    }
    foreach ($data[0]['IPTC']['Keywords'] as $key=>$val) {
        if ($val!=null){
           // error_reporting(0);
            $first=$val[0];
            $second=$val[1];
            $third=$val[2];
            $fourth=$val2[3];
        }

        else{
            $first = "";
        $second="";
        $third="";
	$fourth="";
	}
    }

	//var_dump($data[0]['IPTC'][

	




    ?>


    Search for image by tags:
    <br/>
    <button id="search" class="myButton">search</button>
    <select id="searchterm" class="myButton">

        <option value="<?php echo $data[0]["XMP"]["Country"] ?>">Country : <?php echo $data[0]["XMP"]["Country"] ?></option>
        <option value="<?php echo $data[0]["XMP"]["City"] ?>">City : <?php echo $data[0]["XMP"]["City"] ?></option>
        <option value="<?php echo $data[0]["XMP"]["State"] ?>">State : <?php echo $data[0]["XMP"]["State"] ?></option>
        <optgroup label="keywords" style="color: #444444"></optgroup>
        <option value="<?php echo $data[0]["XMP"]["Keywords"][0] ?>"> <?php echo $data[0]["IPTC"]["Keywords"][0] ?></option>
        <option value="<?php echo $data[0]["XMP"]["Keywords"][1] ?>"> <?php echo $data[0]["IPTC"]["Keywords"][1] ?></option>
        <option value="<?php echo $data[0]["XMP"]["Keywords"][2] ?>"> <?php echo $data[0]["IPTC"]["Keywords"][2]; ?></option>



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


                foreach ($data[0]['EXIF'] as $key=>$val) {


                    echo "<b>".$key."</b>: ".$val."</br>";
                }



                ?>
            </div>


            <div class="content-2">

                <?php

                foreach ($data[0]['XMP'] as $key=>$val) {
			if($key=='Subject'){
				 echo "Subject";
				foreach($data[0]['XMP']['Subject'] as $key=>$val){
                    echo $val." ";
		}
                }else

                    echo "<b>".$key."</b>: ".$val."</br>";
                }
               
                

                ?>
            </div>


            <div class="content-3">


                <?php

                foreach ($data[0]['IPTC'] as $key=>$val) {
if($key=='Keywords'){
				 echo "keywords";
				foreach($data[0]['IPTC']['Keywords'] as $key=>$val){
                   echo "<b>".$key."</b>: ".$val."</br>";
		}
                }else

                    echo "<b>".$key."</b>: ".$val."</br>";
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
<script src="../ui/js/uploadedImg.js"></script>


</body>
</html>
