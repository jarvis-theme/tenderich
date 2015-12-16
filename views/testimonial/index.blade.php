<div class="container">
	<section class="blog">
		<div class="row">
			<header class="span12 prime"><h3>{{$nama}}</h3></header>
		</div>

		<div class="wrap">
			<div class="row-fluid">
				<div class="span8 list">
					@foreach(list_testimonial() as $key=>$value)
					<article>
						<a href="#"><h4>{{$value->nama}}</h4></a>
						<p><small class="date"><i class="icon-calendar"></i> {{date("d M Y", strtotime($value->updated_at))}}</small> </p>
						{{substr($value->isi,0,250)}}
					</article>
					@endforeach

					<div class="pagination pagination-centered">{{list_testimonial()->links()}}</div>
				</div>

				<div class="span4 list">
					<div class="tab-pane active" id="login">
						<form class="form-horizontal" action="{{url('testimoni')}}" method="post">
							<div class="control-group">
								<label class="title-testi control-label" for="inputEmail"><b>Buat Testimonial</b></label><br>
							</div>

							<div class="control-group">
								<label class="title-testi control-label" for="inputEmail"> Nama</label>
								<div class="controls" id="input-testi">
									<input type="text" name="nama" id="inputEmail" required>
								</div>
							</div>

							<div class="control-group">
								<label class="title-testi control-label" for="inputPassword">Testimonial</label>
								<div class="controls" id="input-testi">
									<textarea name="testimonial" id="inputPassword" required></textarea>
								</div>
							</div>

							<div class="control-group">
								<div class="controls" id="input-testi">
									<button type="submit" class="btn theme">Kirim Testimonial</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>