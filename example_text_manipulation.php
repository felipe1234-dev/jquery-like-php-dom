<?php
include_once "../src/webparser.php";
// initialization
$doc = new WebParser();
$doc->loadHTMLFile('https://en.wikipedia.org/wiki/COVID-19_pandemic');

// *::text stands for "text (::text) nodes inside all tags (*)"
// replaces all a's with Z's
$doc->query("*::text")->replaceText("/a/", "Z");

$doc->output();