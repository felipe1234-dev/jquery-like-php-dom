# Introduction
**pQuery** is an **easy to learn simplification** of the native **PHP Dom Document**. It uses **jQuery** and **CSS selector** concepts to appear friendly to the average front-end developer.
Most of the PHP parsers I encountered in the past were either too complicated, *too simple* (you couldn't do much with them) or ***unable to run with huge files***. So, I decided to put together several basic web scrapping routines in a single document, by making use of a native already known and fast PHP feature.

# pQuery Web Scraper tutorial
## Get Started
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

Simple as that! But for now, let's start with the sample pages in the `samples` folder, in order to give examples.

## Start
Click on the links below to navigate between sections and start learning:

|Routines|
|------------|
| [`query()` function and CSS selector](#query-routine) |
| [`{text}`, `{attrs}` and `{comment}`](#other-css-selectors) |
| [`echo()` function](#echo-routine) |
| [`return()` function](#return-routine) |
| [`count()` function](#count-routine) |
| [`delEmptyTags()` function](#delEmptyTags-routine) |
| [`setAttribute()` function](#setAttribute-routine) |
| [`addClass()` and `removeClass` functions](#addClass-&-removeClass-routines) |
| [`wrap()` and `unwrap()` function](#wrap-&-unwrap-routines) |
| [`html()` function](#html-routine) |
| [`appendHtml()` function](#appendHtml-routine) |
| [`text()` function](#text-routine) |
| [`empty()` function](#empty-routine) |
| [`delete()` function](#delete-routine) |
| [`replaceWith()` function](#replaceWith-routine) |
| [`replaceText()` and `replaceTextCallback()` function](#replaceText-&-replaceTextCallback-routine) |


## How do I select nodes within my HTML document?
For this, we use `query`, or its simplified version: `Q`, as its parameter we can pass in a string with the CSS query we want, for example: `$doc->Q("div.box > span#tooltip")`. That means: "find a `span` tag whose `id` value is 'tooltip' within a div whose `class` name is 'box'". Just like normal CSS.

### Html

```html
<h1>One morning, when Gregor Samsa woke from troubled 
dreams.</h1>

<p>One morning, when Gregor Samsa woke from troubled 
dreams, he found himself transformed in his bed into 
a horrible vermin. He lay on his armour-like back, 
and if he lifted his head a little he could see his 
brown belly, slightly domed and divided by arches into 
stiff sections.
<a class="external ext" href="#">link</a> waved about 
helplessly as he looked. "What's happened to me? " he 
thought. It wasn't a dream. His room, a proper human 
room although a little too small, lay peacefully 
between its four familiar walls.</p>

<h2>The bedding was hardly able to cover it.</h2>
<ul>
    <li>Lorem ipsum dolor sit amet consectetuer.</li>
    <li>Aenean commodo ligula eget dolor.</li>
    <li>Aenean massa cum sociis natoque penatibus.</li>
</ul>

<p>It showed a lady fitted out with a fur hat and fur 
boa who sat upright.</p>
```

### Php

```php
include "path/webscraper.php";
$doc = new WebScraper("samples/sample1.html");

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
$doc = new WebScraper("samples/sample1.html");

$doc->Q("h1, h2, p a");

```

### Output

```html 

<h1>One morning, when Gregor Samsa woke from troubled 
dreams.</h1>
<h2>The bedding was hardly able to cover it.</h2>
<a class="external ext" href="#">link</a>

```

Note that, in the last part: `p a`, we are referring to some `a` tag inside a (any) `p` tag. You are certainly familiar with this all.
However, note that `query` by itself does not return anything, it needs a complement, for example: `$doc->query("something")->someFunction()`.

## Extra CSS selectors: `::text`, `::attributes` and `::comment`

When we are parsing documents, we may need to select texts within `p` tags, or manipulate or confirm the attributes of a specific tag, or even delete all HTML comments in a document, such as `<!-- this is an example comment -->`.

That's why we have the triad: `::text`,` ::attributes` and `::comment` - but how can we use them?

### `::text` selector

We can select all the text nodes of a given document like this:

```php

$doc->Q("::text");

```

Or we can select the text inside a specific tag - like `h1`:

```php

$doc->Q("h1::text");

```

To print the detected information we can use the `text` function, check the following example:

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
$doc = new WebScraper("samples/headings.html");

echo $doc->Q("h1[2]::text")->text();

// or 

echo $doc->Q("h1[2]")->text();

```

### Output

```html 
2nd h1
```
