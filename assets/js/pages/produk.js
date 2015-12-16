define(['jquery','jq_ui','bootstrap','flexslider','jquery_sharrre'], function($)
{
	return new function()
	{
		var self = this;
		self.run = function()
		{
			slider();
			sharrreButtons();
			
			// Fancybox function
			$('#flexslider-product .slides a').fancybox();

			$(".collapse").collapse();
		};

		var sharrreButtons = function(){
			$('#twitter').sharrre({
			  share: {
				twitter: true
			  },
			  enableHover: true,
			  enableTracking: true,
			  enableCounter: false,
			  buttons: { 
				twitter: {via: 'jarvis_store', count: 'vertical'}
			  },
			  click: function(api, options){
				api.simulateClick();
				api.openPopup('twitter');
			  }
			});
			$('#facebook').sharrre({
			  share: {
				facebook: true
			  },
			  buttons: {
				facebook: {layout: 'box_count'}
			  },
			  enableHover: false,
			  enableTracking: true,
			  enableCounter: false,
			  click: function(api, options){
				api.simulateClick();
				api.openPopup('facebook');
			  }
			});
			$('#googleplus').sharrre({
			  share: {
				googlePlus: true
			  },
			  buttons: {
				googlePlus: {size: 'tall', annotation:'bubble'}
			  },
			  enableHover: false,
			  enableTracking: true,
			  enableCounter: false,
			  click: function(api, options){
				api.simulateClick();
				api.openPopup('googlePlus');
			  }
			});
			$('#delicious').sharrre({
			  share: {
				delicious: true
			  },
			  buttons: {
				delicious: {size: 'tall'}
			  },
			  enableHover: true,
			  enableTracking: true,
			  enableCounter: false
			});
			$('#stumbleupon').sharrre({
			  share: {
				stumbleupon: true
			  },
			  buttons: {
				stumbleupon: {layout: '5'}
			  },
			  enableHover: true,
			  enableTracking: true,
			  enableCounter: false
			});
		};

		var slider = function(){
			//Main slider
			$('#flexcarousel').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			itemWidth: 188,
			//itemMargin: 5 ,
			asNavFor: '#flexslider'
		  });
		   
		  $('#flexslider').flexslider({
			animation: "slide",
			controlNav: true,
			animationLoop: true,
			slideshow: true,
			slideshowSpeed: 5000,
			animationSpeed: 600,
			sync: "#flexcarousel"
		  });
		  
		  // Thubnail
		  $('#flexcarousel-product').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			itemWidth: 115,
			asNavFor: "#flexslider-product"
		  });
		  
		  $('#flexslider-product').flexslider({
			animation: "slide",
			controlNav: true,
			animationLoop: true,
			slideshow: false,
			sync: "#flexcarousel-product"
		  });

		  // Brands
		  $('#flexcarousel-brands').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: true,
			slideshow: false,
			itemWidth: 180,
		  });
		};
	};
});