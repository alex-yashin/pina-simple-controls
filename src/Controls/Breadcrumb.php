<?php


namespace PinaSimpleControls\Controls;

use Pina\Controls\LinkedListView;
use Pina\Controls\RawHtml;

class Breadcrumb extends LinkedListView
{
    public function __construct()
    {
        $this->addClass('nav bar');
    }

    protected function makeItem($record)
    {
        $link = $record->getMeta('link');
        if (empty($link)) {
            return new RawHtml();
        }
        return parent::makeItem($record);
    }

}