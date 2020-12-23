# `wrap` and `unwrap`

<a href="start.md"><b><< Previous</b></a>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;
<a href="start.md"><b>Next >></b></a>

Are used to wrap or unwrap nodes with other node elements.

## Syntax: `wrap`

```php
$doc->query("[selection]")->wrap("<[tagname] [attributes...]></[tagname]>");
```
### `$html` 

```html
<img src="image.jpg" alt="JumpyDoggy" width="104" height="142">
```
<details><summary><b>Wrap with no tag attributes</b></summary>

Php
```php
<?php
include "../src/webscraper.php";
$doc = new WebScraper();
$doc->loadHTML($html);

$doc->query("img[src='image.jpg']")->wrap("<figure></figure>");
// also possible: $doc->query("img[src='image.jpg']")->wrap("figure");

$doc->output();
```

Output
```html
<figure>
    <img src="image.jpg" alt="JumpyDoggy" width="104" height="142">
</figure>
```
</details>

<details><summary><b>Wrap with tag attributes</b></summary>

Php
```php
<?php
include "../src/webscraper.php";
$doc = new WebScraper();
$doc->loadHTML($html);

$doc->query("img[src='image.jpg']")->wrap('<figure class="img-wrapper" style="float: center; display: inline-block;"></figure>');

$doc->output();
```

Output
```html
<figure class="img-wrapper" style="float: center; display: inline-block;">
    <img src="image.jpg" alt="JumpyDoggy" width="104" height="142">
</figure>
```
</details>


## Syntax: `unwrap`

```php
$doc->query("[selection]")->unwrap();
```
### `$html` 

```html
<figure class="img-wrapper" style="float: center; display: inline-block;">
    <img src="image.jpg" alt="JumpyDoggy" width="104" height="142">
</figure>
```
<details><summary><b>Php</b></summary>

```php
<?php
include "../src/webscraper.php";
$doc = new WebScraper();
$doc->loadHTML($html);

$doc->query("img[src='image.jpg']")->unwrap();

$doc->output();
```

</details>


<details><summary><b>Output</b></summary>

```html
<img src="image.jpg" alt="JumpyDoggy" width="104" height="142">
```

</details>

## Example test code snippet

Click [here](../examples/example_wrap_unwrap.php) to go to example test.
