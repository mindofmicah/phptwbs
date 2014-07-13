<?php

namespace MindOfMicah\PHPTWBS;

class Tag
{
    private $tag;
    private $contents;

    public function __construct($tag = 'div', $contents = '')
    {
        $this->tag = $tag;
        $this->contents = $contents;
    }

    public function __toString()
    {
        return $this->flatten();
    }

    public function flatten()
    {
        return '<'.$this->tag.'>'.$this->contents.'</'.$this->tag.'>';
    }
}
