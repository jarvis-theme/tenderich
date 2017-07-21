<div class="container">
	<section class="order">
		<div class="row standard">
			<header class="span12 prime"><h3>Registrasi</h3></header>
		</div>

		<div class="row cart">
			<div class="span12">
				{{Form::open(array('url'=>'member','method'=>'post','class'=>'form-horizontal'))}}
					<div class="control-group">
						<label class="control-label"> Nama*</label>
						<div class="controls">
							<input class="span6" type="text" name="nama" value="{{Input::old('nama')}}" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> Email*</label>
						<div class="controls">
							<input type="email" class="span6" name="email" value='{{Input::old("email")}}' required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> Password*</label>
						<div class="controls">
							<input class="span6" type="password" name="password" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> Konfirmasi Password*</label>
						<div class="controls">
							<input class="span6" type="password" name="password_confirmation" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> Alamat*</label>
						<div class="controls">
							<textarea class="span6" name="alamat" rows="3" required>{{Input::old("alamat")}}</textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> Negara*</label>
						<div class="controls">
							<select class="span3" name="negara" id="negara" data-rel="chosen" required>
								<option selected>-- Pilih Negara --</option>
								@foreach ($negara as $key=>$item)
									@if(strtolower($item)=='indonesia')
									<option value="1" {{Input::old('negara')==1 ? 'selected' : ''}}>{{$item}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> Provinsi*</label>
						<div class="controls" id="provinsiPlace">
						  	{{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi, Input::old("provinsi"),array('required', 'id'=>"provinsi", 'class'=>'span3', 'data-rel'=>"chosen"))}}
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> Kota*</label>
						<div class="controls" id="kotaPlace">
							{{Form::select('kota',array('' => '-- Pilih Kota --') + $kota, Input::old("kota"), array('required'=>'','id'=>'kota','class'=>'span3'))}}
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> Kode Pos*</label>
						<div class="controls">
							<input class="span3" type="text" name='kodepos' value='{{Input::old("kodepos")}}' required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> Telepon / HP*</label>
						<div class="controls">
							<input class="span3" type="text" name='telp' value='{{Input::old("telp")}}' required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"> Captcha*</label>
						<div class="controls">
							{{ HTML::image(Captcha::img(), 'Captcha image') }}
							{{Form::text('captcha','',array('class'=>'span2'))}}
						</div>
					</div>

					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls">
							<input type="checkbox" name="readme" value="1" checked> Saya telah membaca dan menyetujui <a href="{{url('service')}}" target="_blank">Persyaratan Member</a>
						</div>
					</div>			

					<div class="control-group">
						<div class="controls">
							<button type="submit" class="btn theme"><i class="icon-check"></i> Daftar</button>
						</div>
					</div>
				{{Form::close()}}
			</div>
		</div>
	</section>
</div>