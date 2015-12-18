<?php

$pageName = basename($_SERVER['PHP_SELF']);
switch ($pageName) {
    case "uploadedImg.php" :
        $title = "Image Modify";
        $meta_title = "Image to be process";
        $meta_description = "Image was uploaded and ready to modified it's metadata";

        $meta_url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        break;
    case "uploads.html":
        $title = "Upload";
        $meta_title = "Image Upload";
        $meta_description = "upload image and extract it's metadata";
        $meta_url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        break;

    case "detail.php":
        $title = "Details";
        $meta_title = "image details";
        $meta_description = "details about the image by exiftool";

        $meta_url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        break;
    default:
        $title = "photoartwork";
        $meta_title = "photoartwork";
        $meta_description = "image gellary ";

        $meta_url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
}