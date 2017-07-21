<div class="container">
	<section class="product">
		<div class="row">
			<header class="span12 prime"><h3>{{$name}}</h3></header>
		</div>

		<div class="row">
			<div class="span3">
				<div class="sidebar">
					@if(count(list_category()) > 0)
					<section>
						<h5>Kategori</h5>
						<nav>
							<ul class="sidebarnav">
								{{generateKategori(list_category(),'<li>;</li>','<i class="icon-right-open"></i>',';',true)}}
							</ul>
						</nav>
					</section>
					@endif
					@if(count(best_seller()) > 0)
					<section class="hidden-phone">
						<h5>Best Seller</h5>
						@foreach (best_seller() as $item)
						<a href="{{product_url($item)}}">
							<article class="clearfix">
								<div class="thumb hidden-phone">
									{{HTML::image(url(product_image_url($item->gambar1,'thumb')),$item->nama)}}
								</div>
								<div class="info">
									{{short_description($item->nama, 32)}}<br>
									<span class="price theme">{{price($item->hargaJual)}}</span>
								</div>
							</article>
						</a>
						@endforeach	
					</section>
					@endif

					@if(count(vertical_banner()) > 0)
					<section class="hidden-phone">
						{{--*/ $i=0; /*--}}
						@foreach(vertical_banner() as $item) 
						<div class="sidebanner">
							<a href="{{url($item->url)}}">
								{{HTML::image(url(banner_image_url($item->gambar)), 'Info Promo '.$i++, array("onerror" => "this.src='//d3kamn3rg2loz7.cloudfront.net/img/no-image-product.png';"))}}
							</a>
						</div>
						@endforeach	
					</section>
					@endif
				</div>
			</div>

			<div class="span9">
				<div class="row-fluid">
					{{--*/ $j=0; /*--}}
					@foreach(horizontal_banner() as $item)
					<div id="horizontal-banner">
						<a href="{{url($item->url)}}">
							{{HTML::image(banner_image_url($item->gambar), 'Info Promo '.$j++)}} 
						</a>
					</div>
					@endforeach

					@if(count(list_product(null,@$category,@$collection)) > 0)
						<div class="tab-content sideline">
						@foreach(list_product(null,@$category,@$collection) as $myproduk)
							<article id="list-produk">
								@if(is_outstok($myproduk))
								<img src="//d3kamn3rg2loz7.cloudfront.net/assets/tenderich/img/stok-badge.png" class="outstok-badge">
								@elseif(is_terlaris($myproduk))
								<img src="//d3kamn3rg2loz7.cloudfront.net/assets/tenderich/img/terlaris-badge.png" class="best-badge">
								@elseif(is_produkbaru($myproduk))
								<img src="//d3kamn3rg2loz7.cloudfront.net/assets/tenderich/img/new-badge.png" class="new-badge">
								@endif
								<div class="view view-thumb">
									{{HTML::image(url(product_image_url($myproduk->gambar1,'medium')), $myproduk->nama, array('class'=>'img1'))}}
									<div class="mask">
										<h2>{{price($myproduk->hargaJual)}}</h2>
										<p>{{short_description($myproduk->deskripsi,100)}}</p>
										<a href="{{product_url($myproduk)}}" class="info">Lihat</a>
									</div>
								</div>
								<p class="product-title">
									<a href="{{product_url($myproduk)}}">{{short_description($myproduk->nama, 32)}}</a>
								</p>
							</article>
						@endforeach
						</div>
						{{list_product(null,@$category,@$collection)->links()}}
					@else
						<article class="text-center"><i>Produk tidak ditemukan</i></article>
					@endif
				</div>
			</div>
		</div>
	</section>
</div>