<?php

namespace PinaSimpleControls\Controls;

use Pina\App;
use Pina\Controls\RecordView;
use Pina\Input;

class ContextRecordView extends RecordView
{

    public function __construct()
    {
        $location = App::baseUrl()->location(Input::getResource());
        $this->setDataAttribute('resource', $location->resource('@/context-menu'));
        $this->addClass('context form');
    }

    protected function draw()
    {
        App::assets()->addScript('/vendor/simple-css-styles/src/context/context.js');

        return parent::draw();
    }
}