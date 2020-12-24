# jQuery-like PHP DOM
> Easy-to-learn php dom parser with CSS selector, short codes and ability to manipulate text nodes

[![GitHub issues](https://img.shields.io/github/issues/felipe1234-dev/simple-php-dom-query)](https://github.com/felipe1234-dev/jquery-like-php-dom/issues)
[![GitHub forks](https://img.shields.io/github/forks/felipe1234-dev/simple-php-dom-query)](https://github.com/felipe1234-dev/jquery-like-php-dom/network)
[![GitHub stars](https://img.shields.io/github/stars/felipe1234-dev/simple-php-dom-query)](https://github.com/felipe1234-dev/jquery-like-php-dom/stargazers)
[![GitHub license](https://img.shields.io/github/license/felipe1234-dev/simple-php-dom-query)](https://github.com/felipe1234-dev/jquery-like-php-dom/blob/main/LICENSE)

Simple PHP Dom Query interface simplification over native PHP Dom Document, which tries to look like closely to jQuery to look friendly to front-end developers. In this library, most of the main functions in jQuery and jQuery-like PHP DOM look exactly like behavior and syntax. This library was done for training purposes.

## Installation

**Composer**

```
composer require felipe1234-dev/jquery-like-php-dom
```

**Git**

```
git clone git://git.code.sf.net/p/jquery-like-php-dom/repository jquery-like-php-dom
```

## jQuery-like PHP DOM vs jQuery comparison

<details>
   <summary>
      <b>Wrapping elements</b>
   </summary>

   jQuery
   ```html
   <script>
   $(document).ready(function(){
      $("img").wrap("<figure></figure>");
   });
   </script>
   ```

   jQuery-like PHP DOM
   ```php
   <?php 
   include "path/webparser.php";
   $doc = new WebParser();
   $doc->loadHTMLFile($url);

   $doc->Q("img")->wrap("<figure></figure>");

   $doc->output();
   ?>
   ```
</details>

<details>
   <summary>
      <b>Appending html</b>
   </summary>

   jQuery
   ```html
   <script>
   $(document).ready(function(){
     $("ol").append("<li>Appended item</li>");
   });
   </script>
   ```

   jQuery-like PHP DOM
   ```php
   include "path/webparser.php";
   $doc = new WebParser();
   $doc->loadHTMLFile($url);

   $doc->Q("ol")->append("<li>Appended item</li>");

   $doc->output();
   ```

</details>

<details>
   <summary>
      <b>Changing first &lt;a&gt; href</b>
   </summary>

   jQuery
   ```html
   <script>
   $(document).ready(function(){
     $("a:first").href("folder/index.html");
   });
   </script>
   ```

   jQuery-like PHP DOM
   ```php
   include "path/webparser.php";
   $doc = new WebParser();
   $doc->loadHTMLFile($url);

   $doc->Q("a:first")->href("folder/index.html");

   $doc->output();
   ```

</details>

*For more examples and usage, please refer to the installation folder under [`manual`](manual/start.md).*

## Release History

* v1.0
    * CHANGE: Initial release ready to be used

## Meta

Felipe Alves – felipejean2002@gmail.com

Distributed under the MIT license. See ``LICENSE`` for more information.

[https://github.com/felipe1234-dev/github-link](https://github.com/felipe1234-dev/)

## Contributing

1. Fork it (<https://github.com/felipe1234-dev/jquery-like-php-dom/fork>)
2. Create your feature branch (`git checkout -b feature/jquery-like-php-dom`)
3. Commit your changes (`git commit -am 'Add some description'`)
4. Push to the branch (`git push origin feature/jquery-like-php-dom`)
5. Create a new Pull Request
