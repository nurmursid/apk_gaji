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

        <h5 class="card-title fw-bolder mb-3">Tambah perusahaan</h5>

		<form method="post" action="{{ route('perusahaan.store') }}">
			@csrf
            </div>
            <div class="mb-3 mx-3">
                <label for="id_perusahaan" class="form-label">ID Perusahaan</label>
                <input type="text" class="form-control" id="id_perusahaan" name="id_perusahaan">
            </div>
            <div class="mb-3 mx-3">
                <label for="nama_perusahaan" class="form-label">Perusahaan</label>
                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan">
            </div>
            <div class="mb-3 mx-3">
                <label for="daerah" class="form-label">Daerah</label>
                <input type="text" class="form-control" id="daerah" name="daerah">
            </div>

			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop
