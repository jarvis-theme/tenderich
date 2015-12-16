<div class="container">
	<section class="order">
		<div class="row standard">
			<header class="span12 prime">
				<h3>Konfirmasi Order</h3>
			</header>
		</div>
		<div class="row standard">
			<header class="span12 prime">
			@if($checkouttype==2)
				<p>Silakan Hubungi Pihak Toko untuk Mengkonfirmasi Order Anda</p>
			@else
				<p>Silakan masukkan kode order yang mau anda cari!</p>
				@if($checkouttype==1)
                {{-- */ $form_url = 'konfirmasiorder' /* --}}
                @else
                {{-- */ $form_url = 'konfirmasipreorder' /* --}}
                @endif
             	{{Form::open(array('url'=>$form_url,'method'=>'post','class'=>'form-inline'))}}
					<input type="text" class="input-large" placeholder="Kode Order" name='kodeorder' required>
				  	<button type="submit" class="btn theme"><i class="icon-check"></i> Cari Kode</button>
				{{Form::close()}}
			@endif
			</header>
		</div>
	</section>
</div>