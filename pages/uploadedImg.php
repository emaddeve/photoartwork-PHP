<html>
<head>

</head>
<body>
<?php
$imgid = $_GET['imgid'];

echo  "<img src='uploads/$imgid'>";
echo "<object width='500' height='500' type='text/plain' data='output/$imgid.txt' border='0' >
</object>";




echo  "<img src='uploads/$imgid' download>";
echo "<object width='500' height='500' type='text/plain' data='output/$imgid.txt' border='0' >
</object>";

echo "<a href='images/' download='$imgid'>Download link</a>"

?>



</body>
</html>
