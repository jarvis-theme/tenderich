<!-- Default css-->
{{generate_theme_css('tenderich/assets/css/bootstrap.min.css')}}
{{generate_theme_css('tenderich/assets/css/font.css')}}

@if($tema->isiCss=='')
	{{generate_theme_css('tenderich/assets/css/style.css')}}
@else
	{{generate_theme_css('tenderich/assets/css/editstyle.css')}}	
@endif

{{favicon()}}  