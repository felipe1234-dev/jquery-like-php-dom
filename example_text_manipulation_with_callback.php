<?php 
include_once "../src/webparser.php";
// initialization
$doc = new WebParser();
$doc->loadHTMLFile('https://en.wikipedia.org/wiki/COVID-19_pandemic');

// a simple regex to match sentences
$pattern = "/([A-Z][^\.!?]*[\.!?]*(<br>)*)/";
// * stands for all tags
// ::text queries node texts
$doc->query("*::text")->replaceTextCallback($pattern, function($m){
    static $id = 0;
    $id++;

    return "<label id='$id'>$m[1]</label>";
}, true);
// try changing true to false

$doc->output();