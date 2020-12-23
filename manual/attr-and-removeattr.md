# `attr` and `removeAttr`

<a href="addclass-and-removeclass.md"><b><< Previous</b></a>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;
<a href="html-and-text.md"><b>Next >></b></a>

The `attr()` method sets or returns attributes and values of the selected elements.

When this method is used to **return** the attribute value, it returns the value of the FIRST matched element.

In case you want to return the attribute value of all matched elements, you must use `iterate()` together. See [`start.md`](start.md) for more information.

When this method is used to **set** attribute values, it sets one or more attribute/value pairs for the set of matched elements.

The `removeAttr()` method removes one or more attributes from the selected elements.

## Syntax: `attr`

Return the value of an attribute:

```php
$doc->Q([selector])->attr([attribute]);
```

Set the attribute and value:

```php
$doc->Q([selector])->attr([attribute], [value]);
```

### `$html` 

```html
<img src="img_pulpitrock.jpg" alt="Pulpit Rock" 
width="284" height="213">
```

<details><summary><b>Php</b></summary>

```php
<?php
include "../src/webscraper.php";
$doc = new WebScraper();
$doc->loadHTML($html);

$doc->Q("img")->attr("width", "500px");

$doc->output();
```
</details>

<details><summary><b>Output</b></summary>

```html
<img src="img_pulpitrock.jpg" alt="Pulpit Rock" 
width="500px" height="213">
```
</details>

## Syntax: `removeAttr`

```php
$doc->Q([selector])->removeAttr([attribute]);
```

### `$html` 

```html
<p style="font-size:120%;color:red">This is a paragraph.</p>
<p style="font-weight:bold;color:blue">This is another paragraph.</p>
```

<details><summary><b>Php</b></summary>

```php
<?php
include "../src/webscraper.php";
$doc = new WebScraper();
$doc->loadHTML($html);

$doc->Q("p")->removeAttr("style");

$doc->output();
```
</details>

<details><summary><b>Output</b></summary>

```html
<p>This is a paragraph.</p>
<p>This is another paragraph.</p>
```
</details>

## Example test code snippet

Click [here](../examples/example_attributes_manipulation.php) to go to example test.
