<?php
namespace MindOfMicah\PHPTWBS;

trait FlattenAsToString
{
    public function __toString()
    {
        if (!method_exists($this, 'flatten')) {
            return 'WARNING, TO USE FlattenAsToString TRAIT, YOU MUST PROVIDE A FLATTEN METHOD';
        }
        return $this->flatten();
    }
}
