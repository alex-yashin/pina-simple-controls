<?php

namespace PinaSimpleControls\Controls;

use Pina\Controls\Nav\LinkNavItem;
use Pina\Html;

class TabNavItem extends LinkNavItem
{
    protected function draw(): string
    {
        if (!$this->isPermitted()) {
            return '';
        }

        $inner = $this->drawContent();

        $options = array_merge($this->makeLinkAttributes(), $this->makeAttributes(['class' => 'tab']));

        return Html::a($inner, $this->link, $options);
    }

}