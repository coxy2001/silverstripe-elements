<?php

namespace Coxy\Elements\Models;

use Coxy\Elements\Elements\ElementIcons;
use gorriecoe\Link\Models\Link;
use gorriecoe\LinkField\LinkField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;

/**
 * Class \Coxy\Elements\Models\Icon
 *
 * @property string $Title
 * @property string $Content
 * @property int $Sort
 * @property int $ImageID
 * @property int $CTALinkID
 * @property int $ElementIconsID
 * @method \SilverStripe\Assets\Image Image()
 * @method \gorriecoe\Link\Models\Link CTALink()
 * @method \Coxy\Elements\Elements\ElementIcons ElementIcons()
 */
class Icon extends DataObject
{
    const IMAGE_DIR = 'Uploads' . DIRECTORY_SEPARATOR . 'icons';

    private static $singular_name = 'Icon';
    private static $plural_name = 'Icons';
    private static $description = 'An image with text and a link';
    private static $table_name = 'Icon';

    private static $db = [
        'Title' => 'Varchar',
        'Content' => 'HTMLText',
        'Sort' => 'Int',
    ];

    private static $has_one = [
        'Image' => Image::class,
        'CTALink' => Link::class,
        'ElementIcons' => ElementIcons::class,
    ];

    private static $owns = [
        'Image',
    ];

    private static $summary_fields = [
        'Image.CMSThumbnail' => 'Image',
        'Title' => 'Title',
        'Content.Summary' => 'Content',
    ];

    private static $searchable_fields = [
        'Image.Title',
        'Title',
        'Content',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName(['ElementIconsID', 'CTALinkID', 'Sort']);

        $fields->addFieldsToTab('Root.Main', [
            TextField::create('Title'),
            HTMLEditorField::create('Content')->setRows(8),
            UploadField::create('Image')->setFolderName(self::IMAGE_DIR),
            LinkField::create('CTALink', 'Link', $this),
        ]);

        return $fields;
    }
}
