<?php 
include_once "../src/webparser.php";
// initialization
$doc = new WebParser();
$doc->loadHTMLFile('https://en.wikipedia.org/wiki/COVID-19_pandemic');

$doc->query("head")->append("<style>
    .link {
        color: red;
        font-size: 20px;
        font-weight: bold;
    }
    .letter-a {
        font-size: 20px;
    }
    .bold {
        font-weight: bold;
    }
    .light {
        font-weight: light;
    }
</style>");

$doc->Q("a")->addClass("link");
$doc->Q("*::text")->replaceText("/(a)/i", '<span id="a-letter">$1</span>', true);
$doc->Q("span#a-letter")->addClass("a-letter bold");

$doc->output();

$doc->Q(".a-letter")->removeClass("bold")->addClass("light");

$doc->output();