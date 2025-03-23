<?php

namespace PinaSimpleControls\Controls;

use Pina\App;
use Pina\Controls\Nav\LinkNavItem;
use Pina\Controls\Nav\Nav;
use Pina\Html;

class TabNav extends Nav
{
    protected function draw()
    {
        $inner = $this->drawInnerBefore() . $this->drawInner() . $this->drawInnerAfter();
        if (empty($inner)) {
            return '';
        }

        return Html::nest(
            '.tab-group',
            $inner,
            $this->makeAttributes()
        );
    }


    protected function makeLink(string $title, string $link, ?bool $newPage = null): LinkNavItem
    {
        /** @var TabNavItem $item */
        $item = App::make(TabNavItem::class);
        $item->load($title, $link, $newPage);
        return $item;
    }
}