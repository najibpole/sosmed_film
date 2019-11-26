@extends('admin.layouts.app')

@section('content')

<div class="content-wrap">
	<div class="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8 p-0">
					<div class="page-header">
						<div class="page-title">
							<h1>Dashboard</h1>
						</div>
					</div>
				</div>
				<!-- /# column -->
				<div class="col-lg-4 p-0">
					<div class="page-header">
						<div class="page-title">
							<ol class="breadcrumb text-right">
								<li><a href="{{ url('/admin') }}">Dashboard</a></li>
								<li class="active">Home</li>
							</ol>
						</div>
					</div>
				</div>
				<!-- /# column -->
			</div>
			<!-- /# row -->
			<div class="main-content">
				<div class="row">
					<div class="col-lg-3">
						<div class="card">
							<div class="stat-widget-two">
								<div class="widget-icon color-4">
									<i class="fa fa-cube"></i>
								</div>
								<div class="stat-content">
									<div class="stat-text">Kategori Film</div>
									<div class="stat-digit"> {{ $kategoriFilm }}</div>
								</div>
								<div class="progress">
									<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card">
							<div class="stat-widget-two">
								<div class="widget-icon color-2">
									<span class="ti-control-play"></span>
								</div>
								<div class="stat-content">
									<div class="stat-text">Film</div>
									<div class="stat-digit">
										{{ $film }}
									</div>
								</div>
								<div class="progress">
									<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card">
							<div class="stat-widget-two">
								<div class="widget-icon color-1">
									<i class="fa fa-users"></i>
								</div>
								<div class="stat-content">
									<div class="stat-text">Member </div>
									<div class="stat-digit"> 
										{{ $member }}
									</div>
								</div>
								<div class="progress">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card">
							<div class="stat-widget-two">
								<div class="widget-icon color-3">
									<i class="fa fa-comments"></i>
								</div>
								<div class="stat-content">
									<div class="stat-text">Komentar</div>
									<div class="stat-digit">
										{{ $komentar }}
									</div>
								</div>
								<div class="progress">
									<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
								</div>
							</div>
						</div>
					</div>
					<!-- /# column -->
				</div>
				<!-- /# row -->
				<div class="row">
					<div class="col-lg-6">
						<div class="card alert">
							<div class="card-header">
								<h4>Member Baru </h4>
							</div>
							<div class="card-body  card-content">
								<table class="table table-responsive table-hover ">
									<thead>
										<tr>
											<th>Nama</th>
											<th>Email</th>
											<th>Tanggal Daftar</th>
										</tr>
									</thead>
									<tbody>
										@if($memberBaru->count() > 0)
										@foreach ($memberBaru as $member)
										<tr>
											<td>{{ $member->nama }}</td>
											<td>{{ $member->email }}</td>
											<td>{{ $member->created_at }}</td>
										</tr>
										@endforeach
										@else
										<tr>
											<td style="text-align: center;" colspan="3">Tidak ada member baru</td>
										</tr>
										@endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="card alert">
							<div class="card-header">
								<h4>Komentar Terbaru </h4>
							</div>
							<div class="recent-comment m-t-15">
								@if($komentarBaru->count() > 0)
								@foreach ($komentarBaru as $komentar)
								<div class="media @if($loop->last) no-border @endif">
									<div class="media-left">
										<a href="#"><img class="media-object" src="assets/images/avatar/1.jpg" alt="..."></a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">{{ $komentar->member->nama }}</h4>
										<p>{{ $komentar->isi }}</p>
										<div class="comment-action">
											
										</div>
										<p class="comment-date">{{ $komentar->created_at }}</p>
									</div>
								</div>
								@endforeach
								@else
								Tidak ada komentar terbaru
								@endif
							</div>
						</div>
						<!-- /# card -->
					</div>
				</div>
				<!-- /# row -->
			</div>
			<!-- /# main content -->
		</div>
		<!-- /# container-fluid -->
	</div>
	<!-- /# main -->
</div>
<!-- /# content wrap -->

@endsection