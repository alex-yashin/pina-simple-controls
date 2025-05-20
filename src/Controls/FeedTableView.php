<?php


namespace PinaSimpleControls\Controls;


use Pina\App;
use Pina\Controls\TableView;
use Pina\Controls\Wrapper;
use Pina\Data\DataRecord;
use Pina\Data\Schema;

class FeedTableView extends TableView
{

    protected function drawInner()
    {
        $container = new Wrapper('ul.nav feed ');

        App::assets()->addScript('/vendor/simple-css-styles/src/context/context.js');
        foreach ($this->dataTable as $record) {
            $id = $this->resolveId($record);
            $container->append($this->makeFeedRecordRow($record, $id));
        }
        return $container;
    }

    protected function makeFeedRecordRow(DataRecord $record, $id): FeedRecordRow
    {
        $row = App::make(FeedRecordRow::class);
        $row->load($record);

        $row->setLink($this->location->link('@/:id', ['id' => $id ?? 0]));

        $row->addClass('context');
        $row->setDataAttribute('resource', $this->location->resource('@/:id/context-menu', ['id' => $id]));
        return $row;
    }

    protected function resolveId(DataRecord $record)
    {
        $slugField = $this->resolveSlugField($this->dataTable->getSchema());
        $pk = null;
        if ($slugField) {
            $pk = $record->getMeta($slugField);
        }

        if (empty($pk)) {
            $pk = $record->getSinglePrimaryKey($this->context);
        }

        return $pk;
    }

    protected function resolveSlugField(Schema $schema)
    {
        if ($schema->has('slug')) {
            return 'slug';
        }

        foreach ($schema as $field) {
            if ($field->hasTag('slug')) {
                return $field->getName();
            }
        }
        return null;
    }
}