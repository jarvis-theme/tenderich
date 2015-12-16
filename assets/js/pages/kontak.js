define(['jquery','mobilegmap'], function($,mobileGmap)
{
	return new function()
	{
		var self = this;
		self.run = function()
		{
			if ($('#map').hasClass('gmap')) {
				$('.gmap').mobileGmap();
			}
		};
	};
});