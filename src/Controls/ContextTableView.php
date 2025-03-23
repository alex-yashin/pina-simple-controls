<?php


namespace PinaSimpleControls\Controls;


use Pina\App;
use Pina\Controls\RecordRow;
use Pina\Controls\Table;
use Pina\Controls\Wrapper;
use Pina\Data\DataRecord;

class ContextTableView extends \Pina\Controls\TableView
{
    public function load($dataTable)
    {
        $dataTable->getSchema()->forgetField('enabled');
        return parent::load($dataTable);
    }

    /**
     * @return Table
     */
    protected function makeTable()
    {
        App::assets()->addScript('/vendor/simple-css-styles/src/context/context.js');
        return parent::makeTable()->wrap(new Wrapper('.table'));
    }

    /**
     * @return RecordRow
     */
    protected function makeRow(DataRecord $record)
    {
        /** @var RecordRow $row */
        $row = App::make(RecordRow::class);
        $row->load($record);
        $data = $record->getData();
        if (isset($data['enabled']) && $data['enabled'] != 'Y') {
            $row->addClass('disabled');
        }
        if ($record->getPrimaryKey()) {
            $row->addClass('context');
            $row->setDataAttribute('resource', $this->location->resource('@/:id/context-menu', ['id' => $record->getSinglePrimaryKey()]));
        }
        return $row;
    }
}