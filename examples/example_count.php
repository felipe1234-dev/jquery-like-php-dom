<?php
include_once "../src/webparser.php";
// initialization
$doc = new WebParser();
$doc->loadHTMLFile('https://en.wikipedia.org/wiki/COVID-19_pandemic');

// ------------------------------------------
echo "Number of occurrences of \"a\" tag : ";
echo $doc->query("a")->count();
// ------------------------------------------

echo "<br><br>";

// --------------------------------------------
echo "Number of occurrences of \"img\" tag : ";
echo $doc->query("img")->count();
// --------------------------------------------

echo "<br><br>";

// --------------------------------------------
echo "Number of occurrences of \"div\" tag : ";
echo $doc->query("div")->count();
// --------------------------------------------

echo "<br><br>";

// ---------------------------------------------
echo "Number of occurrences of \"span\" tag : ";
echo $doc->query("span")->count();
// ---------------------------------------------

echo "<br><br>";

// ----------------------------------------------
echo "Number of occurrences of \"table\" tag : ";
echo $doc->query("table")->count();
// ----------------------------------------------
