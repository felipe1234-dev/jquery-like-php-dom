<?php
include_once "../src/webparser.php";
// initialization
$doc = new WebParser();
$doc->loadHTML('
  <p> </p>
  <p>
      </p>
  <section style="color: red;"> Do not remove this</section>
      <div></div>
  <span>  
    
        </span>
');

$doc->removeEmptyTags();

$doc->output();
