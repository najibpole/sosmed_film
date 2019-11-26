<div class="col-md-2 static">
	<div class="suggestions" id="sticky-sidebar">
		<h4 class="grey">Tambah Teman</h4>
		@php
			$tambahTeman = [];
			if(\Auth::guard('member')->check()){
				$_user = \Auth::guard('member')->user();
				$pertemanan = \App\Pertemanan::where('member_id', $_user->id)->orWhere('teman_id', $_user->id)->get();
				if(count($pertemanan->toArray()) > 0){
					$pertemanan = $pertemanan->pluck('member_id')->toArray() + $pertemanan->pluck('teman_id')->toArray();
					$pertemanan = collect($pertemanan)->unique()->values();
				}
				else{
					$pertemanan = [];
				}
				$tambahTeman = \App\Member::whereNotIn('id', $pertemanan)->take(5)->inRandomOrder()->get();
			}else{
				$tambahTeman = \App\Member::take(5)->inRandomOrder()->get();
			}
		@endphp
		@foreach ($tambahTeman as $t)
		<div class="follow-user">
			<img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
			<div>
				<h5><a href="#">{{ $t->nama }}</a></h5>
				<a href="{{ route('tambah-teman', [$t->id]) }}" class="text-green">Tambah Teman</a>
			</div>
		</div>
		@endforeach
	</div>
</div>