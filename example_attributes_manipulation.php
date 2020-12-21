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
//-----------------------------------------------------------------------------//


$doc->query("h1")->editText("Not working form");
$doc->output();

echo "<br>";

// if you are changing the same object you can write all its modifications in one line
$doc->query("form input[name='name']")->addAttr("id", "name")->removeAttr("tabindex");
$doc->query("button")->addAttr("onclick", "document.querySelector('form').submit()");

$doc->query("h1")->editText("Working form");
$doc->output();