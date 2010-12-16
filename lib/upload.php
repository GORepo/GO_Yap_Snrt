<?php

function imgUpload($attr){
    $path_big = $_SERVER['DOCUMENT_ROOT'] . "/activities";
    $path_thumbs = $_SERVER['DOCUMENT_ROOT'] . "/activities/thumbs";
    $img_thumb_width = 160; //
    $extlimit = "yes"; //Limit allowed extensions? (no for all extensions allowed)
    $limitedext = array(".gif", ".jpg", ".png", ".jpeg", ".bmp");
    $file_type = $attr['type'];
    $file_name = $attr['name'];
    $file_size = $attr['size'];
    $file_tmp = $attr['tmp_name'];
    if (!is_uploaded_file($file_tmp)) {
        echo "Error: Please select a file to upload!. <br>--<a href=\"$_SERVER[PHP_SELF]\">back</a>";
    }
    $ext = strrchr($file_name, '.');
    $ext = strtolower($ext);
    if (($extlimit == "yes") && (!in_array($ext, $limitedext))) {
        echo "Wrong file extension.  <br>--<a href=\"$_SERVER[PHP_SELF]\">back</a>";
    }
    $getExt = explode('.', $file_name);
    $file_ext = $getExt[count($getExt) - 1];
    $rand_name = md5(time());
    $rand_name = rand(0, 999999999);
    $ThumbWidth = $img_thumb_width;
    if ($file_size) {
        if ($file_type == "image/pjpeg" || $file_type == "image/jpeg") {
            $new_img = imagecreatefromjpeg($file_tmp);
        } elseif ($file_type == "image/x-png" || $file_type == "image/png") {
            $new_img = imagecreatefrompng($file_tmp);
        } elseif ($file_type == "image/gif") {
            $new_img = imagecreatefromgif($file_tmp);
        }
        list($width, $height) = getimagesize($file_tmp);
        $imgratio = $width / $height;
        if ($imgratio > 1) {
            $newwidth = $ThumbWidth;
            $newheight = $ThumbWidth / $imgratio;
        } else {
            $newheight = $ThumbWidth;
            $newwidth = $ThumbWidth * $imgratio;
        }
        if (function_exists(imagecreatetruecolor)) {
            $resized_img = imagecreatetruecolor($newwidth, $newheight);
        } else {
            die("Error: Please make sure you have GD library ver 2+");
        }
        imagecopyresized($resized_img, $new_img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        ImageJpeg($resized_img, "$path_thumbs/$rand_name.$file_ext");
        ImageDestroy($resized_img);
        ImageDestroy($new_img);
    }
     move_uploaded_file($file_tmp, "$path_big/$rand_name.$file_ext");

       return "$rand_name.$file_ext"; 
}
?>