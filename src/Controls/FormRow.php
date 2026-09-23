<?php


namespace PinaSimpleControls\Controls;


use Pina\Controls\Components\Card;
use Pina\Html;

class FormRow extends Card
{

    protected function draw(): string
    {
        return Html::nest('.row form-group', $this->drawContent());
    }

}