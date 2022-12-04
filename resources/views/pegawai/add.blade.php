@extends('layouts.template')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Tambah Pegawai</h5>

		<form method="post" action="{{ route('pegawai.store') }}">
			@csrf
            </div>
            <div class="mb-3 mx-3">
                <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai">
            </div>
            <div class="mb-3 mx-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
            </div>
            <div class="mb-3 mx-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan">
            </div>
            <div class="mb-3 mx-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="mb-3 mx-3">
                <label for="id_gaji" class="form-label">ID Gaji</label>
                <input type="text" class="form-control" id="id_gaji" name="id_gaji">
            </div>
            <div class="mb-3 mx-3">
                <label for="id_perusahaan" class="form-label">ID Perusahaan</label>
                <input type="text" class="form-control" id="id_perusahaan" name="id_perusahaan">
            </div>

			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop
