<?php


namespace PinaSimpleControls\Controls;


use Pina\Model\LinkedItemInterface;

class Nav extends \Pina\Controls\Nav
{

    public function __construct()
    {
        $this->addClass('nav');
    }

    protected function makeLinkClasses(LinkedItemInterface $item)
    {
        return '';
    }

    protected function makeItemClasses(LinkedItemInterface $item)
    {
        return '';
    }

}