<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="This is social network html5 template available in themeforest......" />
  <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
  <meta name="robots" content="index, follow" />
  <title>Film</title>
  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend/css/ionicons.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend/css/emoji.c') }}ss">

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
          @if($data->count() > 0)
          <div class="media">
            <div class="row">
              @foreach ($data as $f)
              <div class="grid-item col-md-6 col-sm-6">
                <div class="media-grid">
                  <div class="img-wrapper" data-toggle="modal" data-target=".modal-{{$loop->iteration}}">
                    <img src="{{ $f->gambar_url }}" alt="{{ $f->nama }}" class="img-responsive post-image" />
                  </div>
                  <div class="media-info">
                    <div class="reaction">
                      @include('layouts.tombol-like', ['f'=>$f])
                    </div>
                    <div class="user-info">
                      <h6 class="text-center">
                        <a href="{{ route('film-detail', [$f->id]) }}" class="profile-link">{{ $f->nama }}</a>
                      </h6>
                    </div>
                  </div>

                  <!--Popup-->
                  <div class="modal fade modal-{{$loop->iteration}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="post-content">
                          <img src="{{ $f->gambar_url }}" alt="{{ $f->nama }}" alt="post-image" class="img-responsive post-image" />
                          <div class="post-container">
                            <img src="{{ asset(\Storage::url($f->gambar)) }}" alt="{{ $f->nama }}" class="profile-photo-md pull-left" />
                            <div class="post-detail">
                              <div class="user-info">
                                <h5><a href="timeline.html" class="profile-link">Administrator</a></h5>
                                <p class="text-muted">{{$f->created_at}}</p>
                              </div>
                              <div class="reaction">
                                <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
                                <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                              </div>
                              <div class="line-divider"></div>
                              <div class="post-text">
                                <p>{{$f->deskripsi}}</p>
                              </div>
                              <div class="line-divider"></div>
                              <div class="post-comment">
                                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                                <p><a href="timeline.html" class="profile-link">Diana </a><i class="em em-laughing"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                              </div>
                              <div class="post-comment">
                                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                                <p><a href="timeline.html" class="profile-link">John</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                              </div>
                              <div class="post-comment">
                                <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                                <input type="text" class="form-control" placeholder="Post a comment">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div><!--Popup End-->

                </div>
              </div>
              @endforeach
              <div class="col-md-12">
                {{$data->links()}}
              </div>
            </div>
          </div>
          @else
          <div class="alert alert-danger">
            Tidak ada film
          </div>
          @endif
        </div>

        @include('layouts.menu_kanan')
      </div>
    </div>
  </div>
  @include('layouts.footer')
  <script src="{{ asset('frontend/js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/js/masonry.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.sticky-kit.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('frontend/js/script.js') }}"></script>

</body>
</html>
