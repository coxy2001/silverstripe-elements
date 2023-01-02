<?php

namespace Coxy\Elements\Elements;

use Bummzack\SortableFile\Forms\SortableUploadField;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Assets\Image;

/**
 * Class \Coxy\Elements\Elements\ElementGallery
 *
 * @method \SilverStripe\ORM\ManyManyList|\SilverStripe\Assets\Image[] Images()
 */
class ElementGallery extends BaseElement
{
    const IMAGE_DIR = 'Uploads' . DIRECTORY_SEPARATOR . 'gallery';

    private static $singular_name = 'Gallery';
    private static $plural_name = 'Galleries';
    private static $description = 'Gallery of images';
    private static $table_name = 'ElementGallery';
    private static $icon = 'font-icon-picture';
    private static $element_class = 'gallery';

    private static $db = [];

    private static $many_many = [
        'Images' => Image::class,
    ];

    private static $many_many_extraFields = [
        'Images' => [
            'Sort' => 'Int'
        ]
    ];

    private static $owns = [
        'Images',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab(
            'Root.Main',
            SortableUploadField::create('Images')
                ->setSortColumn('Sort')
                ->setFolderName(self::IMAGE_DIR),
        );

        return $fields;
    }

    public function getType()
    {
        return $this->singular_name();
    }

    public function getSummary()
    {
        $itemCount = $this->Images()->count();
        return "$itemCount Images";
    }

    protected function provideBlockSchema()
    {
        $blockSchema = parent::provideBlockSchema();
        if ($this->Images()->count() > 0) {
            $image = $this->Images()->sort('Sort')->first();
            $blockSchema['fileURL'] = $image->CMSThumbnail()->getURL();
            $blockSchema['fileTitle'] = $image->getTitle();
        }
        $blockSchema['content'] = $this->getSummary();
        return $blockSchema;
    }
}
