<?php


namespace PinaSimpleControls\Controls;

use Exception;
use Pina\Controls\LinkedListItem;
use Pina\Controls\RecordTrait;
use Pina\Data\Schema;
use Pina\Html;

class FeedRecordRow extends LinkedListItem
{
    use RecordTrait;

    /**
     * @return string
     * @throws Exception
     */
    protected function drawInner()
    {
        $data = $this->record->getTextData();

        $titleField = $this->resolveTitleField($this->record->getSchema());
        $title = $data[$titleField];
        unset($data[$titleField]);

        $textField = $this->resolveDescriptionField($this->record->getSchema());

        $text = trim(mb_substr(strip_tags($data[$textField]), 0, 500));
        unset($data[$textField]);

        $enabled = $this->record->getValue('enabled') ?? 'Y';
        if ($enabled == 'N') {
            $this->addClass('disabled');
        }
        unset($data['enabled']);

        $icon = '';
        if (!empty($data['media_url'])) {
            $icon = Html::img($data['media_url'], ['class' => 'image']);
            unset($data['media_url']);
        }

        $content = [];
        $content[] = Html::tag('header', $title);

        $tags = implode(' • ', array_filter($this->processTags($data)));
        $second = $tags ? Html::tag('i', $tags) : '';
        if ($text) {
            $second .= ' — ' . $text;
        }
        $content[] = Html::nest('.short',  $second);

        return $icon . implode('', array_filter($content));
    }

    protected function processTags(&$data)
    {
        return $data;
    }

    protected function resolveTitleField(Schema $schema)
    {
        if ($schema->has('title')) {
            return 'title';
        }

        foreach ($schema as $field) {
            if ($field->hasTag('title')) {
                return $field->getName();
            }
        }
        return 'title';
    }

    protected function resolveDescriptionField(Schema $schema)
    {
        if ($schema->has('description')) {
            return 'description';
        }

        foreach ($schema as $field) {
            if ($field->hasTag('description')) {
                return $field->getName();
            }
        }
        return 'description';
    }
}