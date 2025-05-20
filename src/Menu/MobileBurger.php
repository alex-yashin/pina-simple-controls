<?php


namespace PinaSimpleControls\Menu;


use Pina\App;
use Pina\Controls\Nav\Nav;

class MobileBurger extends Nav
{

    public function __construct()
    {
        parent::__construct();
        $this->addClass('mobile');
        $this->addClass('bar');
    }

}