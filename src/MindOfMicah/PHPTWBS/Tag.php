<?php


namespace MindOfMicah\PHPTWBS;

class Tag
{
    private $tag;
    private $contents;
    private $options;

    public function __construct($tag = 'div', $contents = '', array $options = [])
    {
        $this->tag = $tag;
        $this->contents = $contents;
        $this->options = $options;
    }

    public function __toString()
    {
        return $this->flatten();
    }

    public function flatten()
    {
        $attrs = '';
        foreach ($this->options as $key => $option) {
            $attrs.= ' ' . $key .'="' . $option . '"';
        }
        return '<'.$this->tag.$attrs.'>'.$this->contents.'</'.$this->tag.'>';
    }
}
