<?php

namespace Coxy\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;

/**
 * Class \Coxy\Elements\Elements\ElementEmbed
 *
 * @property string $HTML
 * @property int $MaxWidth
 * @property int $ScreenX
 * @property int $ScreenY
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
        'MaxWidth' => 'Int',
        'ScreenX' => 'Int',
        'ScreenY' => 'Int',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main', [
            TextareaField::create('HTML', 'HTML'),
            DropdownField::create('MaxWidth', 'Maximum Width', [
                0 => 'None',
                600 => 'Small',
                800 => 'Medium',
                1000 => 'Large',
            ]),
            TextField::create('ScreenX', 'ScreenX'),
            TextField::create('ScreenY', 'ScreenY'),
        ]);

        return $fields;
    }

    public function getType()
    {
        return $this->singular_name();
    }

    public function getSummary()
    {
        return $this->dbObject('HTML')->Summary(20);
    }

    protected function provideBlockSchema()
    {
        $blockSchema = parent::provideBlockSchema();
        $blockSchema['content'] = $this->getSummary();
        return $blockSchema;
    }

    public function getResolution()
    {
        return $this->ScreenY / $this->ScreenX * 100;
    }
}
