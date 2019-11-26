<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is social network html5 template available in themeforest......" />
    <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
    <meta name="robots" content="index, follow" />
    <title>{{ $d->nama }}</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/ionicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/emoji.css') }}">

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
</head>
<body>

    @include('layouts.header')

    <div id="page-contents">
        <div class="container">
            <div class="row">
                @include('layouts.menu_kiri')

                <div class="col-md-7">
                    <div class="post-content">
                        <div class="post-date hidden-xs hidden-sm">
                            <center>
                                <h3>{{ $d->nama }}</h3>
                            </center>
                        </div>
                        <img src="{{ $d->gambar_url }}" alt="post-image" class="img-responsive post-image" />
                        <div class="post-container">
                            <img src="http://placehold.it/300x300" alt="user" class="profile-photo-md pull-left" />
                            <div class="post-detail">
                                <div class="user-info">
                                    <h5>
                                        <a href="#" class="profile-link">Administrator</a> 
                                        <p class="text-muted">{{ $d->created_at }}</p>
                                    </div>
                                    <div class="reaction">
                                        <a class="btn text-green"><i class="icon ion-thumbsup"></i> {{ $d->yangsuka_count }}</a>
                                        <a class="btn text-red"><i class="fa fa-thumbs-down"></i> {{ $d->yangtidaksuka_count }}</a>
                                    </div>
                                    <div class="line-divider"></div>
                                    <div class="post-text">
                                        <p>{{ $d->deskripsi }}</p>
                                    </div>
                                    <div class="line-divider"></div>
                                    @foreach ($d->komentar as $komentar)
                                    <div class="post-comment">
                                        <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                                        <p>
                                            <a href="#" class="profile-link">{{ $komentar->member->nama }}</a>
                                            {{ $komentar->isi }}
                                        </p>
                                    </div>
                                    @endforeach
                                    <div class="post-comment">
                                        @if(Auth::guard('member')->check())
                                        <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                                        <form action="{{ route('kirim-komentar', [$d->id]) }}"  method="post">
                                            @csrf
                                            <input type="text" name="komentar" class="form-control" placeholder="Kirim komentar">
                                            @error('komentar')
                                            <span class="help-block">{{$message}}</span>
                                            @enderror
                                        </form>
                                        @else
                                        <a href="{{ route('masuk') }}" class="btn btn-primary btn-block">Masuk dulu baru komentar</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('layouts.menu_kanan')
                </div>
            </div>
        </div>
        @include('layouts.footer')
        {{-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&callback=initMap"></script> --}}
        <script src="{{ asset('frontend/js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.sticky-kit.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('frontend/js/script.js') }}"></script>
    </body>
    </html>
