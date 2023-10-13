<?php


namespace PinaSimpleControls\Controls;


use Pina\App;
use Pina\Controls\BodyLessCard;
use Pina\Controls\FilterForm;
use Pina\Html;

use function Pina\__;

class PreviewedPopupFilterForm extends FilterForm
{

    protected $title = '';

    public function __construct()
    {
        parent::__construct();

        $this->title = __('Поиск');
        $this->addClass('popup popup-dialog popup-wide');
    }

    protected function draw()
    {
        if ($this->record->getSchema()->isEmpty()) {
            return '';
        }

        return $this->drawFilterPreview() . parent::draw();
    }

    protected function drawFilterPreview()
    {
        $r = $this->drawFilled();
        return Html::nest(
            'a.btn btn-primary[data-toggle-modal=.' . $this->formClass . '][href=#]/i.fa fa-search+span',
            ' ' . $this->title . ($r ? ' "' . $r . '"' : '')
        );
    }

    protected function drawHeader()
    {
        return Html::nest('header/button.close[type=button][data-close-modal]+h3', $this->title) . parent::drawHeader();
    }

    protected function drawFilled()
    {
        $data = $this->record->getData();

        $r = [];
        foreach ($this->record->getSchema() as $field) {
            $value = $data[$field->getName()] ?? null;

            if (empty($value)) {
                continue;
            }

            $formatted = App::type($field->getType())->draw($value);

            $r[] = $field->getTitle() . ': ' . $formatted;
        }

        return implode(', ', $r);
    }

    protected function makeCard()
    {
        return App::make(BodyLessCard::class);
    }
}