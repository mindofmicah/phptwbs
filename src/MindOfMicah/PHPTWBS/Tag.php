<?php


namespace MindOfMicah\PHPTWBS;

class Tag
{
    use FlattenAsToString;

    private $tag;
    private $contents;
    private $options;

    public function __construct($selector = 'div', $contents = '', array $options = [])
    {
        $tag = $selector;
        if (preg_match('/([a-z]+)([\.#].+)/', $selector, $matches)) {
            $tag = $matches[1];
            $classes = [];
            $attributes = preg_split('/([\.#])/', $matches[2], -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
            for ($i = 0; $i < count($attributes); $i+=2) {
                if ($attributes[$i] == '#') {
                    $options['id'] = $attributes[$i+1];
                } elseif($attributes[$i] == '.') {
                    $classes[] = $attributes[$i+1];
                }
            }
            if(count($classes)) {
                $options['class'] = implode(' ', $classes);
            }

        }
        $this->tag = $tag;
        $this->contents = $contents;
        $this->options = $options;
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
