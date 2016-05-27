<div class="container">
    <section class="order">
        <div class="row standard">
            <header class="span12 prime"><h3>Konfirmasi Order</h3></header>
        </div>

        <div class="row">
            <div class="span12">
                <div class=" form-horizontal" >
                    <table class="table table-bordered">
                        <tr>
                            <th align="center">Kode Order</th>
                            <th align="center">Tanggal Order</th>
                            <th align="center" class="hidden-phone">Order</th>
                            <th align="center" class="hidden-phone">Jumlah</th>
                            <th align="center">Jumlah yg belum di bayar</th>
                            <th align="center">No Resi</th>
                            <th align="center">Status</th>
                        </tr>
                        <tr>
                            <td>{{$checkouttype==1 ? prefixOrder().$order->kodeOrder : prefixOrder().$order->kodePreorder}}</td>
                            <td>{{$checkouttype==1 ? waktu($order->tanggalOrder) : waktu($order->tanggalPreorder)}}</td>
                            <td class="hidden-phone">
                                <ul>
                                @if ($checkouttype==1)
                                    @foreach ($order->detailorder as $detail)
                                    <li>{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku['opsi1'].($detail->opsisku['opsi2'] != '' ? ' / '.$detail->opsisku['opsi2'] : '').($detail->opsisku['opsi3'] != '' ? ' / '.$detail->opsisku['opsi3'] : '').')':''}} - {{$detail->qty}}</li>
                                    @endforeach
                                @else
                                    {{$order->preorderdata->produk->nama}} 
                                    ({{$order->opsiSkuId==0 ? 'No Opsi' : $order->opsisku['opsi1'].($order->opsisku['opsi2'] != '' ? ' / '.$order->opsisku['opsi2'] : '').($order->opsisku['opsi3'] != '' ? ' / '.$order->opsisku['opsi3'] : '')}})
                                    - {{$order->jumlah}}
                                @endif
                                </ul>
                            </td>
                            <td class="hidden-phone">{{price($order->total)}}</td>
                            <td>
                                @if($checkouttype==1)
                                - {{price($order->total)}}
                                
                                @else
                                    @if($order->status < 2)
                                    - {{price($order->total)}}
                                    
                                    @elseif(($order->status > 1 && $order->status < 4) || $order->status==7)
                                    - {{price($order->total - $order->dp)}}

                                    @else
                                    0
                                    @endif
                                @endif
                            </td>
                            <td>{{$order->noResi}}</td>
                            <td>
                                @if($checkouttype==1)
                                    @if($order->status==0)
                                    <span class="label label-warning">Pending</span>
                                    @elseif($order->status==1)
                                    <span class="label label-important">Konfirmasi diterima</span>
                                    @elseif($order->status==2)
                                    <span class="label label-success">Pembayaran diterima</span>
                                    @elseif($order->status==3)
                                    <span class="label label-info">Terkirim</span>
                                    @elseif($order->status==4)
                                    <span class="label label-default">Batal</span>
                                    @endif
                                @else 
                                    @if($order->status==0)
                                    <span class="label label-warning">Pending</span>
                                    @elseif($order->status==1)
                                    <span class="label label-important">Konfirmasi DP diterima</span>
                                    @elseif($order->status==2)
                                    <span class="label label-info">DP terbayar</span>
                                    @elseif($order->status==3)
                                    <span class="label label-info">Menunggu pelunasan</span>
                                    @elseif($order->status==4)
                                    <span class="label label-success">Pembayaran lunas</span>
                                    @elseif($order->status==5)
                                    <span class="label label-info">Terkirim</span>
                                    @elseif($order->status==6)
                                    <span class="label label-default">Batal</span>
                                    @elseif($order->status==7)
                                    <span class="label label-info">Konfirmasi Pelunasan diterima</span>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    </table>

                    @if($paymentinfo!=null)
                        <h3><center>Paypal Payment Details</center></h3>
                        <hr>
                        <table class='table table-bordered'>
                            <tr><td>Payment Status</td><td>:</td><td>{{$paymentinfo['payment_status']}}</td></tr>
                            <tr><td>Payment Date</td><td>:</td><td>{{$paymentinfo['payment_date']}}</td></tr>
                            <tr><td>Address Name</td><td>:</td><td>{{$paymentinfo['address_name']}}</td></tr>
                            <tr><td>Payer Email</td><td>:</td><td>{{$paymentinfo['payer_email']}}</td></tr>
                            <tr><td>Item Name</td><td>:</td><td>{{$paymentinfo['item_name1']}}</td></tr>
                            <tr><td>Receiver Email</td><td>:</td><td>{{$paymentinfo['receiver_email']}}</td></tr>
                            <tr>
                                <td>Total Payment</td><td>:</td><td>{{$paymentinfo['payment_gross']}} {{$paymentinfo['mc_currency']}}</td>
                            </tr>
                        </table>
                        <p>Thanks you for your order.</p>
                    @endif      
 
                    <div class="well">
                        @if($order->jenisPembayaran == 1 && $order->status == 0)
                            <h3><center>{{trans('content.step5.confirm_btn')." ".trans('content.step3.transfer')}}</center></h3>
                            @if($checkouttype==1)
                            {{-- */ $form_url = 'konfirmasiorder/' /* --}}
                            @else
                            {{-- */ $form_url = 'konfirmasipreorder/' /* --}}
                            @endif

                            {{Form::open(array('url'=> $form_url.$order->id, 'method'=>'put', 'class'=> 'form-horizontal'))}}
                            <div class="control-group">
                                <label class="control-label" for="inputEmail"> Nama Pengirim</label>
                                <div class="controls">
                                    <input class="span6" type="text" name='nama' value='{{Input::old("nama")}}' required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail"> No Rekening</label>
                                <div class="controls">
                                    <input type="text" class="span6" name='noRekPengirim' value='{{Input::old("noRekPengirim")}}' required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail"> Rekening Tujuan</label>
                                <div class="controls">
                                    <select name='bank'>
                                        <option value=''>-- Pilih Bank Tujuan --</option>
                                        @foreach ($banktrans as $bank)
                                        <option value="{{$bank->id}}">{{$bank->bankdefault->nama}} - {{$bank->noRekening}} - A/n {{$bank->atasNama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail"> Jumlah</label>
                                <div class="controls">
                                    @if($checkouttype==1)
                                    <input class="span6" type="text" name='jumlah' value='{{$order->total}}' required>
                                    @else
                                        @if($order->status < 2)
                                        <input class="span6" type="text" name='jumlah' value='{{$order->dp}}' required>
                                        @elseif(($order->status > 1 && $order->status < 4) || $order->status==7)
                                        <input class="span6" type="text" name='jumlah' value='{{$order->total - $order->dp}}' required>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn theme"><i class="icon-check"></i> {{trans('content.step5.confirm_btn')}}</button>
                                </div>
                            </div>
                            {{Form::close()}}
                        @endif

                        @if($order->jenisPembayaran==2)
                            <center>
                                <h2><b>{{trans('content.step5.confirm_btn')}} Paypal</b></h2><hr>
                                <p>{{trans('content.step5.paypal')}}</p>
                            </center><br>
                            <center id="paypal">{{$paypalbutton}}</center>
                            <br>
                        @elseif($order->jenisPembayaran==4) 
                            @if(($checkouttype==1 && $order->status < 2) || ($checkouttype==3 && ($order->status!=6)))
                            <center>
                                <h2><b>{{trans('content.step5.confirm_btn')}} iPaymu</b></h2><hr>
                                <p>{{trans('content.step5.ipaymu')}}</p><br>
                                <a class="btn-pay" href="{{url('ipaymu/'.$order->id)}}" target="_blank">{{trans('content.step5.ipaymu_btn')}}</a>
                                <br>
                            </center>
                            @endif
                        @elseif($order->jenisPembayaran==5 && $order->status == 0)
                            <center>
                                <h2><b>{{trans('content.step5.confirm_btn')}} DOKU MyShortCart</b></h2><hr>
                                <p>{{trans('content.step5.doku')}}</p><br>
                                {{ $doku_button }}
                                <br>
                            </center>
                        @elseif($order->jenisPembayaran == 6 && $order->status == 0)
                            <center>
                                <h2><b>{{trans('content.step5.confirm_btn')}} Bitcoin</b></h2><hr>
                                <p>{{trans('content.step5.bitcoin')}}</p><br>
                                {{$bitcoinbutton}}
                                <br>
                            </center>
                        @elseif($order->jenisPembayaran == 8 && $order->status == 0)
                            <center>
                                <h2><b>{{trans('content.step5.confirm_btn')}} Veritrans</b></h2><hr>
                                <p>{{trans('content.step5.veritrans')}}</p><br>
                                <button class="btn-pay" onclick="location.href='{{ $veritrans_payment_url }}'">{{trans('content.step5.veritrans_btn')}}</button>
                                <br>
                            </center>
                        @endif
                    </div>                         
                </div>
            </div>                  
        </div>              
    </section>
</div>