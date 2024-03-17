(function($) {
    "use strict";
    var HT = {};

    HT.setupCkeditor = () => {
        if ('.ck-editor') {
            $('.ck-editor').each(function() {
                let editor = $(this)
                let elementId = editor.attr('id')
                HT.ckeditor4(elementId)
            })
        }
    }

    HT.ckeditor4 = (elementId) => {
        CKEDITOR.replace(elementId, {
            height: 250,
            removeButtons: '',
            entities: true,
            toolbarGroups: [
                { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
                { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
                { name: 'links' },
                { name: 'insert' },
                { name: 'forms' },
                { name: 'tools' },
                { name: 'document',       groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'others' },
                '/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                { name: 'styles' },
                { name: 'colors' },
                { name: 'about' }
            ]
        })
    }

    HT.inputImage = () => {
        $(document).on('click', '.input-image', function() {
            let _this = $(this);
            let fileUpload = _this.attr('data-upload');
            HT.BrowseServerInput(_this, fileUpload);
        })
    }

    HT.BrowseServerInput = (object, type) => {
        if(typeof(type) == 'undefined') {
            type = 'Images';
        }
        var finder = new CKFinder();
        finder.resourceType = type;

        finder.selectActionFunction = function(fileUrl, data) {
            // fileUrl = fileUrl.replace(BASE_URL,"/");

            object.val('/'+fileUrl)
        }
        finder.popup();
    }


    $(document).ready(function() {
        HT.inputImage();
        HT.setupCkeditor();
    });

})(jQuery);