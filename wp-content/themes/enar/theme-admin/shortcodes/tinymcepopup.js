(function() {
	tinymce.create('tinymce.plugins.popup', {
		init : function(ed, url) {
				ed.addCommand('mcepopup', function() {
					tb_show("Enar Shortcodes", url + '/shortcode-popup.php?&width=1000&height=530');
				});
				// Register buttons
				ed.addButton('popup', {	
					title : 'Shortcodes',
					cmd : 'mcepopup', 
					image : url + '/images/shortcode-icon.png' 
				});
			}
		});
	tinymce.PluginManager.add('popupbutton', tinymce.plugins.popup);
})();