<?php

namespace PinaSimpleControls\Controls;

use Pina\App;
use Pina\Controls\Card;
use Pina\Html;

class ContextRecordViewWithSidebar extends ContextRecordView
{

    protected function drawInner()
    {
        $sidebar = App::make(Card::class);

        $schema = $this->record->getSchema();
        $schema->forgetHiddenStatic();

        $found = false;
        foreach ($schema->getIterator() as $field) {
            if ($field->hasTag('sidebar')) {
                $sidebar->append($this->makeInput($field, $this->record));
                $schema->forgetField($field->getName());
                $found = true;
            }
        }

        $content = parent::drawInner();

        if (!$found) {
            return $content;
        }
        $this->addClass('with-sidebar');

        return Html::zz('.main%+.sidebar tile%', $content, $sidebar);
    }

}