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

Simple as that!

But for now, let's start with the example page in our source code, which looks like this: 

```html
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Sample HTML Page</title>
        <link rel="stylesheet" href="css/styles.css?v=1.0">
        <style>
            body {
              font-family: Arial, Helvetica, sans-serif;
              margin: 0;
            }

            html {
              box-sizing: border-box;
            }

            *, *:before, *:after {
              box-sizing: inherit;
            }
            .about-section {
              padding: 50px;
              text-align: center;
              background-color: #474e5d;
              color: white;
            }
        </style>
    </head>
    <body>
        <section>
            <h1>Hello World!</h1>
            <p>Some text about who we are and what we do.</p>
            <p>Resize the browser window to see that this page is responsive by the way.</p>
        </section>
        <h1>HTML Ipsum Presents</h1>
        <p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus 
            et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, 
            ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas 
            semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. 
            Quisque sit amet est et sapien ullamcorper pharetra.
            <a href="#">Donec non enim</a> in turpis pulvinar 
            facilisis. Ut felis.</p>
        <h2>Header Level 2</h2>
        <ol>
          <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
          <li>Aliquam tincidunt mauris eu risus.</li>
        </ol>
        <h3>Header Level 3</h3>
        <!-- this is a comment -->
        <script type="text/javascript">
            // code
        </script>
    </body>
</html>
```
And it's in the `test/examplepage.html` directory.

## Start
Click the links to start learning:

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


## `query` routine
We have already talked about it previously
## `return` routine
## `echo` routine
We have already talked about it previously
## `return` routine
## `echo` routine
We have already talked about it previously
## `return` routine## `echo` routine
We have already talked about it previously
## `return` routine## `echo` routine
We have already talked about it previously
## `return` routine## `echo` routine
We have already talked about it previously
## `return` routine## `echo` routine
We have already talked about it previously
## `return` routine## `echo` routine
We have already talked about it previously
## `return` routine## `echo` routine
We have already talked about it previously
## `return` routine## `echo` routine
We have already talked about it previously
## `return` routine
