# `hasClass` and `hasAttr`

<a href="append-and-prepend.md"><b><< Previous</b></a>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;
<a href="remove-and-clear.md"><b>Next >></b></a>

The `hasClass()` and `hasAttr()` methods check if any of the selected elements have a specified class name and attribute, respectively.

If ANY of the selected elements has the specified class name or attribute, these methods will return `true`.

## Syntax: `hasClass` and `hasAttr`

```php
$doc->Q([selector])->hasClass([className]);
$doc->Q([selector])->hasAttr([attribute]);
```

### `$html` 

```html
<p>This is a paragraph.</p>
<p>This is another paragraph.</p>

<ol>
  <li>List item 1</li>
  <li>List item 2</li>
  <li>List item 3</li>
</ol>
```

<details><summary><b>Php</b></summary>

```php
<?php
include "../src/webparser.php";
$doc = new WebParser();
$doc->loadHTML($html);

$doc->Q("ol")->append("<li>Appended html</li>");
$doc->Q("ol")->prepend("<li>Prepended html</li>");

$doc->output();
```
</details>

<details><summary><b>Output</b></summary>

```html
<p>This is a paragraph.</p>
<p>This is another paragraph.</p>

<ol>
  <li>Prepended html</li>
  <li>List item 1</li>
  <li>List item 2</li>
  <li>List item 3</li>
  <li>Appended html</li>
</ol> 
```
</details>

## Example test code snippet

Click [here](../examples/example_append_prepend.php) to go to example test.