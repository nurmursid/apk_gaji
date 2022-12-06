<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index(Request $request) {
        if($request->has('search')){
            
		// menangkap data pencarian
		$search = $request->search;
 
        // mengambil data dari table pegawai sesuai pencarian data
        $datas = DB::select("SELECT pegawai.id_pegawai, pegawai.nama_pegawai, pegawai.jabatan, pegawai.jenis_kelamin, pegawai.alamat, 
        gaji.id_gaji, gaji.gaji_pokok, gaji.tunjangan,
        perusahaan.nama_perusahaan, perusahaan.daerah, perusahaan.id_perusahaan
        FROM pegawai
        LEFT JOIN gaji
        ON pegawai.id_gaji = gaji.id_gaji
        LEFT JOIN perusahaan
        ON perusahaan.id_perusahaan = pegawai.id_perusahaan
        WHERE pegawai.nama_pegawai LIKE :search 
        AND pegawai.is_delete = 0",

        ["search" => '%'.$search.'%']);
         $datas2 = DB::select("SELECT pegawai.id_pegawai, pegawai.nama_pegawai, pegawai.jabatan, pegawai.jenis_kelamin, pegawai.alamat, 
        gaji.id_gaji, gaji.gaji_pokok, gaji.tunjangan,
        perusahaan.nama_perusahaan, perusahaan.daerah, perusahaan.id_perusahaan
        FROM pegawai
        LEFT JOIN gaji
        ON pegawai.id_gaji = gaji.id_gaji
        LEFT JOIN perusahaan
        ON perusahaan.id_perusahaan = pegawai.id_perusahaan
        WHERE pegawai.is_delete = 1");

        // mengirim data pegawai ke view index
        return view('pegawai.index')
                ->with('datas', $datas)
                ->with('datas2', $datas2);
        }

        else{       
         $datas = DB::select('SELECT pegawai.id_pegawai, pegawai.nama_pegawai, pegawai.jabatan, pegawai.jenis_kelamin, pegawai.alamat, gaji.id_gaji,
        gaji.gaji_pokok, gaji.tunjangan,
        perusahaan.nama_perusahaan, perusahaan.daerah,  perusahaan.id_perusahaan
        FROM pegawai
        LEFT JOIN gaji
        ON pegawai.id_gaji = gaji.id_gaji
        LEFT JOIN perusahaan
        ON perusahaan.id_perusahaan = pegawai.id_perusahaan
        WHERE pegawai.is_delete = 0');

        $datas2 = DB::select('SELECT pegawai.id_pegawai, pegawai.nama_pegawai, pegawai.jabatan, pegawai.jenis_kelamin, pegawai.alamat, gaji.id_gaji,
        gaji.gaji_pokok, gaji.tunjangan,
        perusahaan.nama_perusahaan, perusahaan.daerah,  perusahaan.id_perusahaan
        FROM pegawai
        LEFT JOIN gaji
        ON pegawai.id_gaji = gaji.id_gaji
        LEFT JOIN perusahaan
        ON perusahaan.id_perusahaan = pegawai.id_perusahaan
        WHERE pegawai.is_delete = 1');

        return view('pegawai.index')
        ->with('datas', $datas)
        ->with('datas2', $datas2);
        }
    }

    public function create() {
        return view('pegawai.add');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_pegawai' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'id_gaji' => 'required',
            'id_perusahaan' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan pegawai Bindings untuk valuesnya
        DB::insert('INSERT INTO pegawai(id_pegawai, nama_pegawai, jenis_kelamin, jabatan, alamat, id_gaji, id_perusahaan) 
        VALUES (NULL, :nama_pegawai, :jenis_kelamin, :jabatan, :alamat, :id_gaji, :id_perusahaan)',
        [
            'nama_pegawai' => $request->nama_pegawai,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'id_gaji' => $request->id_gaji,
            'id_perusahaan' => $request->id_perusahaan,
        ]
        );

        // Menggunakan laravel eloquent
        // pegawai::create([
        //     'id_pegawai' => $request->id_pegawai,
        //     'nama_pegawai' => $request->nama_pegawai,
        //     'pegawai' => $request->pegawai,
        //     'jabatan' => $request->jabatan,
        // ]);

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('pegawai')->where('id_pegawai', $id)->first();

        return view('pegawai.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_pegawai' => 'required',
            'nama_pegawai' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'id_gaji' => 'required',
            'id_perusahaan' => 'required',
            
        ]);

        // Menggunakan Query Builder Laravel dan pegawaid Bindings untuk valuesnya
        DB::update('UPDATE pegawai 
        SET nama_pegawai = :nama_pegawai, jenis_kelamin = :jenis_kelamin, 
        jabatan = :jabatan, alamat = :alamat, id_gaji = :id_gaji, id_perusahaan = :id_perusahaan 
        WHERE id_pegawai = :id_pegawai',
        [
            'id_pegawai' => $id,
            'nama_pegawai' => $request->nama_pegawai,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'id_gaji' => $request->id_gaji,
            'id_perusahaan' => $request->id_perusahaan,
        ]
        );

        // Menggunakan laravel eloquent
        // pegawai::where('id_pegawai', $id)->update([
        //     'id_pegawai' => $request->id_pegawai,
        //     'nama_pegawai' => $request->nama_pegawai,
        //     'pegawaipegawai' => $request->pegawaipegawai,
        //     'jabatan' => $request->jabatan,
        // ]);

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan pegawaid Bindings untuk valuesnya
        DB::delete('DELETE FROM pegawai WHERE id_pegawai = :id_pegawai', ['id_pegawai' => $id]);

        // Menggunakan laravel eloquent
        // pegawai::where('id_pegawai', $id)->delete();

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus');
    }

    public function soft_delete($id, Request $request) {

        // Menggunakan Query Builder Laravel dan pegawaid Bindings untuk valuesnya
        DB::update('UPDATE pegawai 
        SET is_delete = 1 
        WHERE id_pegawai = :id_pegawai', 
        ['id_pegawai' => $id]);

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus');
    }

    public function restore($id, Request $request)
    {
        DB::update('UPDATE pegawai 
        SET is_delete = 0
        WHERE id_pegawai = :id_pegawai',
        [
            'id_pegawai' => $id,
        ]
        );

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dipulihkan');
    }


}