<?php


namespace PinaSimpleControls\Controls;


use Pina\Html;

class FormInput extends \Pina\Controls\FormInput
{

    protected function drawControl()
    {
        $input = $this->drawInput();
        $description = $this->drawDescription();
        if ($description) {
            return Html::nest('.input-group', $input . $description);
        }
        return $input;
    }

    protected function drawDescription()
    {
        if (empty($this->description)) {
            return '';
        }
        return Html::nest('a.tooltip[href=#]/div', $this->description);
    }

    protected function makeInputOptions()
    {
        $options = parent::makeInputOptions();
        if ($this->required) {
            $options['required'] = true;
        }
        return $options;
    }

}