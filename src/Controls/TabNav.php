<?php

namespace PinaSimpleControls\Controls;

use Pina\App;
use Pina\Controls\Nav\LinkNavItem;
use Pina\Controls\Nav\Nav;
use Pina\Html;

class TabNav extends Nav
{
    protected function draw(): string
    {
        $inner = $this->drawContent();
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
        $item->load($title, $link);
        if ($newPage) {
            $item->setNewPage();
        }
        return $item;
    }
}