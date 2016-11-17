<?php
/**
 * Created by PhpStorm.
 * User: Nadun
 * Date: 11/17/2016
 * Time: 9:21 AM
 */
$filenames = array();
$dir="wp-content/uploads/xxtest";
$dir1="wp-content/uploads/xxtest/";

function page_title($url) {
    $fp = file_get_contents($url);
    if (!$fp)
        return null;

    $res = preg_match("/<title>(.*)<\/title>/siU", $fp, $title_matches);
    if (!$res)
        return null;

    // Clean up title: remove EOL's and excessive whitespace.
    $title = preg_replace('/\s+/', ' ', $title_matches[1]);
    $title = trim($title);
    echo $title;
}

if ($dh = scandir($dir)) {
    while (($file = readdir($dh)) !== false) {
        if (strpos($file, ".html")) {
            //echo(returnYear($file));
            //$filenames = array();
            array_push($GLOBALS['filenames'], $file);
            //print_r($filenames);
            //echo "filename:" . $file . "<br>";
        }
    }
    foreach($filenames as $val){


// Open the file using the HTTP headers set above
        //$file = readfile($dir1.$val);

        //echo $file;
        page_title($dir1.$val);
        echo "<br>";
    }

}

