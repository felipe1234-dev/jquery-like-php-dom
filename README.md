# Introduction
**pQuery** is an **easy to learn simplification** of the native **PHP Dom Document**. It uses **jQuery** and **CSS selector** concepts to appear friendly to the average front-end developer.
Most of the PHP parsers I encountered in the past were either too complicated, *too simple* (you couldn't do much with them) or ***unable to run with huge files***. So, I decided to put together several basic web scrapping routines in a single document, by making use of a native already known and fast PHP feature.

# pQuery Web Scraper tutorial
## Getting started
To start coding with pQuery simply include the main PHP file in this repository and initilize an object class like this:
```php
// include webscraper.php file
include "path/webscraper.php";
// create a new object
$doc = new WebScraper();
```
In case you want to load a string containing your HTML or XML:
```php
$doc->loadHTML($html);
// or 
$doc->loadXML($xml);
```
And when you finish parsing your doc you can "echo" your parsed web page by using the `echo` function:
```php
$doc->echo();
```
But, for now, we will be using this initialization:
```php
include "path/webscraper.php";
$doc = new WebScraper();
$doc->loadHTML($html);

// code

$doc->echo();
```
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

That's why we have the triad: `::text`, `::attributes` and `::comment`.

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

## `wrap` and `unwrap`

Wrap or unwrap node elements with other node elements.

### `$html` 

```html
<img src="image.jpg" alt="JumpyDoggy" width="104" height="142">
```
### Php

```php
include "path/webscraper.php";
$doc = new WebScraper();
$doc->loadHTML($html);

$doc->Q("img[src='image.jpg']")->wrap("<figure></figure>");
// also possible: $doc->Q("img[src='image.jpg']")->wrap("figure");

$doc->echo();
```
### Output 

```html
<figure>
    <img src="image.jpg" alt="JumpyDoggy" width="104" height="142">
</figure>
```
You may also give the image wrapper attributes, like `style`, `class`, `id`, etc., like this: 

### Php

```php
include "path/webscraper.php";
$doc = new WebScraper();
$doc->loadHTML($html);

$doc->Q("img[src='image.jpg']")->wrap("<figure class='img-wrapper' style='width: 100px; height: 100px;'></figure>");

$doc->echo();
```
### Output 

```html
<figure class="img-wrapper" style="width: 100px; height: 100px;">
    <img src="image.jpg" alt="JumpyDoggy" width="104" height="142">
</figure>
```
In case you don't want it wrapped anymore, run it:

```php
include "path/webscraper.php";
$doc = new WebScraper();
$doc->loadHTML($html);

$doc->Q("img[src='image.jpg']")->unwrap();

$doc->echo();
```
### Output 

```html
<img src="image.jpg" alt="JumpyDoggy" width="104" height="142">
```
## `addClass` and `removeClass`

Add and remove class to DOM elements.

### `$html` 

```html
<h1>Give me a title class</h1>
<h2 class="title">Hey! My class should be "subtitle"!</h2>
```
### Php

```php
include "path/webscraper.php";
$doc = new WebScraper();
$doc->loadHTML($html);

$doc->Q("h1")->addClass("title");
$doc->Q("h2")->removeClass("title");
$doc->Q("h2")->addClass("subtitle");

$doc->echo();
```
### Output 

```html
<h1 class="title">Give me a title class</h1>
<h2 class="subtitle">Hey! My class should be "subtitle"!</h2>
```

## `setAttribute` and `removeAttribute`

In case `addClass` and `removeClass` are not enough (and probably are not), you can use these both functions: `setAttribute` and `removeAttribute`.

### `$html` 

```html
<form action="#" method="post">
    <div>
         <label for="name">Text Input:</label>
         <input type="text" name="name" id="age" value="" tabindex="1" />
    </div>
</form>
<button>submit</button>
```
### Php

```php
include "path/webscraper.php";
$doc = new WebScraper();
$doc->loadHTML($html);

$doc->Q("form input[name='name']")->setAttribute("id", "name");
$doc->Q("form input[name='name']")->removeAttribute("tabindex");
$doc->Q("button")->setAttribute("onclick", "document.querySelector('form').submit()");

$doc->echo();
```
### Output 

```html
<form action="#" method="post">
    <div>
         <label for="name">Text Input:</label>
         <input type="text" name="name" id="name" value=""/>
    </div>
</form>
<button onclick="document.querySelector('form').submit()">submit</button>
```

## `html` and `text`

`html` and `text` differ little, both can be used to print or return inner elements of tags, however, `text` can only be used to print/return inner text while `html` is able to print/return both html and inner text.

### `$html` 

```html
<nav>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Clients</a></li>
        <li><a href="#">Contact Us</a></li>
    </ul>
</nav>
```
### Php

```php
include "path/webscraper.php";
$doc = new WebScraper();
$doc->loadHTML($html);

echo "Result from html(): \n";
echo $doc->Q("nav")->html();

echo "\n\n";

echo "Result from text(): \n";
echo $doc->Q("nav")->text();
```
### Output 

```html
Result from html(): 

    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Clients</a></li>
        <li><a href="#">Contact Us</a></li>
    </ul>


Result from text(): 

    
        Home
        About
        Clients
        Contact Us
    

```
`echo $doc->Q("body")->text()` is a good idea in case you want a plaintext function. 

`text` and `html` can also manipulate the content inside them:

```php
include "path/webscraper.php";
$doc = new WebScraper();
$doc->loadHTML($html);

$doc->Q("nav")->html('
    <ul>
        <li><a href="home.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="clients.html">Clients</a></li>
        <li><a href="gallery.html"></a></li>
        <li><a href="plans.html"></a></li>
        <li><a href="contact.html">Contact Us</a></li>
    </ul>
');
$doc->Q("nav ul li a[href='gallery.html']")->text("Gallery");
$doc->Q("nav ul li a[href='plans.html']")->text("Plans of Service");

$doc->echo();
```
### Output 
```html
<nav>
    <ul>
        <li><a href="home.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="clients.html">Clients</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="plans.html">Plans of Service</a></li>
        <li><a href="contact.html">Contact Us</a></li>
    </ul>
</nav>
```

## `appendHtml` and `prependHtml`

`appendHtml` inserts html at the **end** of a DOM element, while `prependHtml` inserts html at the start.

### `$html` 

```html
<div id="append"></div>
<br/>
<div id="prepend"></div>
```

### Php

```php
include "path/webscraper.php";
$doc = new WebScraper();
$doc->loadHTML($html);

$i = 0;
while ($i < 5) {
    $i++;
    $doc->Q("#append")->appendHtml("<p id='".$i."'>".$i."</p>");
}

$j = 0;
while ($j < 5) {
    $j++;
    $doc->Q("#prepend")->prependHtml("<p id='".$j."'>".$j."</p>");
}

$doc->echo();
```
### Output 

```html
<div id="append">
    <p id="1">1</p>
    <p id="2">2</p>
    <p id="3">3</p>
    <p id="4">4</p>
    <p id="5">5</p>
</div>
<br/>
<div id="prepend">
    <p id="5">5</p>
    <p id="4">4</p>
    <p id="3">3</p>
    <p id="2">2</p>
    <p id="1">1</p>
</div>
```

## `hasClass` and `hasAttr`

These functions are built to test if an element has a specific class/attribute or not. If it does, it returns true. 

### `$html` 

```html
<p class="rice">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
<p data-target="lord">Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
```

### Php

```php
include "path/webscraper.php";
$doc = new WebScraper();
$doc->loadHTML($html);

if ($doc->Q("p[1]")->hasClass("rice")) {
    echo "p[1] has class \"rice\": true \n\n";
}

if ($doc->Q("p[2]")->hasAttr("data-target", "lady")) {
    echo "p[2] has attribute \"data-target\" with value \"lady\": false";
}

$doc->echo();
```
### Output 

```html
p[1] has class "rice": true

p[2] has attribute "data-target" with value "lady": false
```

## `delete` 

The delete function is used to delete DOM nodes. 
It accepts a boolean as a parameter: `true` or `false`, `true` tells it to keep its inner content (be it text or html nodes), while `false` tells it the opposite. The default parameter is set to `true`.

### `$html` 

```html
<head>
    <style>
        code {
          font-family: Consolas,"courier new";
          color: crimson;
          background-color: #f1f1f1;
          padding: 2px;
          font-size: 105%;
        }
    </style>
</head>
<body>

    <p>The HTML <code>button</code> tag defines a clickable button.</p>
    <p>The CSS <code>background-color</code> property defines the background color of an element.</p>

</body>
```

### Php

```php
include "path/webscraper.php";
$doc = new WebScraper();
$doc->loadHTML($html);

$doc->Q("style")->delete();

$doc->echo();
```
### Output 

```html
<head>
</head>
<body>

    <p>The HTML <code>button</code> tag defines a clickable button.</p>
    <p>The CSS <code>background-color</code> property defines the background color of an element.</p>

</body>
```
In the other hand...

```php
include "path/webscraper.php";
$doc = new WebScraper();
$doc->loadHTML($html);

$doc->Q("p")->delete(true);

$doc->echo();
```

Will output

```html
<head>
</head>
<body>

    The HTML <code>button</code> tag defines a clickable button.
    The CSS <code>background-color</code> property defines the background color of an element.

</body>
```


## `iterate` and `replaceText` 

These functions are built to test if an element has a specific class/attribute or not. If it does, it returns true. 

### `$html` 

```html
<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>

<p>It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>

<p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then</p>
```

### Php

```php
include "path/webscraper.php";
$doc = new WebScraper();
$doc->loadHTML($html);

if ($doc->Q("p[1]")->hasClass("rice")) {
    echo "p[1] has class \"rice\": true \n\n";
}

if ($doc->Q("p[2]")->hasAttr("data-target", "lady")) {
    echo "p[2] has attribute \"data-target\" with value \"lady\": false";
}

$doc->echo();
```
### Output 

```html
p[1] has class "rice": true

p[2] has attribute "data-target" with value "lady": false
```
