<div class="container">
    <section class="login">
        <div class="row standard">
            <header class="span12 prime"><h3>Akun</h3></header>
        </div>

        <div class="wrap">
            <div class="row-fluid">
                <div class="span6">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#login"><i class="icon-lock"></i> Pelanggan lama</a></li>
                        <li><a href="#forgot"><i class="icon-help"></i> Lupa Password</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="login">
                            <form class="form-horizontal" action="{{url('member/login')}}" method="post">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail"> Email</label>
                                    <div class="controls">
                                        <input type="email" value="{{Input::old('email')}}" name="email" id="inputEmail" placeholder="Email" required>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password</label>
                                    <div class="controls">
                                        <input type="password" name="password" id="inputPassword" placeholder="Password" required>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls"><button type="submit" class="btn theme">Login</button></div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="forgot">
                            <form class="form-horizontal" action="{{url('member/forgetpassword')}}" method="post">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail"> Email</label>
                                    <div class="controls">
                                      <input type="email" id="inputEmail" placeholder="Email" name='recoveryEmail'>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn theme">Reset Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="span6">
                    <p id="title-register"><strong>Pelanggan Baru</strong></p>
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