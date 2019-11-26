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
							</div>
							<div class="card-body">
								<div class="horizontal-form-elements">
									<form class="form-horizontal" action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
										@csrf
										@method('PUT')
										<div class="row">
											<div class="col-lg-12">
												<div class="form-group @error('nama') has-error @enderror">
													<label class="col-sm-3 control-label" for="nama">Nama</label>
													<div class="col-sm-6">
														<input required="required" name="nama" id="nama" type="text" class="form-control" placeholder="Nama" value="{{ old('nama') ? old('nama') : Auth::user()->nama }}">
														@error('nama')
														<span class="help-block">{{ $message }}</span>
														@enderror
													</div>
												</div>
												<div class="form-group @error('email') has-error @enderror">
													<label class="col-sm-3 control-label" for="email">Email</label>
													<div class="col-sm-6">
														<input required="required" name="email" id="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') ? old('email') : Auth::user()->email }}">
														@error('email')
														<span class="help-block">{{ $message }}</span>
														@enderror
													</div>
												</div>
												<div class="form-group @error('password') has-error @enderror">
													<label class="col-sm-3 control-label" for="password">Password</label>
													<div class="col-sm-6">
														<input name="password" id="password" type="text" class="form-control" placeholder="Password" value="{{ old('password') }}">
														@error('password')
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