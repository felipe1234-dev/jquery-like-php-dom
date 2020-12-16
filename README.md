# Introduction
**pQuery** is an **easy to learn simplification** of the native **PHP Dom Document**. It uses **jQuery** and **CSS selector** concepts to appear friendly to the average front-end developer.
Most of the PHP parsers I encountered in the past were either too complicated, *too simple* (you couldn't do much with them) or ***unable to run with huge files***. So, I decided to put together several basic web scrapping routines in a single document, by making use of a native already known and fast PHP feature.

# pQuery Web Scraper tutorial
## Getting started
To start coding with pQuery, just include the main php file and create a Web Scraper class object and send the parameters through the constructor, it will know if you sent a URL or an HTML string:

```php
include "path/webscraper.php";

$doc = new WebScraper("https://www.examplelink.com");

// or 

$doc = new WebScraper("<!DOCTYPE html><html><body>".$yourhtml."</body></html>");

// both work
```
And then, you can "echo" your parsed web page by using the `echo` function:

```php

$doc->echo();

```

Simple as that! 

## Start 

<!-- TABLE OF CONTENTS -->
<details open="open">
    <summary>Table of Contents</summary>
    <ol>
        <li>
            <a href="#introduction">About The Project</a>
        </li>
        <li>
            <a href="#getting-started">Getting Started</a>
        </li>
        <li>
            <a href="#usage">Usage</a>
        </li>
        <li>
            <a href="#roadmap">Roadmap</a>
        </li>
        <li>
            <a href="#contributing">Contributing</a>
        </li>
        <li>
            <a href="#license">License</a>
        </li>
        <li>
            <a href="#contact">Contact</a>
        </li>
        <li>
            <a href="#acknowledgements">Acknowledgements</a>
        </li>
    </ol>
</details>

## How do I select nodes within my HTML document?
For this, we use `query`, or its simplified version: `Q`, as its parameter we can pass in a string with the CSS query we want, for example: `$doc->Q("div.box > span#tooltip")`. 

### Html

```html
<ul>
    <li>Lorem ipsum dolor sit amet consectetuer.</li>
    <li>Aenean commodo ligula eget dolor.</li>
    <li>Aenean massa cum sociis natoque penatibus.</li>
</ul>
```

### Php

```php
include "path/webscraper.php";
$doc = new WebScraper("<!DOCTYPE html><html><body>".$html."</body></html>");

$doc->Q("ul li[2]");

// or

$doc->query("ul li[2]");

```

### Output

```html 
<li>Aenean commodo ligula eget dolor.</li>
```

It selects the second item in the list. We can also do the following to select multiple elements:

### Php

```php
include "path/webscraper.php";
$doc = new WebScraper("<!DOCTYPE html><html><body>".$html."</body></html>");

$doc->Q("ul li[1], ul li[3]");

```

### Output

```html 
<li>Lorem ipsum dolor sit amet consectetuer.</li>
<li>Aenean massa cum sociis natoque penatibus.</li>
```

Note that `query` by itself does not return anything, it needs a complement, for example: `$doc->query("something")->someFunction()`.

## Extra CSS selectors: `::text`, `::attributes` and `::comment`

When we are parsing documents, we may need to select texts within `p` tags, or manipulate or confirm the attributes of a specific tag, or even delete all HTML comments in a document, such as `<!-- this is an example comment -->`.

That's why we have the triad: `::text`, `::attributes` and `::comment` - but how can we use them?

### `::text` selector

We can select all the text nodes of a given document like this:

```php

$doc->Q("::text");

```

Or we can select the text inside a specific tag - like `h1`:

```php

$doc->Q("h1::text");

```

To print the detected information we can also use the `echo` function, check the following example:

### Html

```html

<h1>1st h1</h1>
<h1>2nd h1</h1>
<h2>Heading 2</h2>
<h3>Heading 3</h3>
<h4>Heading 4</h4>
<h5>Heading 5</h5>

```

### Php

```php
include "path/webscraper.php";
$doc = new WebScraper("<!DOCTYPE html><html><body>".$html."</body></html>");

$doc->Q("h1[2]::text")->echo();

```

### Output

```html 

2nd h1

```
As you can see, the `echo` function is multifunctional, it can be used to echo a document or nodes.

### `::attributes` selector

When we want to make a list of attributes or perhaps delete all attributes of a specific tag, we can use the selector `::attributes` to access them.

**Deleting attributes**

```php
include "path/webscraper.php";
$doc = new WebScraper("<!DOCTYPE html><html><body>".$html."</body></html>");

$doc->Q("h1::attributes")->delete();

// or 

$doc->Q("::attributes")->delete();
// deletes all attributes of all tags

```

And here's how you can print the attributes of an element:

```php
include "path/webscraper.php";
$doc = new WebScraper("<!DOCTYPE html><html><body>".$html."</body></html>");

$doc->Q("h1::attributes")->echo();

```
#### Output

```html

h1[attribute1] => "value1"
h1[attribute2] => "value2"

```
### `::comment` selector

