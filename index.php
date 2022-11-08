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
for ($i = 0; $i < count($poemArr); $i++) {
    // $file = fopen($poemArr[$i] . ".txt", "r");
    $file = fopen($poemArr[$i] . ".txt", "w+");
    fwrite($file, $poems[$i]);
    $file = fopen($poemArr[$i] . ".txt", "r");
    $content = fread($file, filesize($poemArr[$i] . ".txt"));
    $html = fopen($path . "/" . $poemArr[$i] . ".html", "w");
    fwrite($html, $strb);
    fwrite($html, "\n");
    fwrite($html, "<pre>");
    fwrite($html, $content);
    fwrite($html, "</pre>");
}

if (!is_dir($path)) {
    mkdir($path);
}
echo realpath($path);
echo "\n";
echo getcwd();
echo "\n";
chdir('new');

echo getcwd();
echo "\n";
