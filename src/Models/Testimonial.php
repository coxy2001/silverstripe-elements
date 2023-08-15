<?php

namespace Coxy\Elements\Models;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;

/**
 * Class \Coxy\Elements\Models\AccordionItem
 *
 * @property string $Name
 * @property string $Position
 * @property string $Affiliation
 * @property string $Content
 * @property int $LogoID
 */
class Testimonial extends DataObject
{
    const IMAGE_DIR = 'Uploads' . DIRECTORY_SEPARATOR . 'logos';

    private static $singular_name = 'Testimonial';
    private static $plural_name = 'Testimonials';
    private static $description = 'A clients testimonial';
    private static $table_name = 'Testimonial';

    private static $db = [
        'Name' => 'Varchar',
        'Position' => 'Varchar',
        'Affiliation' => 'Varchar',
        'Content' => 'HTMLText',
    ];

    private static $has_one = [
        'Logo' => Image::class,
    ];

    private static $owns = [
        'Logo',
    ];

    private static $summary_fields = [
        'Logo.CMSThumbnail' => 'Logo',
        'Name' => 'Name',
        'Position' => 'Position',
        'Affiliation' => 'Affiliation',
        'Content.Summary' => 'Testimonial',
    ];

    private static $searchable_fields = [
        'Name',
        'Position',
        'Affiliation',
        'Content',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main', [
            UploadField::create('Logo')->setFolderName(self::IMAGE_DIR),
        ]);

        return $fields;
    }
}
