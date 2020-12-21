# Simple PHP Dom Query
> Easy-to-learn php dom parser with CSS selector, short codes and ability to manipulate text nodes

[![GitHub issues](https://img.shields.io/github/issues/felipe1234-dev/simple-php-dom-query)](https://github.com/felipe1234-dev/simple-php-dom-query/issues)
[![GitHub forks](https://img.shields.io/github/forks/felipe1234-dev/simple-php-dom-query)](https://github.com/felipe1234-dev/simple-php-dom-query/network)
[![GitHub stars](https://img.shields.io/github/stars/felipe1234-dev/simple-php-dom-query)](https://github.com/felipe1234-dev/simple-php-dom-query/stargazers)
[![GitHub license](https://img.shields.io/github/license/felipe1234-dev/simple-php-dom-query)](https://github.com/felipe1234-dev/simple-php-dom-query/blob/main/LICENSE)

Simple PHP Dom Query is an interface simplification over native PHP Dom Document, in which common simple and useful routines are reunited in a single short code syntax. Also allowing CSS selection and manipulation of text nodes directly. This was done for training purposes.

## Installation

**Composer**

```
composer require felipe1234-dev/php-dom-query
```

**Git**

```
git clone git://git.code.sf.net/p/simple-php-dom-query/repository simple-php-dom-query
```

## Usage examples

A few illustrating examples to give you a feel on how it works:

<details><summary><b>Getting page plaintext</b></summary>

```php
include "path/webparser.php";
$doc = new WebParser();
$doc->loadHTMLFile($url);

echo $doc->query("*")->getText();
```

</details>

<details><summary><b>Deleting multiple tags</b></summary>

```php
include "path/webparser.php";
$doc = new WebParser();
$doc->loadHTMLFile($url);

$doc->query("head, script, noscript, style")->remove();

$doc->output();
```

</details>

<details><summary><b>Finding first &lt;a&gt; tag and changing its href</b></summary>

```php
include "path/webparser.php";
$doc = new WebParser();
$doc->loadHTMLFile($url);

$doc->query("a[1]")->href("folder/index.html");

$doc->output();
```

</details>

_For more examples and usage, please refer to the installation folder under [`manual`](manual/start.md)._

## Release History

* v1.0
    * CHANGE: Initial release ready to be used

## Meta

Felipe Alves – felipejean2002@gmail.com

Distributed under the MIT license. See ``LICENSE`` for more information.

[https://github.com/felipe1234-dev/github-link](https://github.com/felipe1234-dev/)

## Contributing

1. Fork it (<https://github.com/felipe1234-dev/simple-php-dom-query/fork>)
2. Create your feature branch (`git checkout -b feature/simple-php-dom-query`)
3. Commit your changes (`git commit -am 'Add some description'`)
4. Push to the branch (`git push origin feature/simple-php-dom-query`)
5. Create a new Pull Request
