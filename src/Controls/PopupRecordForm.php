<?php

namespace PinaSimpleControls\Controls;

use Pina\App;
use Pina\Controls\BodyLessRecordFormCompiler;
use Pina\Controls\RecordFormCompiler;
use Pina\Data\DataRecord;
use Pina\Html;
use Pina\Controls\RecordForm;

class PopupRecordForm extends RecordForm
{
    protected $title = '';

    public function __construct()
    {
        parent::__construct();
        $this->addClass('popup popup-dialog');
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    protected function drawHeader()
    {
        return Html::nest('header/button.close[data-close-modal=]+h3', $this->title)
            . parent::drawHeader();
    }

    protected function makeRecordFormCompiled(DataRecord $record): RecordFormCompiler
    {
        /** @var BodyLessRecordFormCompiler $compiler */
        $compiler = App::make(BodyLessRecordFormCompiler::class);
        $compiler->load($record, $this);

        return $compiler;
    }

}