<?php

namespace PinaSimpleControls\Controls;

use Pina\App;
use Pina\Controls\RecordView;

class ContextRecordView extends RecordView
{

    public function __construct()
    {
        $this->setDataAttribute('resource', App::resource('@/context-menu'));
        $this->addClass('context form');
    }

    protected function draw()
    {
        App::assets()->addScript('/vendor/simple-css-styles/src/context/context.js');

        return parent::draw();
    }
}