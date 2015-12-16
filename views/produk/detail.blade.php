    <section class="single">
        <div class="row">
            <header class="span12 prime"><h3>{{$produk->nama}}</h3></header>
        </div>

        <div class="row">
            <div class="span5">
                <div class="wrap">
                    <div id="flexslider-product" class="flexslider">
                        <ul class="slides">
                        @if($produk->gambar1!='')   
                            <li><a href="{{product_image_url($produk->gambar1,'large')}}"> {{HTML::image(url(product_image_url($produk->gambar1,'medium')), $produk->nama)}}</a></li>
                        @endif
                        @if($produk->gambar2!='')   
                            <li><a href="{{product_image_url($produk->gambar2,'large')}}"> {{HTML::image(url(product_image_url($produk->gambar2,'medium')), $produk->nama)}}</a></li>
                        @endif
                        @if($produk->gambar3!='')               
                            <li><a href="{{product_image_url($produk->gambar3,'large')}}"> {{HTML::image(url(product_image_url($produk->gambar3,'medium')), $produk->nama)}}</a></li>
                        @endif
                        @if($produk->gambar4!='')               
                            <li><a href="{{product_image_url($produk->gambar4,'large')}}"> {{HTML::image(url(product_image_url($produk->gambar4,'medium')), $produk->nama)}}</a></li>
                        @endif  
                        </ul>     
                    </div>

                    <div id="flexcarousel-product" class="flexslider visible-desktop">
                        <ul class="slides">
                        @if($produk->gambar1!='')               
                            <li>{{HTML::image(url(product_image_url($produk->gambar1,'thumb')), 'Produk 1')}}</li>
                        @endif
                        @if($produk->gambar2!='')               
                            <li>{{HTML::image(url(product_image_url($produk->gambar2,'thumb')), 'Produk 2')}}</li>
                        @endif
                        @if($produk->gambar3!='')               
                            <li>{{HTML::image(url(product_image_url($produk->gambar3,'thumb')), 'Produk 3')}}</li>
                        @endif
                        @if($produk->gambar4!='')               
                            <li>{{HTML::image(url(product_image_url($produk->gambar4,'thumb')), 'Produk 4')}}</li>
                        @endif  
                        </ul>
                    </div>
                </div>
            </div>

            <div class="span7">
                <div class="details wrapper well">
                    @if($setting->checkoutType=='1')    
                        <p class="price"><i class="icon-tagX"></i> {{ price($produk->hargaJual) }} 
                            @if($produk->hargaCoret != 0)   
                            <small id="discount"><span>{{ price($produk->hargaCoret) }}</span></small>
                            @endif  
                        </p>

                        <form action="#" id='addorder'> 
                            @if($opsiproduk->count()>0)                                 
                            <select name="opsiproduk">
                                <option value="">-- Pilih Opsi --</option>
                                @foreach ($opsiproduk as $key => $opsi)                                 
                                <option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >
                                    {{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{price($opsi->harga)}}                          
                                </option>
                                @endforeach  
                            </select>
                            @endif              

                            <div class="clearfix">
                                <div class="pull-left">
                                    <input type="text" class="span1" name='qty' value="1">
                                </div>
                                <div class="pull-left">&nbsp;&nbsp;<input type='submit' class="btn theme" value='Tambah ke keranjang'></div>
                            </div>
                        </form>

                    @elseif($setting->checkoutType=='2')    
                        <form action="#" id='addorder'>     
                            @if($opsiproduk->count()>0) 
                                <select name="opsiproduk">
                                    <option value="">-- Pilih Opsi --</option>
                                    @foreach ($opsiproduk as $key => $opsi) 
                                    <option value="{{$opsi->id}}">
                                        {{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}}                          
                                    </option>
                                    @endforeach 
                                </select>
                            @endif  

                            <div class="clearfix">
                                <div class="pull-left">
                                    <input type="text" class="span1" name='qty' value="1">
                                </div>
                                <div class="pull-left">&nbsp;&nbsp;<input type='submit' class="btn theme" value='Tambah ke keranjang'></div>
                            </div>
                        </form>

                    @elseif($setting->checkoutType=='3')    
                        <p class="price"><i class="icon-tag"></i> {{ price($produk->hargaJual) }} 
                            @if($produk->hargaCoret != 0)   
                            <small id="discount"><span>{{ price($produk->hargaCoret) }}</span></small>
                            @endif  
                        </p>

                        @if(@$po)   
                            <br>
                            <div>
                                <p>
                                    Tanggal mulai pemesanan : {{waktuDbBalik($po->tanggalmulai)}}<br>
                                    @if($po->kuota=='0')
                                        Tanggal akhir pemesanan : {{waktuDbBalik($po->tanggalakhir)}}
                                    @elseif($po->tanggalakhir=='0000-00-00')
                                        Kuota minimum proses pre-order : {{$po->kuota}}
                                    @endif
                                    <br>
                                    DP : {{$po->dp}}    
                                </p>
                            </div>

                            @if((strtotime($po->tanggalmulai)<=strtotime(date('Y-m-d'))) && (($po->kuota!=0) || ($po->tanggalakhir!='0000-00-00' && strtotime($po->tanggalakhir)>=strtotime(date('Y-m-d'))) ) )     
                                <form action="#" id='addorder'>
                                
                                    @if($opsiproduk->count()>0) 
                                    <select name="opsiproduk">
                                        <option value="">-- Pilih Opsi --</option>
                                        @foreach ($opsiproduk as $key => $opsi) 
                                            <option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >
                                                {{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{price($opsi->harga)}}
                                            </option>
                                        @endforeach 
                                    </select>
                                    @endif  

                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <input type="text" class="span1" name='qty' value="1">
                                        </div>
                                        <div class="pull-left">&nbsp;&nbsp;<input type='submit' class="btn theme" value='Pre-order Item'></div>
                                    </div>
                                </form>
                            @else
                                <p>Belum memasuki periode pemesanan</p>
                            @endif
                        
                        @else
                            <p>Belum memasuki periode pemesanan</p>
                        @endif
                    @endif

                    <hr>
                    <div class="row-fluid">
                        <div class="span12 decidernote">Bingung memilih? tanyalah teman :)</div>
                        <div class="span12 decider">
                            <div id="twitter" data-url="{{Request::url();}}" data-text="{{$produk->nama}} | " data-title="Tweet"></div>
                            <div id="facebook" data-url="{{Request::url();}}" data-text="{{$produk->nama}}" data-title="Like"></div>
                            <div id="googleplus" data-url="{{Request::url();}}" data-text="{{$produk->nama}}" data-title="+1"></div>
                            <div id="delicious" data-url="{{Request::url();}}" data-text="{{$produk->nama}}"></div>
                            <div id="stumbleupon" data-url="{{Request::url();}}" data-text="{{$produk->nama}}"></div>
                        </div>
                    </div>
                    <hr>

                    <div class="accordion" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#description">
                                    <i class="icon-layout theme"></i> Deskripsi
                                </a>
                            </div>

                            <div id="description" class="accordion-body collapse">
                                <div class="accordion-inner">{{$produk->deskripsi}}</div>
                            </div>
                        </div>  
                        <br><br>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#review">
                                    <i class="icon-layout theme"></i> Review Produk
                                </a>
                            </div>
                    
                            <div id="review-trustklik" id="review" class="accordion-body in collapse">
                                <div class="accordion-inner">
                                    {{pluginTrustklik()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(count(other_product($produk)) > 0)
            <div class="row">
                <div class="span12">
                    <div class="cross-wrapper">
                        <hr />
                        <header>Produk yang mungkin anda suka</header>
                        <section class="row-fluid cross-product">
                        @foreach(other_product($produk) as $myproduk)   
                            <article class="span3" id="related-produk">
                                @if(is_outstok($myproduk))
                                {{is_outstok($myproduk)}}
                                @elseif(is_terlaris($myproduk))
                                {{is_terlaris($myproduk)}}
                                @elseif(is_produkbaru($myproduk))
                                {{is_produkbaru($myproduk)}}
                                @endif

                                <div id="related-image" class="view view-thumb">
                                    {{HTML::image(url(product_image_url($myproduk->gambar1,'medium')), $myproduk->nama)}}
                                    <div class="mask">
                                        <h2>{{price($myproduk->hargaJual)}}</h2>
                                        <p>{{short_description($myproduk->deskripsi,100)}}</p>
                                        <a href="{{product_url($myproduk)}}" class="info">Lihat</a> 
                                    </div>
                                </div>

                                <p class="product-title"><a href="{{product_url($myproduk)}}">{{$myproduk->nama}}</a></p>
                            </article>
                        @endforeach 
                        </section>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>