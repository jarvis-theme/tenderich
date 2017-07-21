<div class="container">
    <section class="login">
        <div class="row standard">
            <header class="span12 prime"><h3>Akun</h3></header>
        </div>              

        <div class="wrap">
            <div class="row-fluid">
                <div class="span6">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#forgot"><i class="icon-help"></i> Lupa Password</a></li>
                        <li><a href="#login"><i class="icon-lock"></i> Login</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane" id="login">
                            <form class="form-horizontal" action="{{url('member/login')}}" method="post">
                                <div class="control-group">
                                    <label class="control-label"> Email</label>
                                    <div class="controls">
                                        <input type="email" name="email" required>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Password</label>
                                    <div class="controls">
                                        <input type="password" name="password" required>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn theme">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane active" id="forgot">
                            {{Form::open(array('url' => 'member/recovery/'.$id.'/'.$code, 'class' => 'form-horizontal'))}}
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password Baru</label>
                                    <div class="controls">
                                        <input type="password" name="password" id="inputPassword" placeholder="password baru" required>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label id="confirm-pass" class="control-label" for="inputPassword">Ulangi Password</label>
                                    <div class="controls">
                                        <input type="password" name="password_confirmation" id="inputPassword" placeholder="password baru" required>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn theme">Reset Password</button>
                                    </div>
                                </div>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>

                <div class="span6">
                    <p>Pelanggan Baru</p>
                    <hr>
                    <p>Nikmati kemudahan dalam berbelanja di toko kami!</p>
                    <ul class="ul">
                        <li>Mudah dan cepat dalam proses pembayaran.</li>
                        <li>Dapat mengetahui status pesanan anda</li>
                    </ul>
                    <a href="{{url('member/create')}}" class="theme">Daftar Sekarang →</a>
                </div>
            </div>
        </div>
    </section>
</div>