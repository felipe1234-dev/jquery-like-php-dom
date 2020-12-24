# `addClass` and `removeClass`

<a href="wrap-and-unwrap.md"><b><< Previous</b></a>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;
<a href="attr-and-removeattr.md"><b>Next >></b></a>

The `addClass()` and `removeClass()` methods add or remove one or more class names to the selected elements.

**Tip**: To add more than one class, separate the class names with spaces.

## Syntax: `addClass` and `removeClass`

```php
$doc->query("[selection]")->addClass("[className]");
$doc->query("[selection]")->removeClass("[className]");
```
### `$html` 

```html
<h1>Give me a title class</h1>
<h2 class="title">Hey! My class should be "subtitle"!</h2>
```

### Php

```php
<?php
include "../src/webscraper.php";
$doc = new WebScraper();
$doc->loadHTML($html);

$doc->Q("h1")->addClass("title");
$doc->Q("h2")->removeClass("title");
$doc->Q("h2")->addClass("subtitle");

$doc->output();
```

### Output

```html
<h1 class="title">Give me a title class</h1>
<h2 class="subtitle">Hey! My class should be "subtitle"!</h2>
```

## Example test code snippet

Click [here](../examples/example_editclass_removeclass.php) to go to example test.
