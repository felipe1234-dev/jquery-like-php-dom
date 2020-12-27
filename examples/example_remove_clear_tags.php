<?php
include_once "../src/webparser.php";
// initialization
$doc = new WebParser();
$doc->loadHTMLFile('https://en.wikipedia.org/wiki/COVID-19_pandemic');

$doc->Q("nav")->clear();
$doc->Q("script, noscript, head, style")->remove();

$doc->output();