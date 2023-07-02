<?php


namespace PinaSimpleControls\Controls;


use Pina\Html;

class FormStatic extends \Pina\Controls\FormStatic
{

    protected function makeAttributes($attributes = [])
    {
        $attributes['class'] .= ' filled';
        return parent::makeAttributes($attributes);
    }

    protected function drawInput()
    {
        return Html::tag('div', $this->value, ['class' => 'form-control form-static']);
    }

}
