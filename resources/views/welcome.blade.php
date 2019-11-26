<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is social network html5 template available in themeforest......" />
    <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
    <meta name="robots" content="index, follow" />
    <title>Sosmed</title>
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
                    @foreach ($filmTerbaru as $film)
                    <div class="post-content">
                        <img src="{{ $film->gambar_url }}" alt="{{ $film->nama }}" class="img-responsive post-image" />
                        <div class="post-container">
                            <img src="http://placehold.it/300x300" alt="user" class="profile-photo-md pull-left" />
                            <div class="post-detail">
                                <div class="user-info">
                                    <h5>
                                        <a href="{{ route('film-detail', [$film->id]) }}" class="profile-link">{{ $film->nama }}</a>
                                    </h5>
                                    <p class="text-muted">{{ $film->created_at }}</p>
                                </div>
                                <div class="reaction">
                                    @include('layouts.tombol-like', ['f'=>$film])
                                </div>
                                <div class="line-divider"></div>
                                <div class="post-text">
                                    <p>{{ $film->deskripsi }}</p>
                                </div>
                                <div class="line-divider"></div>
                                @foreach($film->komentar as $komentar)
                                <div class="post-comment">
                                    <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                                    <p>
                                        <a href="#" class="profile-link">{{ $komentar->member->nama }}</a>
                                        <i class="em em-laughing"></i> 
                                        {{ $komentar->isi }}
                                    </p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
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
