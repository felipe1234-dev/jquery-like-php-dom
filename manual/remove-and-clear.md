# `remove` and `clear`

<a href="append-and-prepend.md"><b><< Previous</b></a>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;
<a href="replacetext-and-replacetextcallback.md"><b>Next >></b></a>

To remove elements and content, there are mainly two methods:

`remove()` - Removes the selected element (and its child elements)
`clear()` - Removes the child elements from the selected element

## Syntax: `remove` and `clear`

```php
$doc->Q([selector])->remove();
$doc->Q([selector])->clear();
```

### `$html` 

```html
<div id="div1" 
style="height:100px;width:300px;
border:1px solid black;background-color:yellow;">
  This is some text in the div.
  <p>This is a paragraph in the div.</p>
  <p>This is another paragraph in the div.</p>
</div>
<div id="div2" 
style="height:100px;width:300px;
border:1px solid black;background-color:yellow;">
  This is some text in the div.
  <p>This is a paragraph in the div.</p>
  <p>This is another paragraph in the div.</p>
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

  $doc->Q("#div1")->remove();
  $doc->Q("#div2")->clear();

  $doc->output();
  ```
</details>

<details>
  <summary>
    <b>Output</b>
  </summary>

  ```html
  <div id="div2" style="height:100px;width:300px;border:1px solid black;
    background-color:yellow;">
  </div>
  ```

</details>

## Example test code snippet

Click [here](../examples/example_remove_clear_tags.php) to go to example test.