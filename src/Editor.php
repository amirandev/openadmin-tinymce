<?php

namespace Amirandev\OpenadminTinymce;

use OpenAdmin\Admin\Form\Field\Textarea;

class Editor extends Textarea
{
    /**
     * Blade view used to render this TinyMCE editor field.
     */
    protected $view = 'open-admin-tinymce::editor';

    /**
     * Setup URLs for image/file browsing.
     * Adjust these URLs to your media manager routes if you have one.
     */
    public function setupImageBrowse()
    {
        $this->options['file_browser_callback'] = 'function(field_name, url, type, win) {
            window.open("/admin/media?select=true&close=true&fn=window.opener." + field_name + "_selectFile", "File Browser", "width=800,height=600");
        }';
    }

    /**
     * Render the editor field and initialize TinyMCE with options.
     */
    public function render()
    {
        return parent::render();
    }
}
