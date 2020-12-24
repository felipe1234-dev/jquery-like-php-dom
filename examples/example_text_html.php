<?php 
include "../src/webparser.php";
$doc = new WebParser();
$doc->loadHTML('
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Clients</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
    </nav>
');

echo "Result from html(): \n";
echo $doc->Q("nav")->html();

echo "\n\n";

echo "Result from text(): \n";
echo $doc->Q("nav")->text();
