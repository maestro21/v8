<?php
/**
 * Created by PhpStorm.
 * User: adiacom NUC1
 * Date: 12/8/2017
 * Time: 4:18 PM
 */



function createthumb($name,$filename,$new_w,$new_h,$type){

    switch($type){
        case 'image/jpg':
        case 'image/jpeg':
            $src_img=imagecreatefromjpeg($name); $type = "jpg";
            break;

        case 'image/gif':
            $src_img=imagecreatefromgif($name); $type = "gif";
            break;

        case 'image/png':
            $src_img=imagecreatefrompng($name); $type = "png";
            break;
    }

    //size of src image
    $orig_w = imagesx($src_img);
    $orig_h = imagesy($src_img);


    $w_ratio = ($new_w / $orig_w);
    $h_ratio = ($new_h / $orig_h);

    if ($orig_w > $orig_h ) {//landscape
        $crop_w = round($orig_w * $h_ratio);
        $crop_h = $new_h;
        $src_x = ceil( ( $orig_w - $orig_h ) / 2 );
        $src_y = 0;
    } elseif ($orig_w < $orig_h ) {//portrait
        $crop_h = round($orig_h * $w_ratio);
        $crop_w = $new_w;
        $src_x = 0;
        $src_y = ceil( ( $orig_h - $orig_w ) / 2 );
    } else {//square
        $crop_w = $new_w;
        $crop_h = $new_h;
        $src_x = 0;
        $src_y = 0;
    }
    $dest_img = imagecreatetruecolor($new_w,$new_h);
    imagesavealpha($dest_img, true);
    $alpha = imagecolorallocatealpha($dest_img, 0, 0, 0, 127);
    imagefill($dest_img, 0, 0, $alpha);

    imagecopyresampled($dest_img, $src_img, 0 , 0 , $src_x, $src_y, $crop_w, $crop_h, $orig_w, $orig_h);

    switch($type){
        case 'jpg': imagejpeg($dest_img,$filename);  break;
        case 'gif': imagegif($dest_img,$filename);  break;
        case 'png': imagepng($dest_img,$filename); break;
    }

    imagedestroy($dest_img);
    imagedestroy($src_img);
}

const GFXDIR = 'gfx/galleries/';

function f($filename) {
    global $_FILES;
    if(isset($_FILES[$filename])) return $_FILES[$filename];
    return NULL;
}

function getImgById($id, $prefix = true) {
    $imgs = cache('galleries_images');
    if(!isset($imgs[$id])) return '';
    $img =  $imgs[$id];
    if($prefix) $img = BASEFMURL . GFXDIR . $img;
    return $img;
}

function getImgDataById($id) {
    $imgs = cache('galleries_images');
    $gals = cache('galleries');
    $img = $imgs[$id];
    $img['dir'] = $gals[$img['gal_id']]['slug'];
    return $img;
}

function getThumbById($id) {
    $imgs = cache('galleries_thumbs');
    if(isset($imgs[$id])) return $imgs[$id];
    return getImgById($id);
}

function getImg($img, $dir, $prefix = false) {
    $ret = $dir .'/' . $img;
    if($prefix) $ret = BASEFMURL . GFXDIR . $ret;
    return  $ret;
}

function getthumb($img, $dir = '', $echo = true, $prefix = false){
    $dir  = GFXDIR . $dir;
    $thumbpath = BASEFMDIR .  $dir . '/' . THUMB_PREFIX . $img;
    $thumburl = BASEFMURL .  $dir . '/' . THUMB_PREFIX . $img; //echo $thumburl; die();
    if(!file_exists($thumbpath)) {
        $thumbpath = BASEFMDIR .  $dir . '/' . $img;
        $thumburl = BASEFMURL .  $dir . '/' . $img;
    }
    if(file_exists($thumbpath)) {
        if($echo)
            return " style=\"background-image:url('$thumburl');\"";
        else
            return $thumburl;
    }

}

function img($gid, $iid, $echo = false, $prefix = false) {
    $gals = cache('galleries');
    $slug = $gals[$gid]['slug'];
    $imgs = cache('gal_' . $gid);
    $img = $imgs[$iid];
    $url = BASEFMURL . 'gfx/galleries/' . $slug . '/' . $img;
    if($echo)
        return " style=\"background-image:url('$url');\"";
    else
        return $url;
}
