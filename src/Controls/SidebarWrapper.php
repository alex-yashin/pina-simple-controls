<?php


namespace PinaSimpleControls\Controls;


use Pina\Html;

class SidebarWrapper extends \Pina\Controls\SidebarWrapper
{

    protected function draw()
    {
        $left = $this->drawInnerBefore() . $this->drawInner() . $this->drawInnerAfter();
        $sidebar = $this->drawSidebar();
        return Html::nest('.container section', $sidebar .  $left, $this->makeAttributes());
    }

    protected function drawSidebar()
    {
        if (empty($this->sidebar)) {
            return '';
        }
        return Html::nest('aside', $this->sidebar->drawWithWrappers());
    }

}