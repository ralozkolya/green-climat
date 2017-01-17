CKEDITOR.dialog.add('pdfDialog', function (editor) {
    return {
        title: 'PDF',
        minWidth: 400,
        minHeight: 200,

        contents: [
            {
				id: 'Upload',
				hidden: true,
				filebrowser: 'uploadButton',
				label: editor.lang.image.upload,
				elements: [
					{
						type: 'text',
						id: 'label',
						label: editor.lang.link.displayText,
					},
					{
						type: 'text',
						id: 'url',
						label: editor.lang.common.url,
					},
					{
					    type: 'button',
					    hidden: true,
					    id: 'id0',
					    label: editor.lang.common.browseServer,
					    filebrowser: {
					        action: 'Browse',
					        target: 'Upload:url',
					    }
					},
					{
						type: 'file',
        				id: 'upload',
    				},
					{
				        type: 'fileButton',
				        id: 'uploadButton',
				        filebrowser: 'Upload:url',
				        label: editor.lang.common.uploadSubmit,
				        for: ['Upload', 'upload']
				    }
				]
			}
        ],

        onOk: function() {
        	var dialog = this;
        	var href = dialog.getValueOf('Upload', 'url');
        	var label = dialog.getValueOf('Upload', 'label');

        	editor.insertHtml('<a target="_blank" href="'+href+'" class="btn btn-warning">'+label+'</a>');
        }
    };
});