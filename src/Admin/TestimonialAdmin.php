<?php

namespace Coxy\Elements\Admin;

use Coxy\Elements\Models\Testimonial;
use SilverStripe\Admin\ModelAdmin;
use SilverStripe\Forms\GridField\GridFieldConfig;
use SilverStripe\Forms\GridField\GridFieldExportButton;
use SilverStripe\Forms\GridField\GridFieldImportButton;
use SilverStripe\Forms\GridField\GridFieldPrintButton;

/**
 * Class \Coxy\Website\Admin\PhotoAdmin
 *
 */
class TestimonialAdmin extends ModelAdmin
{
    private static $menu_title = 'Testimonials';
    private static $url_segment = 'testimonials';

    private static $managed_models = [
        Testimonial::class,
    ];

    protected function getGridFieldConfig(): GridFieldConfig
    {
        $config = parent::getGridFieldConfig();

        $config->removeComponentsByType([
            GridFieldImportButton::class,
            GridFieldExportButton::class,
            GridFieldPrintButton::class,
        ]);

        return $config;
    }
}
