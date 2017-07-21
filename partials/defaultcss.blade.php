<!-- Default css-->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" >
{{generate_theme_css('tenderich/assets/css/bootstrap.min.css')}} 
{{generate_theme_css('tenderich/assets/css/font.css')}} 

@if($tema->isiCss=='')
	{{generate_theme_css('tenderich/assets/css/style.css?v=001')}} 
@else
	{{generate_theme_css('tenderich/assets/css/editstyle.css?v=001')}} 
@endif

<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.3.1/jssocials.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.3.1/jssocials-theme-flat.css" />
{{favicon()}}  