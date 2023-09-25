<?php

namespace Coxy\Elements\Elements;

use Coxy\Elements\Models\Testimonial;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\ORM\DB;

/**
 * Class \Coxy\Elements\Elements\ElementTestimonials
 *
 * @property int $Limit
 */
class ElementTestimonials extends BaseElement
{
    private static $singular_name = 'Testimonials';
    private static $plural_name = 'Testimonials';
    private static $description = 'Testimonials';
    private static $table_name = 'ElementTestimonials';
    private static $icon = 'font-icon-comment';
    private static $element_class = 'testimonials';

    private static $db = [
        'Limit' => 'Int',
    ];

    private static $defaults = [
        'Limit' => 10,
    ];

    public function getType()
    {
        return $this->singular_name();
    }

    public function getTestimonials()
    {
        $random = DB::get_conn()->random();
        return Testimonial::get()->orderBy($random)->limit($this->Limit);
    }
}
