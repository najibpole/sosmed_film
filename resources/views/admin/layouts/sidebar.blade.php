<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <li @if($active == 'dashboard') class="active" @endif>
                    <a href="{{ route('dashboard') }}">
                        <i class="ti-home"></i> Dashboard
                    </a>
                </li>
                <li @if($active == 'kategori-film.index') class="active" @endif>
                    <a href="{{ route('kategori-film.index') }}">
                        <i class="fa fa-cube"></i> Kategori Film
                    </a>
                </li>
                <li @if($active == 'film.index') class="active" @endif>
                    <a href="{{ route('film.index') }}">
                        <i class="ti-control-play"></i> Film
                    </a>
                </li>
                <li @if($active == 'member.index') class="active" @endif>
                    <a href="{{ route('member.index') }}">
                        <i class="fa fa-users"></i> Member
                    </a>
                </li>
                <li @if($active == 'komentar.index') class="active" @endif>
                    <a href="{{ route('komentar.index') }}">
                        <i class="fa fa-comments"></i> Komentar
                    </a>
                </li>
                <li><a onclick="keluar(event)"><i class="ti-close"></i> Keluar</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->
<form action="{{ route('logout') }}" method="post" id="keluar-form">
    @csrf
</form>
<script>
    function keluar(e){
        e.preventDefault();
        document.getElementById('keluar-form').submit();
    }
</script>