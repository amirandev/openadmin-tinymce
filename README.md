<<<<<<< HEAD
Perfect! Since you’re now using **TinyMCE**, here’s a fully polished **README.md** tailored specifically for your TinyMCE Open-Admin package. You can copy-paste it directly:

---

# Integrate TinyMCE into Open-Admin

This is an **Open-Admin** extension that integrates the **TinyMCE** WYSIWYG editor into the Open-Admin form system.

---

## Screenshot

![field-tinymce](https://user-images.githubusercontent.com/86517067/149800371-a99f23ba-c979-4122-bb7d-2cc32ecd0982.png)
*Example TinyMCE field in an Open-Admin form*

---

## Installation

Install the package via Composer:

```bash
composer require amirandev/openadmin-tinymce
```

Publish the package assets (JS/CSS) so they are accessible by your application:

```bash
php artisan vendor:publish --tag=open-admin-tinymce
```

---

## Configuration

In your `config/admin.php` file, add the `tinymce` extension under the `extensions` section:

```php
'extensions' => [

    'tinymce' => [

        // Set to false to disable this extension
        'enable' => true,

        // Editor configuration options
        'config' => [

            // See TinyMCE docs for available options
        ],
    ],

],
```

Example configuration:

```php
'config' => [
    'height' => 500,
    'menubar' => false,
    'plugins' => 'link image code table lists',
    'toolbar' => 'undo redo | styleselect | bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist | table | link image media | code',
]
```

For more configuration options, see the official [TinyMCE Documentation](https://www.tiny.cloud/docs/).

---

## Usage

Use the TinyMCE editor in your Open-Admin form like this:

```php
$form->tinymce('content');
```

Or with custom options:

```php
$form->tinymce('content')->options([
    'height' => 400,
    'menubar' => true,
    'plugins' => 'link image code table lists',
    'toolbar' => 'undo redo | bold italic | alignleft aligncenter alignright | bullist numlist | code',
]);
```

---

## Troubleshooting

If TinyMCE does not load or you see errors about missing files, try clearing your application cache:

```bash
php artisan optimize:clear
```

---

## License

This package is licensed under the [MIT License](LICENSE).

---

If you want, I can also **add a short “Media Manager Integration” section** showing how to use your custom file/image buttons inside TinyMCE, so your README fully documents all features.

Do you want me to add that?
=======
# openadmin-tinymce
>>>>>>> c85364e96523b59ecbbfedb4e45599ba349a91a5
