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
                    <div class="friend-list">
                        <div class="row">
                            @forelse ($data as $p)
                            <div class="col-md-6 col-sm-6">
                                <div class="friend-card">
                                    <img src="http://placehold.it/1030x360" alt="profile-cover" class="img-responsive cover" />
                                    <div class="card-info">
                                        <img src="http://placehold.it/300x300" alt="user" class="profile-photo-lg" />
                                        <div class="friend-info">
                                            <a href="{{ route('batal-pertemanan', [$p->teman_id]) }}" class="pull-right text-green">Batalkan</a>
                                            <h5><a href="#" class="profile-link">{{ $p->teman->nama }}</a></h5>
                                            <p>{{ $p->teman->kota_lahir }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-md-12">
                                <div class="alert alert-danger">Tidak ada meminta pertemanan</div>
                            </div>
                            @endforelse
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
