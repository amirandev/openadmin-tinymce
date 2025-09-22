<?php

namespace Amirandev\OpenadminTinymce;

use OpenAdmin\Admin\Extension;

class Tinymce extends Extension
{
    // Correct name for the extension
    public $name = 'tinymce';

    // Path to your package views folder
    public $views = __DIR__ . '/../resources/views';

    /**
     * Path to your package's assets folder
     *
     * @return string
     */
    public function assets()
    {
        return __DIR__ . '/../resources/assets';
    }

    /**
     * Boot method for your extension
     *
     * @return bool
     */
    public static function boot()
    {
        return true;
    }

    /**
     * Getter for views (optional, but matches ServiceProvider call)
     *
     * @return string
     */
    public function views()
    {
        return $this->views;
    }
}
