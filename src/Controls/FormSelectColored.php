<?php


namespace PinaSimpleControls\Controls;


class FormSelectColored extends FormSelect
{
    protected function makeInputOptions()
    {
        $options = parent::makeInputOptions();
        $options['class'] .= ' select-colored';
        return $options;
    }
}