<?php

namespace MindOfMicah\PHPTWBS;

class Alert
{
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
        $this->heading = $heading;
        return $this;
    }

    public function __toString()
    {
        return $this->flatten();
    }

    public function flatten()
    {
        return '<div class="alert alert-' . $this->style . '" role="alert">' . ($this->heading ? '<h4>' . $this->heading . '</h4>' : '') . $this->message . '</div>';
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
