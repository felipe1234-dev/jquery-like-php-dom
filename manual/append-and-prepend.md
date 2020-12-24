# `html` and `text`

<a href="html-and-tet.md"><b><< Previous</b></a>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;
<a href="hasclass-and-hasattr.md.md"><b>Next >></b></a>

The `append()` method inserts specified content at the end of the selected elements.

**Tip:** To insert content at the beginning of the selected elements, use the `prepend()` method.

## Syntax: `append` and `prepend`

```php
$doc->Q([selector])->append([html-content]);
$doc->Q([selector])->prepend([html-content]);
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
$doc = new WebScraper();
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

Click [here](../examples/example_editclass_removeclass.php) to go to example test.
