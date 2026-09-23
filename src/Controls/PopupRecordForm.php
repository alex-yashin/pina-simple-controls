<?php

namespace PinaSimpleControls\Controls;

use Pina\App;
use Pina\Controls\Record\BodyLessRecordFormCompiler;
use Pina\Controls\Record\RecordForm;
use Pina\Controls\Record\RecordFormCompiler;
use Pina\Html;

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

    protected function makeRecordFormCompiled(): RecordFormCompiler
    {
        /** @var BodyLessRecordFormCompiler $compiler */
        $compiler = App::make(BodyLessRecordFormCompiler::class);
        $compiler->load($this, $this);

        return $compiler;
    }

}