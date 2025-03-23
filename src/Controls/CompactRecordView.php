<?php

namespace PinaSimpleControls\Controls;

use Pina\App;
use Pina\Controls\RecordView;
use Pina\Data\DataRecord;

class CompactRecordView extends RecordView
{
    /**
     * @param DataRecord $record
     */
    public function load($record)
    {
        //наша карточка на столько компактная, что title не нужен, так как выводим в заголовке страницы
        $record->getSchema()->forgetField('title');
        return parent::load($record);
    }
    protected function makeFormStatic()
    {
        return App::make(UntitledFormStatic::class);
    }
}