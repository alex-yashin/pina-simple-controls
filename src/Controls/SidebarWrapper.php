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
        $r = '';
        foreach ($this->sidebar as $control) {
            $content = (string)$control;
            if (empty($content)) {
                continue;
            }
            $r .= Html::li($content);
        }
        return Html::nest('aside/ul.nav bar', $r);
    }

}