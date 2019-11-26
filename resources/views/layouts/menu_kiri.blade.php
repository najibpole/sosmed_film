<div class="col-md-3 static">

    @if(Auth::guard('member')->check())
    @php
    $_user = Auth::guard('member')->user();
    @endphp
    <div class="profile-card">
        <img src="http://placehold.it/300x300" alt="user" class="profile-photo" />
        <h5>
            <a href="#" class="text-white">{{ $_user->nama }}</a>
        </h5>
        <a href="#" class="text-white">
            @php
            $_totalTeman = \App\Pertemanan::where('status', 'terima')->where(function($q){
                $q->where('member_id', \Auth::guard('member')->id())
                ->orWhere('teman_id', \Auth::guard('member')->id());
            })->count();
            @endphp
            <i class="ion ion-android-person-add"></i> {{ $_totalTeman }} Teman
        </a>
    </div>
    @endif

    <ul class="nav-news-feed">
        <li>
            <i class="icon ion-ios-people"></i>
            <div>
                <a href="{{ route('meminta-pertemanan') }}">Meminta Pertemanan</a>
            </div>
        </li>
        <li>
            <i class="icon ion-ios-people"></i>
            <div>
                <a href="{{ route('permintaan-pertemanan') }}">Permintaan Pertemanan</a>
            </div>
        </li>
        <li>
            <i class="icon ion-ios-people-outline"></i><div>
                <a href="{{ route('pertemanan') }}">Teman</a></div>
            </li>
            <li>
                <i class="icon ion-ios-videocam"></i>
                <div>
                    <a href="{{ route('list-film') }}">Film</a>
                </div>
            </li>
        </ul>
    </div>