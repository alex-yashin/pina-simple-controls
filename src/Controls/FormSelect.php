<?php

namespace PinaSimpleControls\Controls;

use Pina\App;

class FormSelect extends \Pina\Controls\FormSelect
{

    protected function makeInputOptions()
    {
        $options = parent::makeInputOptions();
        if ($this->multiple) {
            $id = uniqid('sel');
            $options['id'] = $id;
            App::assets()->addScript("/vendor/slimselect/slimselect.min.js");
            App::assets()->addStyle("/vendor/slimselect/slimselect.css");
            $init = "new SlimSelect({select: '#$id',settings:{closeOnSelect: false,allowDeselect: true},})";
            App::assets()->addScriptContent("<script>$init</script>");
        } elseif ($this->required) {
            $options['required'] = true;
        }
        return $options;
    }

}