<?php

namespace Coxy\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\TextareaField;

/**
 * Class \Coxy\Elements\Elements\ElementEmbed
 *
 * @property string $HTML
 */
class ElementEmbed extends BaseElement
{
    private static $singular_name = 'Embed';
    private static $plural_name = 'Embeds';
    private static $description = 'Embed code into the website';
    private static $table_name = 'ElementEmbed';
    private static $icon = 'font-icon-code';
    private static $element_class = 'embed';

    private static $db = [
        'HTML' => 'HTMLText',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main', [
            TextareaField::create('HTML', 'HTML'),
        ]);

        return $fields;
    }

    public function getType()
    {
        return $this->singular_name();
    }

    public function getSummary()
    {
        return $this->dbObject('Content')->Summary(20);
    }

    protected function provideBlockSchema()
    {
        $blockSchema = parent::provideBlockSchema();
        $blockSchema['content'] = $this->getSummary();
        return $blockSchema;
    }
}
