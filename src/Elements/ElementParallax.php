<?php

namespace Coxy\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

/**
 * Class \Coxy\Elements\Elements\ElementParallax
 *
 * @property string $Content
 * @property string $Height
 * @property string $Position
 * @property string $Opacity
 * @method \SilverStripe\Assets\Image Image()
 */
class ElementParallax extends BaseElement
{
    const IMAGE_DIR = 'Uploads' . DIRECTORY_SEPARATOR . 'parallax';

    private static $singular_name = 'Parallax';
    private static $plural_name = 'Parallaxes';
    private static $description = 'Parallax image with content';
    private static $table_name = 'ElementParallax';
    private static $icon = 'font-icon-block-banner';
    private static $element_class = 'parallax';

    private static $db = [
        'Content' => 'HTMLText',
        'Height' => 'Varchar(16)',
        'Position' => 'Varchar(16)',
        'Opacity' => 'Varchar(16)',
    ];

    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $owns = [
        'Image',
    ];

    private static $defaults = [
        'Height' => '',
        'Position' => '',
        'Opacity' => 'medium',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main', [
            HTMLEditorField::create('Content')->setRows(8),
            UploadField::create('Image')->setFolderName(self::IMAGE_DIR),
            DropdownField::create('Height', 'Block Height', [
                'small' => 'Small',
                'medium' => 'Medium',
                '' => 'Large',
            ]),
            DropdownField::create('Position', 'Content Position', [
                '' => 'Full Width',
                'left' => 'Left',
                'centre' => 'Centre',
                'right' => 'Right',
            ]),
            DropdownField::create('Opacity', 'Image Opacity', [
                '' => 'None',
                'low' => 'Low',
                'medium' => 'Medium',
                'high' => 'High',
            ]),
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
        if ($this->Image()->exists()) {
            $blockSchema['fileURL'] = $this->Image()->CMSThumbnail()->getURL();
            $blockSchema['fileTitle'] = $this->Image()->getTitle();
        }
        $blockSchema['content'] = $this->getSummary();
        return $blockSchema;
    }

    public function updateElementClasses(&$classes)
    {
        if ($this->Height)
            $classes['height'] = 'parallax--' . $this->Height;
        if ($this->Position)
            $classes['position'] = 'parallax--' . $this->Position;
        if ($this->Opacity)
            $classes['opacity'] = 'parallax--opacity-' . $this->Opacity;
    }
}
