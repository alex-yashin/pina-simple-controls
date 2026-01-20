<?php

namespace PinaSimpleControls\Menu;

class RouterSiblingMenu extends \Pina\Menu\RouterSiblingMenu
{
    public function __construct()
    {
        parent::__construct();
        $this->addClass('bar');
    }
}