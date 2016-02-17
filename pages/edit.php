<?php

$imgid = $_GET['imgid'];
$Title = $_POST["Title"];
$Description = $_POST["Description"];
$Country = $_POST["Country"];
$City = $_POST["City"];
$DateCreated = $_POST["DateCreated"];
shell_exec("exiftool  -Title=".$Title." -Description=".$Description." -Country=".$Country." -City=".$City." -DateCreated=".$DateCreated." ../ui/images/".$imgid);



header('Location: details.php?imgid='.$imgid);


