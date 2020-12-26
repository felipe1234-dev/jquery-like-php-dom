# `replaceWith`

<a href="replacetext-and-replacetextcallback.md"><b><< Previous</b></a>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;
<a href="start.md"><b>Start >></b></a>

The `replaceWith()` method replaces selected elements with new HTML content.

## Syntax: `replaceWith` 

```php
$doc->Q([selector])->replaceWith([html/xml-content]);
```

### `$html` 

```html
<div class="container">
    <div class="inner first">Hello</div>
    <div class="inner second">And</div>
    <div class="inner third">Goodbye</div>
</div>
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

    $doc->Q("div.second")->replaceWith("<h2>New heading</h2>");

    $doc->output();
    ```

</details>

<details>
    <summary>
        <b>Output</b>
    </summary>

    ```html
    <div class="container">
        <div class="inner first">Hello</div>
        <h2>New heading</h2>
        <div class="inner third">Goodbye</div>
    </div>
    ```

</details>

## Example test code snippet

Click [here](../examples/example_replace_with.php) to go to example test.
