var mb = jQuery.noConflict();
mb(document).ready(function() {
	var meta_image_frame; // Initiahte Media Library Frame
	mb('body').on('click', '.openMedia', function(e) {
		e.preventDefault();

		var btnLoc = mb(this)
		var fieldPlacement = btnLoc.prev('input');
		var imagePlc = btnLoc.prev('img');
		
		//If the frame exists, open it
		if(meta_image_frame) {
			wp.media.editor.open();
			return;
		}

		// Set up the media library frame
		meta_image_frame  = wp.media.frames.meta_image_frame = wp.media({
			title: meta_image.title,
			button: { text: meta_image.button },
			library: { type: 'image' }
		});

		//Run when an image is selected 
		meta_image_frame.on('click', function() {


			// Grabs the selected image and sends a json object of the image
			var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

			console.log(media_attachment);

			fieldPlacement.val(media_attachment.url);
			imagePlc.attr('src', media_attachment.url);
		});

		// Open the Media  Library Frame
		wp.media.editor.open();

	});
});