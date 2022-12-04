@extends('layouts.template')

@section('content')

<a href="{{ route('pegawai.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID pegawai</th>
        <th>Nama Pegawai</th>
        <th>Jenis Kelamin</th>
        <th>Jabatan</th>
        <th>Alamat</th>
        <th>Gaji Pokok</th>
        <th>tunjangan</th>
        <th>Nama Perusahaan</th>
        <th>Daerah</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_pegawai }}</td>
                <td>{{ $data->nama_pegawai }}</td>
                <td>{{ $data->jenis_kelamin }}</td>
                <td>{{ $data->jabatan }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->gaji_pokok }}</td>
                <td>{{ $data->tunjangan}}</td>
                <td>{{ $data->nama_perusahaan }}</td>
                <td>{{ $data->daerah }}</td>
                <td>
                    <a href="{{ route('pegawai.edit', $data->id_pegawai) }}" type="button" class="btn btn-warning rounded-3">
                    <i class="nc-icon nc-tap-01"></i>
                    </a>

                    <!-- Button trigger modal -->
                    <!-- Hard Delete -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal{{ $data->id_pegawai }}">
                        <i class="nc-icon nc-simple-remove"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_pegawai }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('pegawai.delete', $data->id_pegawai) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Button trigger modal -->
                    <!-- Soft Delete -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#softdelete{{ $data->id_pegawai }}">
                        <i class="nc-icon nc-scissors"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="softdelete{{ $data->id_pegawai }}" tabindex="-1" aria-labelledby="softdeleteLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="softdeleteLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('pegawai.soft_delete', $data->id_pegawai) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        {{-- <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>test</td>
            <td>
                <a href="#" type="button" class="btn btn-warning rounded-3">Ubah</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal">
                    Hapus
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr> --}}
    </tbody>
</table>
       
@endsection
