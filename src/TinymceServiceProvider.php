<?php

namespace Amirandev\OpenadminTinymce;

use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Admin;
use Amirandev\OpenadminTinymce\Editor;
use Amirandev\OpenadminTinymce\Tinymce;
use Illuminate\Support\ServiceProvider;

class TinymceServiceProvider extends ServiceProvider
{
    /**
     * Boot the extension.
     */
    public function boot(Tinymce $extension)
    {
        // Boot your extension (optional)
        if (method_exists($extension, 'boot') && ! $extension->boot()) {
            return;
        }

        // Load views
        if (method_exists($extension, 'views') && $views = $extension->views()) {
            $this->loadViewsFrom($views, 'open-admin-tinymce');
        }

        // Publish assets when running in console
        if ($this->app->runningInConsole() && method_exists($extension, 'assets') && $assets = $extension->assets()) {
            $this->publishes([
                $assets => public_path('vendor/openadmin-tinymce'),
            ], 'open-admin-tinymce');
        }

        // Register CSS/JS and extend forms
        Admin::booting(function () {
            Admin::css('vendor/openadmin-tinymce/style.css');
            Admin::js('vendor/openadmin-tinymce/tinymce.js', false);
            Form::extend('tinymce', Editor::class);
        });
    }
}
