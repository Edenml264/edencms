<!-- FilePond Styles -->
<link href="https://unpkg.com/filepond@4.30.4/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview@4.6.11/dist/filepond-plugin-image-preview.css" rel="stylesheet">

<!-- FilePond Plugins -->
<script src="https://unpkg.com/filepond-plugin-image-preview@4.6.11/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type@1.2.8/dist/filepond-plugin-file-validate-type.js"></script>

<!-- FilePond Library -->
<script src="https://unpkg.com/filepond@4.30.4/dist/filepond.js"></script>

<!-- Initialize FilePond -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType
        );
    });
</script>