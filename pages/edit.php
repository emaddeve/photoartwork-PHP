<?php

$imgid = $_POST["Name"];
$Title = $_POST["Title"];
$Description = $_POST["Description"];
$Country = $_POST["Country"];
$City = $_POST["City"];
$DateCreated = $_POST["DateCreated"];
shell_exec("exiftool -Title='$Title' -Description='$Description'  -Country='$Country'
     -City='$City'  ../ui/images/$imgid");

shell_exec("exiftool -g -FileName -XMP:all -IPTC:all -EXIF:all -json  ../ui/images/$imgid >../ui/output/$imgid.json");

header('Location: details.php?imgid='.$imgid);


