<?php

namespace PinaSimpleControls\Controls;

use Pina\App;
use Pina\Controls\Button;
use Pina\Controls\Control;
use Pina\Controls\FormControl;
use Pina\Controls\HiddenInput;
use Pina\Controls\RecordForm;
use Pina\Controls\SubmitButton;
use Pina\Controls\Wrapper;
use Pina\Data\DataRecord;
use Pina\Data\Field;

class TransformationRecordForm extends RecordForm
{
    protected $statusFieldName = 'status';

    public function setStatusFieldName($name)
    {
        $this->statusFieldName = $name;
    }

    /**
     * @param Field $field
     * @param array $data
     * @return Control|FormControl
     * @throws \Exception
     */
    public function makeInput(Field $field, DataRecord $record)
    {
        if ($field->getName() == $this->statusFieldName) {
            App::assets()->addScript('button-variant-selector.js');
            $row = new Wrapper('.limited buttons button-variant-selector');

            /** @var HiddenInput $input */
            $input = App::make(HiddenInput::class);
            $input->setName($field->getName());
            $row->append($input);

            $variants = App::type($field->getType())->getVariants();
            foreach ($variants as $variant) {
                /** @var Button $button */
                $button = App::make(SubmitButton::class);
                $button->setTitle($variant['title']);
                $button->setStyle('info');
                $button->setDataAttribute('value', $variant['id']);
                $row->append($button);
            }
            $this->buttonRow = new Wrapper('');
            return $row;
        }
        return parent::makeInput($field, $record);
    }

}