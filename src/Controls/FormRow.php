<?php


namespace PinaSimpleControls\Controls;


use Pina\Controls\Card;
use Pina\Html;

class FormRow extends Card
{

    protected function draw()
    {
        return Html::nest('.row form-group', $this->drawInnerBefore() . $this->drawInner() . $this->drawInnerAfter());
    }

}