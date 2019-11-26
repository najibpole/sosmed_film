@extends('admin.layouts.table')

@section('content')

<div class="content-wrap">
	<div class="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8 p-0">
					<div class="page-header">
						<div class="page-title">
							<h1>{{ $title }}</h1>
						</div>
					</div>
				</div>
				<!-- /# column -->
				<div class="col-lg-4 p-0">
					<div class="page-header">
						<div class="page-title">
							<ol class="breadcrumb text-right">
								<li><a href="{{ url('/admin') }}">Dashboard</a></li>
								<li class="active">{{ $title }}</li>
							</ol>
						</div>
					</div>
				</div>
				<!-- /# column -->
			</div>
			<!-- /# row -->
			<div class="main-content">
				<div class="row">
					<div class="col-lg-12">
						@if(session('success_msg'))
						<div class="alert alert-success">{{ session('success_msg') }}</div>
						@endif
						<div class="card">
							<div class="card-header">
								<h4>
									{{ $title }} 
								</h4>
								<a href="{{ route('kategori-film.index') }}" class="btn btn-flat btn-sm btn-default float-right pull-right">Kembali</a>
							</div>
							<div class="card-body">
								<div class="horizontal-form-elements">
									<form class="form-horizontal" action="{{ route('kategori-film.update', [$d->id]) }}" method="POST">
										@csrf
										@method('PUT')
										<div class="row">
											<div class="col-lg-12">
												<div class="form-group @error('nama_kategori_film') has-error @enderror">
													<label class="col-sm-3 control-label" for="nama_kategori_film">Nama Kategori Film</label>
													<div class="col-sm-6">
														<input required="required" name="nama_kategori_film" id="nama_kategori_film" type="text" class="form-control" placeholder="Nama Kategori Film" value="{{ old('nama_kategori_film') ? old('nama_kategori_film') : $d->nama }}">
														@error('nama_kategori_film')
														<span class="help-block">{{ $message }}</span>
														@enderror
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label" for="nama_kategori_film"></label>
													<div class="col-sm-6">
														<button type="submit" class="btn btn-primary btn-flat">Simpan</button>
													</div>
												</div>
											</div><!-- /# column -->
										</div>
									</form>
								</div>
							</div>
						</div>
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