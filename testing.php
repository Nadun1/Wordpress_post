<?php
/**
 * Created by PhpStorm.
 * User: Nadun
 * Date: 11/16/2016
 * Time: 3:27 PM
 */
$filenames = array();
$dir="H:/Full Backup 1-old/Lawnet/docs/articles/international/HTML";
$dir1="H:/Full Backup 1-old/Lawnet/docs/articles/international/HTML/";
    if ($dh = opendir($dir)) {
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
            $file = readfile($dir1.$val);

            echo $file;
            //page_title($dir1.$val);
            echo "<br>";
    }

}
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
