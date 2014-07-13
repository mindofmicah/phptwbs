<?php

namespace spec\MindOfMicah\PHPTWBS;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TagSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MindOfMicah\PHPTWBS\Tag');
    }
    public function it_should_treat_flatten_as_a_tostring()
    {
        $tag = new \MindOfMicah\PHPTWBS\Tag();
        $this->flatten()->shouldBe((string)$tag);
    }

    public function it_should_print_basic_info_as_an_html_tag()
    {
        $this->beConstructedWith('p','I like turtles');
        $this->flatten()->shouldBe('<p>I like turtles</p>');
    }
    public function it_should_add_attributes_from_the_constructor()
    {
        $this->beConstructedWith('div', 'hi', ['class'=>'tacos', 'role'=>'nav', 'id'=>'my-id']);
        $this->flatten()->shouldBe('<div class="tacos" role="nav" id="my-id">hi</div>');
    }
}
