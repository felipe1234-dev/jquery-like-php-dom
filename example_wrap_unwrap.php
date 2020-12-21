<?php
include_once "../src/webparser.php";
// initialization
$doc = new WebParser();
$doc->loadHTML('
    <div>
        <ul>
            <li><a href="#nowhere" title="Lorum ipsum dolor sit amet">Lorem</a></li>
            <li><a href="#nowhere" title="Aliquam tincidunt mauris eu risus">Aliquam</a></li>
            <li><a href="#nowhere" title="Morbi in sem quis dui placerat ornare">Morbi</a></li>
            <li><a href="#nowhere" title="Praesent dapibus, neque id cursus faucibus">Praesent</a></li>
            <li><a href="#nowhere" title="Pellentesque fermentum dolor">Pellentesque</a></li>
        </ul>
    </div>
');

// queries all divs and unwraps them
$doc->query("div ul")->unwrap();
$doc->query("ul")->wrap('<section class="bookshelf"></section>');

// shows output
$doc->output();
// ----------------------------------------------------------------------------------------------------------
$doc->loadHTML('
    <table class="data">
        <tr>
            <th>Entry Header 1</th>
            <th>Entry Header 2</th>
            <th>Entry Header 3</th>
            <th>Entry Header 4</th>
        </tr>
        <tr>
            <td>Entry First Line 1</td>
            <td>Entry First Line 2</td>
            <td>Entry First Line 3</td>
            <td>Entry First Line 4</td>
        </tr>
        <tr>
            <td>Entry Line 1</td>
            <td>Entry Line 2</td>
            <td>Entry Line 3</td>
            <td>Entry Line 4</td>
        </tr>
        <tr>
            <td>Entry Last Line 1</td>
            <td>Entry Last Line 2</td>
            <td>Entry Last Line 3</td>
            <td>Entry Last Line 4</td>
        </tr>
    </table>
');

$doc->query("table.data tr td[1]::text")->wrap('<span style="color: red; font-weight: bold;"></span>');
$doc->query("table.data tr td[2]::text")->wrap('<span style="color: blue; font-weight: bold;"></span>');
$doc->query("table.data tr td[3]::text")->wrap('<span style="color: green; font-weight: bold;"></span>');
$doc->query("table.data tr td[4]::text")->wrap('<span style="color: orange; font-weight: bold;"></span>');

$doc->output();