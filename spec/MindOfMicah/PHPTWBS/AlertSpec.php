<?php

namespace spec\MindOfMicah\PHPTWBS;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AlertSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MindOfMicah\PHPTWBS\Alert');
    }

    public function it_should_create_an_success_alert_with_a_message()
    {
        $message = '<p>I like turtles</p>';
        $this->setMessage($message)->shouldBe($this);
        $this->setStyle('success')->shouldBe($this);
        $this->flatten()->shouldBe('<div class="alert alert-success" role="alert"><p>I like turtles</p></div>');
    }

    public function it_should_treat_flatten_as_the_to_string_method()
    {
        $alert = new \MindOfMicah\PHPTWBS\Alert();
        $expected = (string)$alert;
        $this->flatten()->shouldBe($expected);

    }
    public function it_should_quickly_create_a_success_message()
    {
        $this::success("Hey, we did it")->flatten()->shouldBe('<div class="alert alert-success" role="alert">Hey, we did it</div>');
    }

    public function it_should_quickly_create_a_success_message_with_a_heading()
    {
        $this::success("Hey, we did it")->withHeading('Success')->flatten()->shouldBe('<div class="alert alert-success" role="alert"><h4>Success</h4>Hey, we did it</div>');
    }
}
