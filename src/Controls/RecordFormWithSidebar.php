<?php

namespace PinaSimpleControls\Controls;

use Pina\App;
use Pina\Controls\Card;
use Pina\Controls\RecordForm;
use Pina\Html;

class RecordFormWithSidebar extends RecordForm
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

        return Html::zz('.with-sidebar(.main%+aside.sidebar tile%)', $content, $sidebar);
    }

}