<?php


namespace PinaSimpleControls\Controls;


use Pina\Controls\FormInput;
use Pina\Html;

class FormCheckbox extends FormInput
{
    protected $type = 'checkbox';
    protected $checkedValue = 'Y';

    public function draw()
    {
        return Html::tag(
            'div',
            $this->drawInnerBefore() . $this->drawInner() . $this->drawInnerAfter(),
            $this->makeAttributes(['class' => 'form-group'])
        );
    }

    public function setOptionValue(string $value)
    {
        $this->checkedValue = $value;
    }

    protected function drawInner()
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
