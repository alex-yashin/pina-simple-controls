<?php


namespace PinaSimpleControls\Controls;


use Pina\Controls\Form\FormInput;
use Pina\Html;

class FormCheckbox extends FormInput
{
    protected $type = 'checkbox';
    protected $checkedValue = 'Y';

    public function setOptionValue(string $value)
    {
        $this->checkedValue = $value;
    }

    protected function drawContent(): string
    {
        $r = $this->drawControl();
        $r .= Html::tag('label', $this->title, ['for' => $this->name]);
        return $r;
    }

    protected function drawControl()
    {
        $options = ['type' => $this->type, 'value' => $this->checkedValue];

        if ($this->name) {
            $options['name'] = $this->name;
            $options['id'] = $this->name;
        }

        if ($this->value) {
            $options['checked'] = 'checked';
        }

        return Html::tag('input', '', $options);
    }

}
