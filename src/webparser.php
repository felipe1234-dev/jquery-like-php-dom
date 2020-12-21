<?php


trait AttributeEditingMethods
{

    public function addAttr($attr, $value)
    {

        foreach ($this->obj as $item) 
        {
            $item->setAttribute("$attr", "$value");
        }

        return $this;
    }

    public function removeAttr($attr)
    {
        foreach ($this->obj as $item) 
        {
            $item->removeAttribute("$attr");
        }

        return $this;
    }

    public function removeAllAttrsExcept($attrs)
    {
        $attrs = explode(", ", $attrs);

        foreach ($this->obj as $attr) 
        {

            foreach ($attrs as $exception) 
            {
                if ($attr->nodeName != $exception) 
                {
                    $attr->parentNode->removeAttribute($attr->nodeName);
                }
            }

        }

        return $this;
    }

    public function getAttr($attr)
    {

        foreach ($this->obj as $item) 
        {
            $attr = $item->getAttribute("$attr");
        }

        return $attr;
    }

    public function hasAttr($attr, $val)
    {

        foreach ($this->obj as $item) 
        {
            $attrs = $item->getAttribute("$attr");
        }

        $bool = (preg_match("/" . preg_quote($val) . "/", $attrs)) ? true : false;

        return $bool;
    }

    public function addClass($class)
    {

        foreach ($this->obj as $item) 
        {
            $otherClasses = $item->getAttribute("class");
            $newClasses = trim("$otherClasses $class");
            $item->setAttribute("class", "$newClasses");
        }

        return $this;
    }

    public function removeClass($class)
    {

        foreach ($this->obj as $item) 
        {
            $newClasses = trim(str_replace($class, "", $item->getAttribute("class")));
            $item->setAttribute("class", "$newClasses");
        }

        return $this;
    }

    public function getClass()
    {

        foreach ($this->obj as $item) 
        {
            $class = $item->getAttribute("class");
        }

        return $class;
    }

    public function hasClass($class)
    {

        foreach ($this->obj as $item) 
        {
            $classes = $item->getAttribute("class");
        }

        $bool = (preg_match("/" . preg_quote($class) . "/", $classes)) ? true : false;

        return $bool;
    }

    public function href($url = null)
    {

        foreach ($this->obj as $item) 
        {
            if (isset($url)) 
            {
                $item->setAttribute("href", "$url");
            }
            else {
                return $item->getAttribute("href");
            }
        }

        return $this;
    }

    public function src($url = null)
    {

        foreach ($this->obj as $item) 
        {
            if (isset($url)) 
            {
                $item->setAttribute("src", "$url");
            }
            else {
                return $item->getAttribute("src");
            }
        }
        
    }

    public function class($class = null)
    {

        foreach ($this->obj as $item) 
        {
            if (isset($url)) 
            {
                $item->setAttribute("class", "$class");
            }
            else {
                return $item->getAttribute("class");
            }
        }
        
    }
}

trait TextEditingMethods
{
    public function getText()
    {
        foreach ($this->obj as $item) 
        {
            return $item->textContent;
        }

        return $this;
    }

    public function editText($text)
    {
        foreach ($this->obj as $item) 
        {
            $item->textContent = $text;
        }

        return $this;
    }

    public function replaceText($pattern, $replace, $html = true)
    {

        foreach ($this->obj as $item) 
        {

            $newText = preg_replace(
                $pattern,
                $replace,
                $item->textContent
            );

            $item->textContent = $newText;
        }

        if ($html) 
        {

            if ($this->isHtml) 
            {
                libxml_use_internal_errors(true);
                $this->dom->loadHTML(
                    html_entity_decode($this->dom->saveHTML())
                );
                libxml_use_internal_errors(false);
            } 
            else {
                $this->dom->loadXML(
                    html_entity_decode($this->dom->saveXML())
                );
            }

            $this->xpath = new DOMXPath($this->dom);
        }

        return $this;
    }

    public function replaceTextCallback($pattern, $func, $html = true)
    {

        foreach ($this->obj as $item) 
        {

            $newText = preg_replace_callback(
                $pattern,
                function ($m) use ($func) 
                {
                    return $func($m);
                },
                $item->textContent
            );

            $item->textContent = $newText;
        }

        if ($html) 
        {

            if ($this->isHtml) 
            {

                libxml_use_internal_errors(true);
                $this->dom->loadHTML(
                    html_entity_decode($this->dom->saveHTML())
                );
                libxml_use_internal_errors(false);
            } else {

                $this->dom->loadXML(
                    html_entity_decode($this->dom->saveXML())
                );
            }

            $this->xpath = new DOMXPath($this->dom);
        }

        return $this;
    }
}

