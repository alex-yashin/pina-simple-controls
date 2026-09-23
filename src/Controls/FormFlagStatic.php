<?php


namespace PinaSimpleControls\Controls;

use Pina\Html;

class FormFlagStatic extends \Pina\Controls\Form\FormFlagStatic
{
    protected function drawInput()
    {
        $symbol = $this->value == 'Y'
            ? Html::nest('span.ff ff-checked', '☑')
            : Html::nest('span.ff', '☒');
        if ($this->compact) {
            $symbol .= $this->title;
        }
        return $symbol;
    }
}