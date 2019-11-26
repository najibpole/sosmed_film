<div class="header">
    <div class="pull-left">
        <div class="logo">
            <a href="index.html">
                <img id="logoImg" src="{{ asset('assets/logo/logo1.png') }}" data-logo_big="{{ asset('assets/logo/logo1.png') }}" data-logo_small="{{ asset('assets/logo/logoSmall1.png') }}" alt="Nixon" />
            </a>
        </div>
        <div class="hamburger sidebar-toggle">
            <span class="ti-menu"></span>
        </div>
    </div>
    <div class="pull-right p-r-15">
        <ul>
            <li class="header-icon dib">
                <img class="avatar-img" src="assets/images/avatar/1.jpg" alt="" /> 
                @php
                    $_user = Auth::user();
                @endphp
                <span class="user-avatar">{{ $_user->nama }} <i class="ti-angle-down f-s-10"></i></span>
                <div class="drop-down dropdown-profile">
                    <div class="dropdown-content-body">
                        <ul>
                            <li><a href="{{ route('profil') }}"><i class="ti-user"></i> <span>Profil</span></a></li>
                            <li><a href="#" onclick="keluar(event)"><i class="ti-power-off"></i> <span>Keluar</span></a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>