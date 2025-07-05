<?php

namespace Html;
class WebPage
{
    private string $head = "";
    private string $title = "";
    private string $body = "";

    /**
     * @param string $title
     */
    public function __construct(string $title = '')
    {
        $this->title = $title;
    }

    /**
     * @param string $content
     * @return void
     */
    public function appendContent(string $content): void
    {
        $this->body .= $content;
    }

    /**
     * @param string $content
     * @return void
     */
    public function appendToHead(string $content): void
    {
        $this->head .= $content;
    }

    /**
     * @param string $css
     * @return void
     */
    public function appendCss(string $css): void
    {
        $this->appendToHead("<style>\n$css\n</style>");
    }

    /**
     * @param string $url
     * @return void
     */
    public function appendCssUrl(string $url): void
    {
        $this->appendToHead("<link rel='stylesheet' href='$url'>");
    }

    /**
     * @param string $js
     * @return void
     */
    public function appendJs(string $js): void
    {
        $this->appendToHead("<script>\n$js\n</script>");
    }

    /**
     * @param string $url
     * @return void
     */
    public function appendJsUrl(string $url): void
    {
        $this->appendToHead("<script src='$url'></script>");
    }

    /**
     * @param string $string
     * @return string
     */

    public function escapeString(string $string): string
    {
        return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }

    /***
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getHead(): string
    {
        return $this->head;
    }

    /**
     * @return string
     */
    public static function getLastModification(): string
    {
        return date("Y-m-d H:i:s", getlastmod());
    }

    /**
     * @return string

     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function toHTML(): string
    {
        return <<<HTML
                <!DOCTYPE html>
                <html lang='fr'>
                    <head>
                    <meta charset='utf-8' name = 'viewport'> 
                    <meta name="viewport" content="width=device-width,initial-scale=1">
                         <title> $this->title </title>
                        $this->head 
                    </head>
                    <body>
                        $this->body
                    </body>
                </html>
    HTML;


    }
}
