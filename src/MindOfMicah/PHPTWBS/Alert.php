<?php

namespace MindOfMicah\PHPTWBS;

class Alert
{
    use FlattenAsToString;

    private $heading = false;
    private $message;
    private $style;

    public static function success($message)
    {
        $alert = new self;
        $alert->setStyle('success');
        $alert->setMessage($message);
        return $alert;
    }

    public function withHeading($heading)
    {
        $this->heading = new Tag('h4', $heading);
        return $this;
    }

    public function flatten()
    {
        $tag = new Tag(
            'div',
            ($this->heading ?: '') . $this->message,
            ['class'=>'alert alert-' . $this->style, 'role'=>'alert']
        );
        return (string)$tag;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function setStyle($style)
    {
        $this->style = $style;
        return $this;
    }
}
