<?php

namespace PinaSimpleControls\Controls;

use Pina\App;

class FormSelect extends \Pina\Controls\FormSelect
{

    protected function drawInput()
    {
        return parent::drawInput();
    }

    protected function makeInputOptions()
    {
        $options = parent::makeInputOptions();
        if ($this->required) {
            $options['required'] = true;
        }
        if ($this->multiple) {
            $id = uniqid('sel');
            $options['id'] = $id;
            App::assets()->addScript("https://unpkg.com/slim-select@latest/dist/slimselect.min.js");
            App::assets()->addCss("https://unpkg.com/slim-select@latest/dist/slimselect.css");
            $init = "new SlimSelect({select: '#$id',settings:{closeOnSelect: false,allowDeselect: true},})";
            App::assets()->addScriptContent("<script>$init</script>");
        }
        return $options;
    }

}