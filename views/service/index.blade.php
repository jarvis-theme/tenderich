<div class="container">
	<section class="page">
		<div class="row">
			<header class="span12 prime"><h3>Layanan Pelanggan</h3></header>
		</div>

		<div class="wrap">
			<div class="row-fluid">
				<div class="span12">
					<h4 class="blue">Kebijakan Layanan</h4>
					{{$service->tos}}
					<hr>
					
					<h4 class="blue">Kebijakan Pengembalian</h4>
					{{$service->refund}}
					<hr>

					<h4 class="blue">Kebijakan Privasi</h4>
					{{$service->privacy}}
				</div>
			</div>
		</div>
	</section>
</div>