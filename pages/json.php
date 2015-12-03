<html>
<head>

</head>
<body>
<?php
$json=file_get_contents("output/Chicago.jpg.json");
$data =  json_decode($json);
//$result = $data[0].EXIF.Orientation;




foreach($data[0] as $o){
  echo $o;

}


?>



</body>
</html>