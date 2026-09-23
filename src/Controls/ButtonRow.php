<?php

namespace PinaSimpleControls\Controls;

use Pina\Html;

class ButtonRow extends \Pina\Controls\Components\ButtonRow
{

    protected function draw(): string
    {
        return Html::nest('.buttons', $this->drawMain() . $this->drawContent(), $this->makeAttributes());
    }

}