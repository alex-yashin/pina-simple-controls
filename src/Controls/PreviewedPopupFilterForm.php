<?php


namespace PinaSimpleControls\Controls;


use Pina\App;
use Pina\Controls\FilterForm;
use Pina\Html;

use function Pina\__;

class PreviewedPopupFilterForm extends FilterForm
{
    protected function draw()
    {
        if ($this->record->getSchema()->isEmpty()) {
            return '';
        }

        $r = $this->drawFilled();

        $search = __('Поиск');

        $cl = uniqid('cl');

        $preview = Html::nest(
            'ul.nav filters/li/a[data-toggle-modal=.'.$cl.'][href=#]/i.fa fa-search+span',
            ' ' . $search . ($r ? ' "' . $r .'"': '')
        );

        $formHeader = Html::nest('header/button.close[type=button][data-close-modal]+h3', $search);

        return $preview . Html::nest('.popup popup-dialog popup-wide ' . $cl, $formHeader . parent::draw());
    }

    protected function drawFilled()
    {
        $data = $this->record->getData();

        $r = [];
        foreach ($this->record->getSchema() as $field) {
            $value = $data[$field->getKey()] ?? null;

            if (empty($value)) {
                continue;
            }

            $formatted = App::type($field->getType())->draw($value);

            $r[] = $field->getTitle() . ': ' . $formatted;
        }

        return implode(', ', $r);
    }
}