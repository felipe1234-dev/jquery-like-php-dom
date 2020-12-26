# `replaceText` and `replaceTextCallback`

<a href="remove-and-clear.md"><b><< Previous</b></a>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;
<a href="replacewith.md"><b>Next >></b></a>

Both work similarly to the native `preg_replace` and `preg_replace_callback` functions, respectively. 

With the only differences being that you are able to choose between injecting HTML/XML or not, and that they are able to automatically iterate over all node texts or specific node texts inside a chosen tag by using the `::text` selector, leaving the overall XML/HTML structure untouched. 

`replaceText()` takes **3** arguments, the first one is the **REGEX pattern** to be used to detect patterns in the text, the second one is the replacement string or array and the third one is a boolean value of `true` or `false` to decide whether it can be interpreted as HTML or not.

`replaceTextCallback()` works the same except that the third argument which is an anonymous function, while the Boolean value comes in fourth.

## `$html` 

```html
<p>Nam finibus, neque et placerat condimentum, eros ligula mattis libero, eget aliquet nisi dolor nec ex. 
Cras eleifend et nulla rutrum mattis. Etiam eu ipsum nisi. Sed non placerat ante. Aliquam urna tellus, 
faucibus a risus quis, porta eleifend mauris. Nullam sagittis consequat faucibus. Nunc metus tortor, 
blandit sit amet odio sit amet, iaculis pulvinar ipsum. Morbi in urna vel leo fringilla efficitur. 
Vivamus eget rutrum sem. Phasellus posuere nunc sem, vel ultricies metus rutrum nec.</p>
```

## Syntax: `replaceText` 

```php
$doc->Q([selector])->replaceText([pattern(s)], [replacement(s)], [isHtml?]);
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

    $pattern = "/a/i";
    $replace = "$";
    $doc->Q("p::text")->replaceText($pattern, $replace);

    $doc->output();
    ```

</details>

<details>
    <summary>
        <b>Output</b>
    </summary>

    ```html
    <p>N$m finibus, neque et pl$cer$t condimentum, eros ligul$ m$ttis libero, eget $liquet nisi dolor nec ex. 
    Cr$s eleifend et null$ rutrum m$ttis. Eti$m eu ipsum nisi. Sed non pl$cer$t $nte. $liqu$m urn$ tellus, 
    f$ucibus $ risus quis, port$ eleifend m$uris. Null$m s$gittis consequ$t f$ucibus. Nunc metus tortor, 
    bl$ndit sit $met odio sit $met, i$culis pulvin$r ipsum. Morbi in urn$ vel leo fringill$ efficitur. 
    Viv$mus eget rutrum sem. Ph$sellus posuere nunc sem, vel ultricies metus rutrum nec.</p>
    ```
</details>

## Syntax: `replaceTextCallback` 

```php
$doc->Q([selector])->replaceText([pattern(s)], [replacement(s)], [isHtml?]);
```

<details>
    <summary>
        <b>Php</b>
    </summary>

    ```php
    <?php
    include "path/webparser.php";
    $doc = new WebParser();
    $doc->loadHTML($html);

    // a simple Regex to match sentences 
    $pattern = '/([A-Z][^\.!?]*[\.!?]*(<br>)*)/';

    // First try: third parameter is set to true by default
    $doc->Q("p[1]::text")->replaceTextCallback($pattern, function($m){
        static $id = 0;
        $id++;
        return "<label id=\"$id\">".$m[1]."</label>";
        // it pretty much works the same way as a preg_replace_callback
    });

    echo "<p>\$html = true</p>";
    echo "\n\n";

    $doc->output()."\n\n\n";

    // Second try: third parameter was manually set to false
    $doc->Q("p[2]::text")->replaceTextCallback($pattern, function($m){
        static $id = 0;
        $id++;
        return "<label id=\"$id\">".$m[1]."</label>";
    }, false);

    echo "<p>\$html = false</p>";
    echo "\n\n";

    $doc->output();
    ```

</details>

<details>
    <summary>
        <b>Output</b>
    </summary>

    ```html
    <p>$html = true</p>

    <p><label id="1">Nam finibus, neque et placerat condimentum, eros ligula mattis libero, eget aliquet nisi 
    dolor nec ex.</label> <label id="2">Cras eleifend et nulla rutrum mattis.</label> <label id="3">Etiam eu 
    ipsum nisi.</label> <label id="4">Sed non placerat ante.</label> <label id="5">Aliquam urna tellus, 
    faucibus a risus quis, porta eleifend mauris.</label> <label id="6">Nullam sagittis consequat faucibus.
    </label> <label id="7">Nunc metus tortor, blandit sit amet odio sit amet, iaculis pulvinar ipsum.</label> 
    <label id="8">Morbi in urna vel leo fringilla efficitur.</label> <label id="9">Vivamus eget rutrum sem.
    </label> <label id="10">Phasellus posuere nunc sem, vel ultricies metus rutrum nec.</label></p>


    <p>$html = false</p>

    <p>&lt;label id="1"&gt;Nam finibus, neque et placerat condimentum, eros ligula mattis libero, eget aliquet 
    nisi dolor nec ex.&lt;/label&gt; &lt;label id="2"&gt;Cras eleifend et nulla rutrum mattis.&lt;/label&gt; 
    &lt;label id="3"&gt;Etiam eu ipsum nisi.&lt;/label&gt; &lt;label id="4"&gt;Sed non placerat ante.
    &lt;/label&gt; &lt;label id="5"&gt;Aliquam urna tellus, faucibus a risus quis, porta eleifend mauris.
    &lt;/label&gt; &lt;label id="6"&gt;Nullam sagittis consequat faucibus.&lt;/label&gt; &lt;label id="7"&gt;
    Nunc metus tortor, blandit sit amet odio sit amet, iaculis pulvinar ipsum.&lt;/label&gt; &lt;label id="8"&gt;
    Morbi in urna vel leo fringilla efficitur.&lt;/label&gt; &lt;label id="9"&gt;Vivamus eget rutrum sem.
    &lt;/label&gt; &lt;label id="10"&gt;Phasellus posuere nunc sem, vel ultricies metus rutrum nec.
    &lt;/label&gt;</p>
    ```
</details>

## Example test code snippet

1 - [Example with `replaceText()`](../examples/example_text_manipulation.php);
2 - [Example with `replaceTextCallback()`](../examples/example_text_manipulation_with_callback.php).
