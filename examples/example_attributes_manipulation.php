<?php
include_once "../src/webparser.php";

// initialization
$doc = new WebParser();
$doc->loadHTML('
    <h1></h1>
    <form action="#" method="get">
        <div>
            <label for="name">Type your name:</label>
            <input type="text" name="name" id="age" value="" tabindex="1" />
        </div>
    </form>
    <button>submit</button>
');
//-----------------------------------------------------------------------------------//


$doc->query("h1")->text("Not working form");
$doc->output();

echo "<br>";

// if you are changing the same element multiple times
// you can write all its modifications in one line
$doc->query("form input[name='name']")->attr("id", "name")->removeAttr("tabindex");
$doc->query("button")->attr("onclick", "document.querySelector('form').submit()");
$doc->query("h1")->text("Working form");

$doc->output();