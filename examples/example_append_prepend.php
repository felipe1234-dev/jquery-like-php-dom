<?php
include "path/webparser.php";
$doc = new WebParser();
$doc->loadHTML('
  <div id="append"></div>
  <br/>
  <div id="prepend"></div>
');

$i = 0;
while ($i < 5) {
    $i++;
    $doc->Q("#append")->append("<p id='".$i."'>".$i."</p>");
}

$j = 0;
while ($j < 5) {
    $j++;
    $doc->Q("#prepend")->prepend("<p id='".$j."'>".$j."</p>");
}

$doc->output();
