<?php

namespace PinaSimpleControls\Controls;

use Pina\App;
use Pina\Controls\Components\Card;
use Pina\Controls\Record\RecordForm;
use Pina\Html;

class RecordFormWithSidebar extends RecordForm
{

    protected function drawContent(): string
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

        $content = parent::drawContent();

        if (!$found) {
            return $content;
        }

        return Html::zz('.with-sidebar(.main%+aside.sidebar tile%)', $content, $sidebar);
    }

}