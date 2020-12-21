<?php
include_once "../src/webparser.php";
// initialization
$doc = new WebParser();
$doc->loadHTMLFile('https://en.wikipedia.org/wiki/COVID-19_pandemic');

$doc->query("img")->src("sick-sponge-bob.jpg");

$doc->output();