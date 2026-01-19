(function($) {
  "use strict";
  
  jQuery(document).ready(function($) {
    $(document).on('click', '.upload_logo_button', function(e) {
        e.preventDefault();
        var widget = $(this).closest('.widget');
        var logoUrlInput = widget.find('.logo_url');
        var logoPreview = widget.find('.logo_preview');

        var mediaUploader = wp.media({
            title: 'Choose Logo',
            button: {
                text: 'Use this image'
            },
            multiple: false
        });

        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            logoUrlInput.val(attachment.url).trigger('change');
            logoPreview.html('<img src="' + attachment.url + '" alt="Logo Preview" style="max-width: 100%; height: auto;" />');
        });

        mediaUploader.open();
    });
});






})(jQuery); 



