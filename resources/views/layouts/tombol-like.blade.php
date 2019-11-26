<a class="btn text-green" href="{{ route('sukai-film', [$f->id]) }}">
	<i class="fa fa-thumbs-up"></i> {{ $f->yangsuka_count }}
</a>
<a class="btn text-red" href="{{ route('tidaksukai-film', [$f->id]) }}">
	<i class="fa fa-thumbs-down"></i> {{ $f->yangtidaksuka_count }}
</a>