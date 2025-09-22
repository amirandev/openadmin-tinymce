@include('admin::form._header')

<textarea name="{{ $name }}" id="{{ $id }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}" {!! $attributes !!}>{{ old($column, $value) }}</textarea>

<script src="{{ asset('vendor/openadmin-tinymce/tinymce.js') }}"></script>
<link rel="stylesheet" href="{{ asset('vendor/openadmin-tinymce/style.css') }}">

<script>
    // Callback for inserting image from your media manager
    function {{ $id }}_insertImage(url) {
        tinymce.get('{{ $id }}').insertContent('<img src="' + url + '" />');
        if (window.FileManagerWindow) {
            window.FileManagerWindow.close();
        }
    }

    // Callback for inserting document link
    function {{ $id }}_insertDocument(url, file_name) {
        var linkHtml = '<a href="' + url + '" target="_blank">' + file_name + '</a>';
        tinymce.get('{{ $id }}').insertContent(linkHtml);
        if (window.FileManagerWindow) {
            window.FileManagerWindow.close();
        }
    }

    function openMediaManagerImage() {
        window.FileManagerWindow = window.open(
            '/admin/media?select=true&close=true&fn=window.opener.{{ $id }}_insertImage',
            'FileManager',
            'width=900,height=600'
        );
    }

    function openMediaManagerDoc() {
        window.FileManagerWindow = window.open(
            '/admin/media?select=true&close=true&fn=window.opener.{{ $id }}_insertDocument',
            'FileManager',
            'width=900,height=600'
        );
    }

    // Initialize TinyMCE
    tinymce.init({
        selector: '#{{ $id }}',
        height: 260,
        plugins: 'link image code table lists',
        toolbar: 'undo redo | styleselect | bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist | table | link image media | code',
        setup: function (editor) {
            // Add custom buttons for media manager
            editor.ui.registry.addButton('fileManagerImage', {
                icon: 'image',
                tooltip: 'Insert image from media manager',
                onAction: openMediaManagerImage
            });
            editor.ui.registry.addButton('fileManagerDoc', {
                icon: 'link',
                tooltip: 'Insert document link from media manager',
                onAction: openMediaManagerDoc
            });
        }
    });
</script>

@include('admin::form._footer')
