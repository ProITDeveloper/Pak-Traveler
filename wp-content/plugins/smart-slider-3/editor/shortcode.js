(function () {
    tinymce.create('tinymce.plugins.nextend2smartslider3', {
        init: function (ed, url) {
            ed.addButton('nextend2smartslider3', {
                title: 'Smart Slider 3',
                image: url + '/../images/icon20x.png',
                onclick: function () {
                    NextendSmartSliderWPTinyMCEModal(ed);
                }
            });
        },
    tinymce.PluginManager.add('nextend2smartslider3', tinymce.plugins.nextend2smartslider3);
})();