<?php

namespace PinaSimpleControls\Controls;

use Pina\Controls\Form\FormStatic;

class UntitledFormStatic extends FormStatic
{
    protected function drawContent(): string
    {
        return $this->drawControl();
    }
}
