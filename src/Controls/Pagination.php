<?php


namespace PinaSimpleControls\Controls;


use Pina\Controls\Components\PagingControl;

class Pagination extends PagingControl
{

    public function __construct()
    {
        $this->addClass('nav bar');
    }

}