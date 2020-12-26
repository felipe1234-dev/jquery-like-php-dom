
# Getting Started

<details><summary><b>Initialization</b></summary>

```php
<?php
include "path/webparser.php";
$doc = new WebParser();
```
</details>
<details><summary><b>Load URLs</b></summary>

```php
$doc->loadHTMLFile($url);
```
</details>
<details><summary><b>Load HTML String</b></summary>

```php
$doc->loadHTML($html);
```
</details>
<details><summary><b>Load XML String</b></summary>

```php
$doc->loadXML($xml);
```
</details>
<details><summary><b>Echo parsed doc</b></summary>

```php
$doc->output();
?>
```
</details> 

## `query` and `Q`

Both do the same thing, `Q` is short for `query` in case you want to write less. Are used to find elements in DOM.
```php
$doc->query("li");
// Note: impacts -all- <li> tags
```
```php
$doc->query("li[1]");
// Note: impacts -1st- <li> tag only
```
```php
$doc->query("li *[1]");
$doc->query("li:first-child");
// Note: impact <li>s' -first child- 
```
Also possible: 

```php
$doc->Q("[selection]");
```

## `count`

It counts occurrences of element.

```php
echo $doc->query("[selection]")->count();
```
[**Click here to see example >>**](../examples/count.php)


## `removeEmptyTags`

Removes all empty tags. No need for `query()`.

```php
echo $doc->removeEmptyTags();
```
[**Click here to see example >>**](../examples/count.php)


## `iterate`

You may need a different treatment for each element depending on a set of decisions - `iterate` lets you have this freedom. 

```php
$doc->query("*")->iterate(function($item){
    # code ... ex. "$item->hasClass...."
});
```
[**Click here to see example >>**](../examples/count.php)

## Extra CSS selectors: `*`, `::text`, `::attributes` and `::comments`

These are 3 new selectors that try to emulate the behaviors of the following xpathes: `*`, `text()`, `@*` and `comment()`. 
If you have been using xpath for a long time, you already understand how they work, but if not, here it is a simple review:

### `*` - Global selector - matches everything
<details><summary>Match everything anywhere</summary>

```php
$doc->query("*");
```
</details>
<details><summary>Match everything that is inside a p tag only</summary>

```php
$doc->query("p *");
```
</details>

### `::text` - queries text nodes
<details><summary>Match text nodes anywhere</summary>

```php
$doc->query("*::text");
```
</details>

<details><summary>Match text inside p tags</summary>

```php
$doc->query("p::text");
```
</details>

### `::attributes` - queries node attributes
<details><summary>Match all attributes of any tags</summary>

```php
$doc->query("*::attributes");
```
</details>

<details><summary>Match all attributes of p tags</summary>

```php
$doc->query("p::text");
```
</details>

<details><summary>Match href attribute of a tags</summary>

```php
$doc->query("a::href");
```
</details>

### `::comments` - queries HTML comments
<details><summary>Match all HTML comments nested anywhere</summary>

```php
$doc->query("*::comments");
```
</details>

<details><summary>Match HTML comments which are nested in div tags</summary>

```php
$doc->query("div::comments");
```
</details>


<!-- TABLE OF CONTENTS -->
<details open="open">
    <summary>List of Methods</summary>
    <ol>
        <li>
            <a href="wrap-and-unwrap.md">
                wrap() and Unwrap()
            </a>
        </li>
        <li>
            <a href="addclass-and-removeclass.md">
                addClass() and removeClass()
            </a>
        </li>
        <li>
            <a href="attr-and-removeattr.md">
                attr() and removeAttr()
            </a>
        </li>
        <li>
            <a href="html-and-text.md">
                html() and text()
            </a>
        </li>
        <li>
            <a href="append-and-prepend.md">
                append() and prepend()
            </a>
        </li>
        <li>
            <a href="remove-and-clear.md">
                remove() and clear()
            </a>
        </li>
        <li>
            <a href="replacetext-and-replacetextcallback.md">
                replaceText() and replaceTextCallback()
            </a>
        </li>
        <li>
            <a href="replacewith.md">
                replaceWith()
            </a>
        </li>
    </ol>
</details>