<div class="container">
    <section class="blog">
        <div class="row">
            <header class="span12 prime">
                <h3>{{$detailblog->judul}}</h3>
                <p>
                    <span class="date"><i class="icon-calendar"></i> {{ waktuTgl($detailblog->created_at) }}
                    @if(!empty($detailblog->kategori->nama))
                    <i class="icon-folder"></i><a href="{{blog_category_url(@$detailblog->kategori)}}"> {{@$detailblog->kategori->nama}}</a>
                    @endif
                    </span>
                </p>
            </header>
        </div>

        <div class="wrap">
            <div class="row-fluid post">
                <div class="span8">
                    <article>
                        <p>{{$detailblog->isi}}</p>
                    </article>
                    <hr>
                    <div id="share"></div>
                    <br>
                    <hr>

                    <div class="navigate comments clearfix">
                        @if(isset($prev))
                        <div class="pull-left"><a href="{{$prev->slug}}">&larr; Sebelumnya</a></div>
                        @else
                        <div class="pull-right"></div>
                        @endif

                        @if(isset($next))
                        <div class="pull-right"><a href="{{$next->slug}}">Selanjutnya &rarr;</a></div>
                        @else
                        <div class="pull-right"></div>
                        @endif
                    </div>

                    <div>
                        {{$fbscript}}
                        {{fbcommentbox(blog_url($detailblog), '100%', '5', 'light')}}
                    </div>
                    <hr>
                </div>
                <div class="span4 sidebar">
                    <aside>
                        <p class="title"><i class="icon-rss"></i> <strong>Artikel Terbaru</strong></p>
                        <ul>
                            @foreach(list_blog(8) as $recent)
                            <li><a href="{{blog_url($recent)}}">{{$recent->judul}}</a><br /><small>diposting tanggal {{waktuTgl($recent->created_at)}}</small></li>
                            @endforeach
                        </ul>
                    </aside>
                    @if($detailblog->tags != "")
                    <aside class="clearfix tags">
                        <p class="title"><i class="icon-tag"></i> <strong>Tags</strong></p>
                        {{ getTags('<span class="underline"></span>',$detailblog->tags)}}
                    </aside>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>