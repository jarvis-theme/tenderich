	<div class="slides home-span12">
		<div class="container">
			<div id="flexslider" class="flexslider row">
				<ul class="slides span12">
			    	@foreach(slideshow() as $slider)
				    <li>
				    	@if(!empty($slider->url))
                        <a href="{{filter_link_url($slider->url)}}" target="_blank">
				    	@else
                        <a href="#">
				    	@endif
							<img src="{{slide_image_url($slider->gambar)}}" alt="Slide Promo" />
						</a>
						<!--  <p class="flex-caption">
							<strong>CAPTION</strong><br />
							Put any caption, description or anything here.<br /><br />
							<a href="#" class="btn theme">$69 | BUY IT</a>
						</p> -->
				    </li>
				    @endforeach
				</ul>
			</div>	
		</div>
	</div>