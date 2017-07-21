<div class="container">
	<section class="page">
		<div class="row">
			<div class="span12">
				<!-- Replace data-center with your address -->
				@if($kontak->lat=='0' || $kontak->lng=='0')
    			<iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{str_replace(' ','+',$kontak->alamat)}}&amp;aq=0&amp;oq={{str_replace(' ','+',$kontak->alamat)}}&amp;sspn={{ $kontak->lat.','.$kontak->lng }}&amp;ie=UTF8&amp;hq=&amp;hnear={{ $kontak->alamat }}&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br />
				@else
    			<iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->lat.','.$kontak->lng }}&amp;aq=&amp;sll={{ $kontak->lat.','.$kontak->lng }}&amp;sspn={{ $kontak->lat.','.$kontak->lng }}&amp;ie=UTF8&amp;t=m&amp;z=14&amp;output=embed"></iframe><br />
				@endif
			</div>
		</div>

		<div class="row address">
			<div class="span4">
				<div class="wrap contactform">
					<address class="row-fluid">
						<div class="pull-left clabel"><i class="icon-location"></i></div>
						<div class="pull-left cdata">{{$kontak->alamat}}</div>
					</address>

					<address class="row-fluid">
						<div class="pull-left clabel"><i class="icon-mail"></i></div>
						<div class="pull-left cdata"><a href="mailto:{{$kontak->email}}">{{$kontak->email}}</a></div>
					</address>
				</div>
			</div>

			<div class="span8">
				<div class="row-fluid">
					<form action="{{url('kontak')}}" class="wrap contactform" method="post">
						<div class="span6">
							<input type="text" class="span12 input-xlarge" name="namaKontak" placeholder="Nama" value="{{ Input::old('namaKontak') }}" required>
						</div>

						<div class="span6">
							<input type="text" class="span12 input-xlarge" name="emailKontak" placeholder="Email" value="{{ Input::old('emailKontak') }}" required>
						</div>

						<div class="row-fluid">
							<div class="span12">
								<textarea class="input-block-level" rows="5" name="messageKontak" placeholder="Pesan" required>{{ Input::old('messageKontak') }}</textarea>
							</div>
							<p><input type="submit" class="btn theme" value="Kirim"/></p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>