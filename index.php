<?php
include "arrays.php";
$strb = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>';
$str_e = '</body>
</html>';
$path = "new";
if (!is_dir($path)) {
    mkdir($path);
}
// for ($i = 0; $i < count($poemArr); $i++) {
//     // $file = fopen($poemArr[$i] . ".txt", "r");
//     $file = fopen($poemArr[$i] . ".txt", "w+");
//     fwrite($file, $titles[$i]."\n");
//     fwrite($file, $poems[$i]);
//     $file = fopen($poemArr[$i] . ".txt", "r");
//     $content = fread($file, filesize($poemArr[$i] . ".txt"));
//     $strArr = explode("\n", $content);
//     $firstStr = $strArr[0];
//     $strArr[0] = "";
//     $content = implode("\n", $strArr);
//     // print_r($strArr);
//     $html = fopen($path . "/" . $poemArr[$i] . ".html", "w");
//     fwrite($html, $strb);
//     fwrite($html, "\n");
//     fwrite($html, "<h1>");
//     fwrite($html, $firstStr);
//     fwrite($html, "</h1>");
//     fwrite($html, "\n");
//     fwrite($html, "<pre>");
//     fwrite($html, $content);
//     fwrite($html, "</pre>");
//     fwrite($html, $str_e);
//     // print_r(scandir(""));
// }
$poemsPath = "./poems";

if (is_dir($poemsPath)) {
    $files = scandir($poemsPath, 1);
    for ($i = 0; $i < count($files); $i++) {
        if ($files[$i] != '.' && $files[$i] != '..') {
            $filename = $poemsPath . "/" . $files[$i];
            echo $filename . "\n";
            $file = fopen($filename, "r");
            $content = fread($file, filesize($filename));
            $strArr = explode("\n", $content);
            $firstStr = $strArr[0];
            $strArr[0] = "";
            $content = implode("\n", $strArr);
            $new_filename = pathinfo($files[$i], PATHINFO_FILENAME);
            $html = fopen($path . "/" . $new_filename . ".html", "w");
            fwrite($html, $strb);
            fwrite($html, "\n");
            fwrite($html, "<h1>");
            fwrite($html, $firstStr);
            fwrite($html, "</h1>");
            fwrite($html, "\n");
            fwrite($html, "<pre>");
            fwrite($html, $content);
            fwrite($html, "</pre>");
            fwrite($html, "\n");
            fwrite($html, $str_e);
        }
    }
}

// if (!is_dir($path)) {
//     mkdir($path);
// }
echo realpath($path);
echo "\n";
echo getcwd();
echo "\n";
chdir('new');

echo getcwd();
echo "\n";
