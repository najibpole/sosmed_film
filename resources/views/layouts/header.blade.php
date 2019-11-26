<header id="header">
  <nav class="navbar navbar-default navbar-fixed-top menu">
    <div class="container">

      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="{{ asset('frontend/images/logo1.png') }}" alt="logo1" />
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right main-menu">
          <li class="dropdown">
            <a href="{{ url('/') }}">Beranda</a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kategori Film 
              <span><img src="{{ asset('frontend/images/down-arrow.png') }}" alt="Kategori Film" /></span>
            </a>
            <ul class="dropdown-menu newsfeed-home">
              @foreach (\App\KategoriFilm::orderBy('nama')->get() as $k)
              <li><a href="{{ route('film-kategori', [$k->id]) }}">{{ $k->nama }}</a></li>
              @endforeach
            </ul>
          </li>
          <li class="dropdown">
            <a href="{{ route('list-film') }}">Film</a>
          </li>
          @if(Auth::guard('member')->check())
          @php
          $_user = Auth::guard('member')->user();
          @endphp
          <li class="dropdown">
            <a href="#">{{ $_user->nama }}</a>
          </li>
          <li class="dropdown">
            <a href="{{ route('keluar') }}">Keluar</a>
          </li>
          @else
          <li class="dropdown">
            <a href="{{ route('masuk') }}">Masuk</a>
          </li>
          <li class="dropdown">
            <a href="{{ route('daftar') }}">Daftar</a>
          </li>
          @endif
        </ul>
        <form class="navbar-form navbar-right hidden-sm" action="{{ route('cari-film') }}">
          <div class="form-group">
            <i class="icon ion-android-search"></i>
            <input name="keyword" type="text" class="form-control" placeholder="Cari film">
          </div>
        </form>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav>
</header>