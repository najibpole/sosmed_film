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
								<a href="{{ route('film.index') }}" class="btn btn-flat btn-sm btn-default float-right pull-right">Kembali</a>
							</div>
							<div class="card-body">
								<div class="horizontal-form-elements">
									<form class="form-horizontal" action="{{ route('film.store') }}" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="row">
											<div class="col-lg-12">
												<div class="form-group @error('nama') has-error @enderror">
													<label class="col-sm-3 control-label" for="nama">Nama</label>
													<div class="col-sm-6">
														<input required="required" name="nama" id="nama" type="text" class="form-control" placeholder="Nama" value="{{ old('nama') }}">
														@error('nama')
														<span class="help-block">{{ $message }}</span>
														@enderror
													</div>
												</div>
												<div class="form-group @error('author') has-error @enderror">
													<label class="col-sm-3 control-label" for="author">Author</label>
													<div class="col-sm-6">
														<input required="required" name="author" id="author" type="text" class="form-control" placeholder="Author" value="{{ old('author') }}">
														@error('author')
														<span class="help-block">{{ $message }}</span>
														@enderror
													</div>
												</div>
												<div class="form-group @error('tahun') has-error @enderror">
													<label class="col-sm-3 control-label" for="tahun">Tahun</label>
													<div class="col-sm-6">
														<input required="required" name="tahun" id="tahun" type="number" class="form-control" placeholder="Tahun" min="1800" value="{{ old('tahun') }}">
														@error('tahun')
														<span class="help-block">{{ $message }}</span>
														@enderror
													</div>
												</div>
												<div class="form-group @error('gambar') has-error @enderror">
													<label class="col-sm-3 control-label" for="gambar">Gambar</label>
													<div class="col-sm-6">
														<input required="required" name="gambar" id="gambar" type="file" accept="image/*" class="form-control">
														@error('gambar')
														<span class="help-block">{{ $message }}</span>
														@enderror
													</div>
												</div>
												<div class="form-group @error('deskripsi') has-error @enderror">
													<label class="col-sm-3 control-label" for="deskripsi">Deskripsi</label>
													<div class="col-sm-6">
														<textarea required="required" name="deskripsi" id="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
														@error('deskripsi')
														<span class="help-block">{{ $message }}</span>
														@enderror
													</div>
												</div>
												<div class="form-group @error('kategori') has-error @enderror">
													<label class="col-sm-3 control-label" for="kategori">Kategori</label>
													<div class="col-sm-6">
														<select class="form-control" name="kategori" id="kategori">
															@foreach ($kategori as $k)
															<option value="{{ $k->id }}">{{ $k->nama }}</option>
															@endforeach
														</select>
														@error('kategori')
														<span class="help-block">{{ $message }}</span>
														@enderror
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label" for="simpan"></label>
													<div class="col-sm-6">
														<button id="simpan" type="submit" class="btn btn-primary btn-flat">Simpan</button>
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