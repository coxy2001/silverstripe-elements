<?php

namespace Coxy\Elements\Models;

use Coxy\Elements\Elements\ElementAccordion;
use SilverStripe\ORM\DataObject;

/**
 * Class \Coxy\Elements\Models\AccordionItem
 *
 * @property string $Title
 * @property string $Content
 * @property int $Sort
 * @property int $AccordionID
 * @method \Coxy\Elements\Elements\ElementAccordion Accordion()
 */
class AccordionItem extends DataObject
{
    private static $singular_name = 'Accordion Item';
    private static $plural_name = 'Accordion Items';
    private static $description = 'A collapsable item';
    private static $table_name = 'AccordionItem';

    private static $db = [
        'Title' => 'Varchar',
        'Content' => 'HTMLText',
        'Sort' => 'Int',
    ];

    private static $has_one = [
        'Accordion' => ElementAccordion::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName(['AccordionID', 'Sort']);
        return $fields;
    }
}
