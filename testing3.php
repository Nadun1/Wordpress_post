<?php
/**
 * Created by PhpStorm.
 * User: Nadun
 * Date: 11/17/2016
 * Time: 9:46 AM
 */

$filenames = array();
$dir="wp-content/uploads/xxtest";
$dir1="wp-content/uploads/xxtest/";
$filenames = array();
$scan = scandir($dir);

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

foreach($scan as $file)
{
    if (!is_dir($file))
    {
        if (strpos($file, ".html")) {
            array_push($filenames, $file);
        }

    }
}

$new_post = array();

foreach ($filenames as $val) {
    echo $val."<br>";
    page_title($dir1.$val);
    echo "<br>";
}

