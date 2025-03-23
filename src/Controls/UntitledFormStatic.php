<?php

namespace PinaSimpleControls\Controls;

use Pina\Controls\FormStatic;

class UntitledFormStatic extends FormStatic
{
    protected function drawInner()
    {
        return $this->drawControl();
    }
}