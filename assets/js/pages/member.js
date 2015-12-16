define(['jquery','bootstrap'], function($)
{
	return new function(){
		var self = this;
		self.run = function(){
            $('#myTab a:first').tab('show');

            // Tab function
			$('#myTab a, #myTab button').click(function (e) {
				e.preventDefault();
				$(this).tab('show');
			});
		};
	}
});