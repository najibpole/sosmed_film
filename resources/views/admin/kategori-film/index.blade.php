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
								<a href="{{ route('kategori-film.create') }}" class="btn btn-flat btn-sm btn-primary float-right pull-right">Tambah</a>
							</div>
							<div class="card-body">
								<table class="table table-responsive table-striped table-bordered table-hovered" id="datatable">
									<thead>
										<tr>
											<th>#</th>
											<th>Nama</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($data as $d)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $d->nama }}</td>
											<td>
												<a href="{{ route('kategori-film.edit', [$d->id]) }}" class="btn btn-flat btn-sm btn-primary">Ubah</a>
												<a href="#" onclick="hapus(event, '{{ route('kategori-film.destroy', [$d->id]) }}')" class="btn btn-flat btn-sm btn-danger">Hapus</a>
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