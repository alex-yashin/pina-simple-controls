<?php

namespace PinaSimpleControls\Controls;

use Pina\Html;

class ButtonRow extends \Pina\Controls\ButtonRow
{

    protected function draw()
    {
        $inner = $this->drawInnerBefore() . $this->drawInner(). $this->drawInnerAfter();
        return Html::nest('.buttons', $this->drawMain() . $inner);
    }

}