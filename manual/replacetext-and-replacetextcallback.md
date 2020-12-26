# `replaceText` and `replaceTextCallback`

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

The `replaceText()` and `replaceTextCallback()` methods are used in conjunction with the `::text` selector (which is used to match text) passed as a parameter in the `query()` or `Q()` methods.

`replaceText()` takes **3** arguments, the first one is the **REGEX pattern** to be used to detect patterns in the text, the second one is the replacement string and the third one is a boolean value of `true` or `false` to decide whether it can be interpreted as HTML or not.



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
