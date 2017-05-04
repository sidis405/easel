<?php

namespace Canvas\Helpers;

use DOMDocument;

/**
 * Useful tools for parsing and handling HTML strings.
 * @author ReliQ <reliq@reliqarts.com>
 */
class HTMLHelper extends CanvasHelper
{
    /**
     * Strip specific tag from HTML via DOMDocument..
     * 
     * @param string $html String to strip tags from.
     * @param string $tagName
     * @return string
     */
    public static function stripTags($html, $tagName = 'script') 
    {
        $doc = new DOMDocument();

        // load the HTML string we want to strip, without DTD, <html> and <body>
        $doc->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // get all the tags to strip
        $tags = $doc->getElementsByTagName($tagName);
        $length = $tags->length;

        // for each tag, remove it from the DOM
        for ($i = 0; $i < $length; $i++) {
            $tags->item($i)->parentNode->removeChild($tags->item($i));
        }

        // get the HTML string back
        return $doc->saveHTML();
    }

    /**
     * Strip script tags from HTML.
     * 
     * @see stripTags()
     */
    public static function stripScriptTags($html)
    {
        return self::stripTags($html. 'script');
    }
}
