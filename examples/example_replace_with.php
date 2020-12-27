<?php 
include_once "../src/webparser.php";
// initialization
$doc = new WebParser();
$doc->loadHTMLFile('https://en.wikipedia.org/wiki/COVID-19_pandemic');

$doc->query("a")->append("<span style='color:blue;'>here used to be a link</span>");

$doc->output();