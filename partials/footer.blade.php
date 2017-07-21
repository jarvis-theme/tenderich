<footer>
	<div class="container">
		<section class="row foot">
			@foreach(all_menu() as $key=>$group)
            @if($key!=0)
			<article class="span3 links">
					<strong>{{$group->nama}}</strong>
					<ul>
						@foreach($group->link as $key=>$link)
						<li><a href="{{menu_url($link)}}">{{$link->nama}}</a></li>
						@endforeach
					</ul>
			</article>
			@endif
			@endforeach

			<article class="span3 blogs">
				<strong>Posting Terbaru</strong>
				<ul>
					@foreach (list_blog() as $items)
						<li><a href="{{blog_url($items)}}">{{$items->judul}}</a><br /><small>diposting pada {{waktuTgl($items->created_at)}}</small></li>
					@endforeach
				</ul>
			</article>
			<article class="span3">
				<strong>Newsletter</strong>
				<div id="mc_embed_signup">
					<form action="{{@$mailing->action}}" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form newsletter" class="validate form-inline" target="_blank" novalidate>
                    	<input type="email" placeholder="Email anda" name="EMAIL" class="input-medium required email" id="newsletter mce-EMAIL" required {{@$mailing->action==''?'disabled style="cursor:default"':''}}>
						<button type="submit" class="btn" {{ @$mailing->action==''?'disabled="disabled"':'' }}><i class="icon-direction"></i></button>
					</form>
				</div>
				@if($kontak->alamat!='')
					<address class="row-fluid">
						<div class="pull-left clabel"><i class="icon-location"></i></div>
						<div class="pull-left cdata">{{$kontak->alamat}}</div>
					</address>
					<address class="row-fluid">
						<div class="pull-left clabel"><i class="icon-phone"></i></div>
						<div class="pull-left cdata">{{$kontak->telepon}}</div>
					</address>
					<address class="row-fluid">
						<div class="pull-left clabel"><i class="icon-mail"></i></div>
						<div class="pull-left cdata"><a href="mailto:{{$kontak->email}}" target="_top">{{$kontak->email}}</a></div>
					</address>
					@if($kontak->bb!='')
					<address class="row-fluid">
						<div class="pull-left clabel"><img src="{{url('img/bbm.png')}}"></div>
						<div class="pull-left cdata">{{$kontak->bb}}</div>
					</address>
					@endif
					@if($kontak->ym)
					<address class="row-fluid">
						<div class="pull-left clabel"></div>
						<div class="pull-left cdata">{{ymyahoo($kontak->ym)}}</div>
					</address>
					@endif
				@else
					<div></div>
				@endif
			</article>
		</section>

	</div>
	<section class="row-fluid doubleline">
		<div class="container">
			<div class="span12 center">
				@foreach(list_banks() as $value)
					<img src="{{bank_logo($value)}}" alt="{{$value->bankdefault->nama}}" title="{{$value->bankdefault->nama}}" />
				@endforeach
				@foreach(list_payments() as $pay)
                    @if($pay->nama == 'paypal' && $pay->aktif == 1)
                    <img src="{{url('img/bank/paypal.png')}}" alt="paypal" title="Paypal" />
                    @endif
                    @if($pay->nama == 'ipaymu' && $pay->aktif == 1)
                    <img src="{{url('img/bank/ipaymu.jpg')}}" alt="ipaymu" title="Ipaymu" />
                    @endif
                    @if($pay->nama == 'bitcoin' && $pay->aktif == 1)
                    <img src="{{url('img/bitcoin.png')}}" alt="bitcoin" title="Bitcoin" />
                    @endif
                @endforeach
                @if(count(list_dokus()) > 0 && list_dokus()->status == 1)
                <img src="{{url('img/bank/doku.jpg')}}" alt="doku myshortcart" title="Doku" />
                @endif
			</div>
		</div>
	</section>

	<section class="row-fluid social">
		<div class="container">
			<div class="copyright">&copy; {{date('Y')}} {{ Theme::place('title') }}. Powered by <a href="http://jarvis-store.com" target="_blank" id="site">Jarvis Store</a> </div>

			<div class="social-media">
				<ul>
					@if($kontak->fb)
						<li><a target="_blank" href="{{url($kontak->fb)}}" title="Facebook"><i class="icon-facebook"></i></a></li>
					@endif
					@if($kontak->tw)
						<li><a target="_blank" href="{{url($kontak->tw)}}" title="Twitter"><i class="icon-twitter"></i></a></li>
					@endif
					@if($kontak->gp)
						<li><a target="_blank" href="{{url($kontak->gp)}}" title="Google+"><i class="icon-gplus"></i></a></li>
					@endif
					@if($kontak->pt)
						<li><a target="_blank" href="{{url($kontak->pt)}}" title="Pinterest"><i class="icon-pinterest"></i></a></li>
					@endif
					@if($kontak->tl)
						<li><a target="_blank" href="{{url($kontak->tl)}}" title="Tumblr"><i class="icon-tumblr"></i></a></li>
					@endif
					@if($kontak->ig)
						<li><a target="_blank" href="{{url($kontak->ig)}}" title="Instagram"><i class="icon-instagrem"></i></a></li>
					@endif
				</ul>
			</div>
		</div>
	</section>
</footer>
{{pluginPowerup()}}