trait HTMLEditingMethods
{
    public function getHtml()
    {
        $html = '';

        foreach ($this->obj as $item) 
        {

            $children = $item->childNodes;

            foreach ($children as $child) 
            {
                $html .= $child->ownerDocument->saveXML($child);
            }
        }

        return $html;
    }

    public function editHtml($html = null)
    {

        $dom = new DOMDocument();
        $dom->loadXML($html);
        $xpath = new DOMXPath($dom);

        foreach ($this->obj as $item) 
        {

            foreach ($xpath->query("/*") as $contentNode) 
            {
                $newItem = $this->dom->createElement($item->nodeName);
                $item->parentNode->replaceChild($newItem, $item);
                $contentNode = $this->dom->importNode($contentNode, true);
                $newItem->appendChild($contentNode);
            }

        }

        return $this;
    }

    public function appendHtml($html)
    {

        $dom = new DOMDocument();
        $dom->loadXML($html);
        $xpath = new DOMXPath($dom);

        foreach ($this->obj as $item) 
        {

            foreach ($xpath->query("//*") as $contentNode) 
            {
                $contentNode = $this->dom->importNode($contentNode, true);
                $item->appendChild($contentNode);
            }
        }

        return $this;
    }

    public function prependHtml($html)
    {

        $dom = new DOMDocument();
        $dom->loadXML($html);
        $xpath = new DOMXPath($dom);

        foreach ($this->obj as $item) 
        {

            foreach ($xpath->query("//*") as $contentNode) 
            {
                $contentNode = $this->dom->importNode($contentNode, true);
                $item->insertBefore($contentNode, $item->firstChild);
            }

        }

        return $this;
    }

    public function removeTag()
    {

        foreach ($this->obj as $item) 
        {
            $item->parentNode->removeChild($item);
        }

        return $this;
    }

    public function unwrap()
    {

        foreach ($this->obj as $item) 
        {
            $newParent = $item->parentNode->parentNode;

            foreach($item->parentNode->childNodes as $child)
            {
                $newParent->insertBefore($child->cloneNode(true), $item->parentNode);
            }

            $newParent->removeChild($item->parentNode);
        }

        return $this;
    }

    private function HTMLtoArray($tag, &$html, &$keys, &$vals, &$attrs)
    {

        $html = preg_replace_callback(
            '/([^=<>\s]*)=[\'|"]([^=]*)[\'|"]/',
            function ($m) 
            {
                return "{$m[1]} => {$m[2]}]";
            },
            $html
        );

        $html = preg_replace(
            ["/$tag/", "/[^=]>/", "/</", "/\//"],
            "",
            $html
        );

        $lines = explode("]", $html);

        foreach ($lines as $index => $value) 
        {
            if ($value == "") unset($lines[$index]);
        }

        foreach ($lines as $index => $value) 
        {
            $arr = explode('=>', str_replace("]", "", $value));
            array_push($keys, $arr[0]);
            array_push($vals, $arr[1]);
        }

        $attrs = array_combine($keys, $vals);
    }

    public function wrap($html)
    {

        $attrs = array();
        $keys = array();
        $vals = array();

        if (preg_match("/<([\w\d]+).*>[^<>]*<\/\\1>/", $html)) 
        {
            $tag = preg_replace("/<([\w\d]+).*>[^<>]*<\/\\1>/", "$1", $html);
            $this->HTMLtoArray($tag, $html, $keys, $vals, $attrs);
        }

        foreach ($this->obj as $item) 
        {

            $wrapper = $this->dom->createElement("$tag");

            foreach ($attrs as $attr => $value) 
            {
                $wrapper->setAttribute(trim($attr), trim($value));
            }

            $itemclone = $item->cloneNode(true);
            $wrapper->appendChild($itemclone);
            $this->dom->appendChild($wrapper);
            $item->parentNode->replaceChild($wrapper, $item);
        }

        return $this;
    }

    public function removeEmptyTags()
    {
        $xpath = '//*[not(*) and not(@*) and not(text()[normalize-space()])]';

        foreach ($this->xpath->query("$xpath") as $tag) 
        {
            $tag->parentNode->removeChild($tag);
        }

        return $this;
    }

