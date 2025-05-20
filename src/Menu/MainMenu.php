<?php


namespace PinaSimpleControls\Menu;

class MainMenu extends \Pina\Menu\MainMenu
{

    public function __construct()
    {
        parent::__construct();
        $this->addClass('bar');
        $this->addClass('desktop');
    }

}