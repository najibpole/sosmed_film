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
								<form action="">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="film">Pilih Film</label>
												<select name="film" id="film" class="form-control">
													@foreach ($film as $f)
													<option value="{{ $f->id }}">{{ $f->nama }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-md-12">
											<button type="submit" class="btn btn-block btn-primary btn-flat">Lihat</button>
											<br>
											<br>
										</div>
									</div>
								</form>
								<table class="table table-responsive table-striped table-bordered table-hovered" id="datatable">
									<thead>
										<tr>
											<th>#</th>
											<th>Member</th>
											<th>Komentar</th>
											<th>Waktu Buat</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($data as $d)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $d->member->nama }}</td>
											<td>{{ $d->isi }}</td>
											<td>{{ $d->created_at }}</td>
											<td>
												<a href="#" onclick="hapus(event, '{{ route('komentar.destroy', [$d->id]) }}')" class="btn btn-flat btn-sm btn-danger">Hapus</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
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

@push('script')

<form action="" method="POST" id="form-hapus">
	@method('DELETE')
	@csrf
</form>

<script>
	function hapus(e, link){
		e.preventDefault();
		if(confirm('Anda yakin?')){
			$('#form-hapus').attr('action', link);
			$('#form-hapus')[0].submit();
		}
	}
</script>
@endpush