    public function clearTag()
    {

        $dom = new DOMDocument();
        $dom->loadXML("<empty/>");
        $xpath = new DOMXPath($dom);

        foreach ($this->obj as $item) 
        {

            foreach ($xpath->query("/*") as $contentNode) 
            {
                $newItem = $this->dom->createElement($item->nodeName);
                $item->parentNode->replaceChild($newItem, $item);
                $contentNode = $this->dom->importNode($contentNode, true);
                $newItem->appendChild($contentNode);
            }
        }

        return $this;
    }

    public function replaceWith($html)
    {

        $dom = new DOMDocument();
        $dom->loadXML($html);
        $xpath = new DOMXPath($dom);

        foreach ($this->obj as $item) 
        {

            foreach ($xpath->query("/*") as $replace) 
            {
                $replace = $this->dom->importNode($replace, true);
                $item->parentNode->replaceChild($replace, $item);
            }
        }

        return $this;
    }
}

class WebParser
{
    use AttributeEditingMethods;
    use TextEditingMethods;
    use HTMLEditingMethods;

    private $obj;
    private $isHtml = null;
    private $CSSQuery;
    private $dom;
    private $xpath;

    public function __construct()
    {
        $this->dom = new DOMDocument();
    }

    public function loadHTMLFile($url)
    {
        libxml_use_internal_errors(true);
        $this->dom->loadHTMLFile($url, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_use_internal_errors(false);
        $this->xpath = new DOMXPath($this->dom);
        $this->isHtml = true;
    }

    public function loadXML($XML)
    {
        $this->dom->loadXML($XML);
        $this->xpath = new DOMXPath($this->dom);
        $this->isHtml = false;
    }

    public function loadHTML($HTML)
    {
        libxml_use_internal_errors(true);
        $this->dom->loadHTML($HTML);
        libxml_use_internal_errors(false);
        $this->xpath = new DOMXPath($this->dom);
        $this->isHtml = true;
    }

    private function convertToXPath($CSSQuery)
    {
        $xpath = $CSSQuery;

        $xpath = preg_replace_callback(
            "/\[([\d\w-]+=['\"][^\s]+['\"])\]/",
            function ($m) 
            {
                return "[" . str_replace(".", "{dot}", $m[1]) . "]";
            },
            $xpath
        );

        $replaces = [
            "/\n{1,}/"                              => "",
            "/\s{2,}/"                              => " ",
            "/(\w)[\s](\w)/"                        => "$1/$2",
            "/(\w) > (\w)/"                         => "$1/$2",
            "/,\s/"                                 => " | //",
            "/\[([\d\w-]+)=['\"]([^\s]+)['\"]\]/"   => "[contains(@$1, '$2')]",
            "/\.([\d\w-]+)/"                        => "[contains(@class, '$1')]",
            "/\#([\d\w-]+)/"                        => "[contains(@id, '$1')]",
            "/\]\[/"                                => "]/*[",
            "/\][\s]*([\w])/"                       => "]/$1",
            "/{dot}/"                               => ".",
            "/:first-child/"                        => "[1]",
            "/:last-child/"                         => "[last()]",
            "/[^\w\]]::text/"                       => "text()",
            "/([\w\]])::text/"                      => "$1/text()",
            "/[^\w\]]::comments/"                   => "comment()",
            "/([\w\]])::comments/"                  => "$1/comment()",
            "/[^\w\]]::attributes/"                 => "@*",
            "/([\w\]])::attributes/"                => "$1/@*",
            "/([\w\]])::(\w+)/"                     => "$1/@$2"
        ];
        $xpath = preg_replace(
            array_keys($replaces),
            array_values($replaces),
            $xpath
        );

        return $xpath;
    }

    public function query($CSSQuery, $bool = true)
    {

        if ($bool) { $this->CSSQuery = $CSSQuery; }
        $xpath = $this->convertToXPath($CSSQuery);

        $this->obj = $this->xpath->query("//$xpath");

        return $this;
    }

    // short version for query()
    public function Q($CSSQuery)
    {
        $this->query($CSSQuery);
        return $this;
    }

    public function iterate($func)
    {
        $i = 1;
        foreach ($this->obj as $item) 
        {
            $func($this->query("{$this->CSSQuery}[$i]", false));
            $i++;
        }
    }

    public function count()
    {
        return count($this->obj);
    }

    public function output($format = true)
    {

        $this->dom->formatOutput = $format;

        echo (($this->isHtml) ?
            ($this->dom->saveHTML())
            : ($this->dom->saveXML()));
    }
}
