<div class="container">
	<section class="product">
		<div class="row">
			<header class="span12 prime"><h3>Hasil Pencarian</h3></header>
		</div>

		<div class="row">
			<div class="row-fluid">
				<div id="result-image">
					@if($jumlahCari!=0)
						@foreach($hasilpro as $myproduk)
						<article class="align-justify">
							<div class="span1">
								<a href="{{product_url($myproduk)}}">
									<img src="{{product_image_url($myproduk->gambar1,'thumb')}}" alt="{{$myproduk->nama}}" id="gambar" title="{{$myproduk->nama}}" />
								</a>
							</div>

							<div id="desc">
								<a href="{{product_url($myproduk)}}">
									<h4 class="pull-left">{{short_description($myproduk->nama, 70)}}</h4>
								</a><br><br>
								<span class="align-left">{{short_description($myproduk->deskripsi,100)}}</span>
							</div>
						</article>
						@endforeach
						@foreach($hasilhal as $myhal)
						<article class="align-justify">
							<div class="result">
								<a href="{{URL::to('halaman/'.$myhal->slug)}}">
									<h4 class="pull-left">{{$myhal->judul}}</h4>
								</a><br><br>
								<span class="align-left">{{short_description($myhal->isi,100)}}</span>
							</div>
						</article>
						@endforeach
						@foreach($hasilblog as $myblog)
						<article class="align-justify">
							<div class="result">
								<a href="{{blog_url($myblog)}}">
									<h4 class="pull-left">{{$myblog->judul}}</h4>
								</a><br><br>
								<span class="align-left">{{short_description($myblog->isi,100)}}</span>
							</div>
						</article>
						@endforeach
					@else
						<article id="noresult"><i>Hasil pencarian tidak ditemukan</i></article>
					@endif
				</div>
			</div>
		</div>
	</section>
</div>