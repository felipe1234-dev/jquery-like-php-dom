# `html` and `text`

<a href="attr-and-removeattr.md"><b><< Previous</b></a>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;
<a href="append-and-prepend.md"><b>Next >></b></a>

The `html()` method sets or returns the content (innerHTML) of the selected elements.

When this method is used to **return** content, it returns the content of the FIRST matched element.

When this method is used to **set** content, it overwrites the content of ALL matched elements.

**Tip:** `text()` works the same way as `html()`, except that it is used to set or return only text content.

## Syntax: `html` and `text`

Return content:

```php
$doc->Q([selector])->html();
$doc->Q([selector])->text();
```

Set content:

```php
$doc->Q([selector])->html([html-content]);
$doc->Q([selector])->text([text-content]);
```

### `$html` 

```html
<p>This is a paragraph</p>
<p>This is another paragraph</p>
```

<details>
    <summary>
        <b>Php</b>
    </summary>

    ```php
    <?php
    include "../src/webparser.php";
    $doc = new WebParser();
    $doc->loadHTML($html);

    $doc->Q("p:first")->html("<i>Hello world!</i>");
    $text = $doc->Q("p:first")->text();
    $doc->Q("p[2]")->text("<b>$text</b>");

    $doc->output();
    ```
</details>

<details>
    <summary>
        <b>Output</b>
    </summary>

    ```html
    <p><i>Hello world!</i></p>
    <p>&lt;b&gt;this is a paragraph&lt;/b&gt;</p> 
    ```
</details>

## Example test code snippet

Click [here](../examples/example_text_html.php) to go to example test.
