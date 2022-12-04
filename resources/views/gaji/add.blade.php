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

        <h5 class="card-title fw-bolder mb-3">Tambah Gaji</h5>

		<form method="post" action="{{ route('gaji.store') }}">
			@csrf
            </div>
            <div class="mb-3">
                <label for="id_gaji" class="form-label">ID Gaji</label>
                <input type="text" class="form-control" id="id_gaji" name="id_gaji">
            </div>
            <div class="mb-3">
                <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok">
            </div>
            <div class="mb-3">
                <label for="tunjangan" class="form-label">Tunjangan</label>
                <input type="text" class="form-control" id="tunjangan" name="tunjangan">
            </div>

			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop
