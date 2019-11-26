<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="This is social network html5 template available in themeforest......" />
  <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
  <meta name="robots" content="index, follow" />
  <title>{{$title}}</title>

  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend/css/ionicons.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" />

  <!--Google Font-->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
  <style>
    .has-error .form-control {
      border-color: #a94442 !important;
    }
  </style>
</head>
<body>
  @include('layouts.header')
  <div id="lp-register">
   <div class="container wrapper">
    <div class="row">
     <div class="col-sm-5">
      <div class="intro-texts">
       <h1 class="text-white">Cloud Review</h1>
       <p>Cloud Review adalah media sosial untuk membagikan, melihat dan mereview film terbaru yang tampil di bioskop. Kalian bisa berteman dengan siapapun dan dimanapun . <br /> <br />Tunggu apa lagi? Coba pakai sekarang !!!</p>
     </div>
   </div>
   <div class="col-sm-6 col-sm-offset-1">
    <div class="reg-form-container"> 

      <div class="reg-options">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#register" data-toggle="tab">Daftar</a>
          </li>
          <li>
            <a href="#login" data-toggle="tab">Masuk</a>
          </li>
        </ul><!--Tabs End-->
      </div>
      <div class="tab-content">
        <div class="tab-pane active" id="register">
          <h3>Daftar Sekarang !!!</h3>
          <p class="text-muted">Jadilah yang pertama dan gabung sekarang juga.</p>

          <!--Register Form-->
          <form name="registration_form" id='registration_form' class="form-inline" action="{{ route('daftar') }}" method="post">
            @csrf
            <div class="row">
              <div class="form-group col-xs-12 @error('nama') has-error @enderror">
                <label for="nama" class="sr-only">Nama</label>
                <input required="required" value="{{ old('nama') }}" id="nama" class="form-control input-group-lg" type="text" name="nama" title="Masukkan nama" placeholder="Nama"/>
                @error('nama')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group col-xs-12 @error('kota_lahir') has-error @enderror">
                <label for="kota_lahir" class="sr-only">Kota Lahir</label>
                <input required="required" value="{{ old('kota_lahir') }}" id="kota_lahir" class="form-control input-group-lg" type="text" name="kota_lahir" title="Masukkan Kota Lahir" placeholder="Kota Lahir"/>
                @error('kota_lahir')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group col-xs-12 @error('tanggal_lahir') has-error @enderror">
                <label for="tanggal_lahir" class="sr-only">Tanggal Lahir</label>
                <input required="required" value="{{ old('tanggal_lahir') }}" id="tanggal_lahir" class="form-control input-group-lg" type="date" name="tanggal_lahir" title="Masukkan Tanggal Lahir" placeholder="Tanggal Lahir"/>
                @error('tanggal_lahir')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group col-xs-12 @error('alamat') has-error @enderror">
                <label for="alamat" class="sr-only">Alamat</label>
                <textarea required="required" id="alamat" class="form-control input-group-lg" name="alamat" title="Masukkan Alamat" placeholder="Alamat">{{ old('alamat') }}</textarea>
                @error('alamat')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-12 @error('email') has-error @enderror">
                <label for="email" class="sr-only">Email</label>
                <input required="required" value="{{ old('email') }}" id="email" class="form-control input-group-lg" type="email" name="email" title="Masukkan Email" placeholder="Your Email"/>
                @error('email')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-12 @error('password') has-error @enderror">
                <label for="password" class="sr-only">Password</label>
                <input required="required" value="{{ old('password') }}" id="password" class="form-control input-group-lg" type="password" name="password" title="Masukkan password" placeholder="Password"/>
                @error('password')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <p><a href="#" onclick="tampilkanMasuk(event)">Sudah punya akun?</a></p>
            <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
          </form>
        </div>

        <!--Login-->
        <div class="tab-pane" id="login">
          <h3>Masuk</h3>
          <p class="text-muted">Masuk ke akun anda</p>
          <form name="Login_form" id='Login_form' action="{{ route('masuk') }}" method="post">
            @csrf
            <div class="row">
              <div class="form-group col-xs-12 @error('email') has-error @enderror">
                <label for="my-email" class="sr-only">Email</label>
                <input required="required" value="{{ old('email') }}" id="my-email" class="form-control input-group-lg" type="email" name="email" title="Masukkan Email" placeholder="Email"/>
                @error('email')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-12 @error('password') has-error @enderror">
                <label for="my-password" class="sr-only">Password</label>
                <input required="required" value="{{ old('password') }}" id="my-password" class="form-control input-group-lg" type="password" name="password" title="Masukkan password" placeholder="Password"/>
                @error('password')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
            </div>
            {{-- <p><a href="#">Forgot Password?</a></p> --}}
            <button type="submit" class="btn btn-primary">Masuk Sekarang</button>
          </form><!--Login Form Ends--> 
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6 col-sm-offset-6">

    <!--Social Icons-->
    <ul class="list-inline social-icons">
      <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
      <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
      <li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
      <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
      <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
    </ul>
  </div>
</div>
</div>
</div>

<!--preloader-->
<div id="spinner-wrapper">
  <div class="spinner"></div>
</div>

<script src="{{ asset('frontend/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.appear.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.incremental-counter.js') }}"></script>
<script src="{{ asset('frontend/js/script.js') }}"></script>
<script>
  function tampilkanMasuk(){
    $('[href="#login"]').trigger('click');
  }
  @if($is_masuk)
  tampilkanMasuk();
  @endif
</script>

</body>
</html>
