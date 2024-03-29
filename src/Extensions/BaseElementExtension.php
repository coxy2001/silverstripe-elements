<?php

namespace Coxy\Elements\Extensions;

use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

/**
 * Class \Coxy\Elements\Extensions\BaseElementExtension
 *
 * @property string $TitleAlignment
 * @property string $TextColour
 * @property string $BackgroundColour
 * @property string $PaddingTop
 * @property string $PaddingBottom
 * @property bool $Contained
 */
class BaseElementExtension extends DataExtension
{
    private static $db = [
        'TitleAlignment' => 'Varchar(16)',
        'TextColour' => 'Varchar(16)',
        'BackgroundColour' => 'Varchar(16)',
        'PaddingTop' => 'Varchar(16)',
        'PaddingBottom' => 'Varchar(16)',
        'Contained' => 'Boolean',
    ];

    private static $defaults = [
        'TitleAlignment' => '',
        'TextColour' => '',
        'BackgroundColour' => '',
        'PaddingTop' => 'medium',
        'PaddingBottom' => 'medium',
        'Contained' => true,
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $titleAlignment = DropdownField::create(
            'TitleAlignment',
            'Title Alignment',
            [
                '' => 'Inherit',
                'left' => 'Left',
                'centre' => 'Centre',
                'right' => 'Right',
            ]
        );

        $textColour = DropdownField::create(
            'TextColour',
            'Text Colour',
            [
                '' => 'Inherit',
                'light' => 'Light',
                'dark' => 'Dark',
                'primary' => 'Primary',
                'secondary' => 'Secondary',
            ]
        );

        $backgroundColour = DropdownField::create(
            'BackgroundColour',
            'Background Colour',
            [
                '' => 'None',
                'light' => 'Light',
                'dark' => 'Dark',
                'primary' => 'Primary',
                'secondary' => 'Secondary',
            ]
        );

        $paddingTop = DropdownField::create(
            'PaddingTop',
            'Padding Top',
            [
                '' => 'None',
                'small' => 'Small',
                'medium' => 'Default',
                'large' => 'Large',
            ]
        );

        $paddingBottom = DropdownField::create(
            'PaddingBottom',
            'Padding Bottom',
            [
                '' => 'None',
                'small' => 'Small',
                'medium' => 'Default',
                'large' => 'Large',
            ]
        );

        $contained = CheckboxField::create('Contained', 'Block width contained?');

        $fields->addFieldsToTab('Root.Settings', [
            $titleAlignment,
            $textColour,
            $backgroundColour,
            $paddingTop,
            $paddingBottom,
            $contained,
        ]);
    }

    public function getElementClasses()
    {
        $owner = $this->owner;
        $classes = [];

        if ($owner->config()->get('element_class'))
            $classes['element'] = $owner->config()->get('element_class');
        if ($owner->TitleAlignment)
            $classes['title-align'] = 'element--title-' . $owner->TitleAlignment;
        if ($owner->TextColour)
            $classes['text-color'] = 'element--text-' . $owner->TextColour;
        if ($owner->BackgroundColour)
            $classes['bg-colour'] = 'element--bg-' . $owner->BackgroundColour;
        if ($owner->PaddingTop)
            $classes['pad-top'] = 'element--pad-top-' . $owner->PaddingTop;
        if ($owner->PaddingBottom)
            $classes['pad-bottom'] = 'element--pad-bottom-' . $owner->PaddingBottom;
        if ($owner->ExtraClass)
            $classes['extra'] = $owner->ExtraClass;

        $owner->invokeWithExtensions('updateElementClasses', $classes);
        return implode(' ', $classes);
    }

    public function getContainerClass()
    {
        return $this->owner->Contained ? 'container' : 'container-full';
    }
}
