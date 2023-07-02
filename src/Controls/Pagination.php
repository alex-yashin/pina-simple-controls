<?php


namespace PinaSimpleControls\Controls;


use Pina\Controls\PagingControl;

class Pagination extends PagingControl
{

    public function __construct()
    {
        $this->addClass('nav bar');
    }

}