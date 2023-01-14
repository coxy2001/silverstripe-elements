<?php

namespace Coxy\Elements\Models;

use SilverStripe\ORM\DataObject;

/**
 * Class \Coxy\Elements\Models\AccordionItem
 *
 * @property string $Name
 * @property string $Affiliation
 * @property string $Content
 */
class Testimonial extends DataObject
{
    private static $singular_name = 'Testimonial';
    private static $plural_name = 'Testimonials';
    private static $description = 'A clients testimonial';
    private static $table_name = 'Testimonial';

    private static $db = [
        'Name' => 'Varchar',
        'Affiliation' => 'Varchar',
        'Content' => 'HTMLText',
    ];

    private static $summary_fields = [
        'Name' => 'Name',
        'Affiliation' => 'Affiliation',
        'Content.Summary' => 'Testimonial',
    ];

    private static $searchable_fields = [
        'Name',
        'Affiliation',
        'Content',
    ];
}
