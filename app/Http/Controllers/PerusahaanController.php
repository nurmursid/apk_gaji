<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PerusahaanController extends Controller
{
    public function index() {
        $datas = DB::select('select * from perusahaan');

        return view('perusahaan.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('perusahaan.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_perusahaan' => 'required',
            'nama_perusahaan' => 'required',
            'daerah' => 'required',

        ]);

        // Menggunakan Query Builder Laravel dan perusahaan Bindings untuk valuesnya
        DB::insert('INSERT INTO perusahaan(id_perusahaan, nama_perusahaan, daerah) 
        VALUES (:id_perusahaan, :nama_perusahaan, :daerah)',
        [
            'id_perusahaan' => $request->id_perusahaan, 
            'nama_perusahaan' => $request->nama_perusahaan,
            'daerah' => $request->daerah,

        ]
        );

        // Menggunakan laravel eloquent
        // perusahaan::create([
        //     'id_perusahaan' => $request->id_perusahaan,
        //     'id_perusahaan' => $request->id_perusahaan,
        //     'perusahaan' => $request->perusahaan,
        //     'daerah' => $request->daerah,
        // ]);

        return redirect()->route('perusahaan.index')->with('success', 'Data perusahaan berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('perusahaan')->where('id_perusahaan', $id)->first();

        return view('perusahaan.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_perusahaan' => 'required',
            'nama_perusahaan' => 'required',
            'daerah' => 'required',
            
        ]);

        // Menggunakan Query Builder Laravel dan perusahaand Bindings untuk valuesnya
        DB::update('UPDATE perusahaan SET id_perusahaan = :id_perusahaan, nama_perusahaan = :nama_perusahaan, 
        daerah = :daerah, WHERE id_perusahaan = :id',
        [
            'id' => $id,
            'id_perusahaan' => $request->id_perusahaan,
            'nama_perusahaan' => $request->nama_perusahaan,
            'daerah' => $request->daerah,

        ]
        );

        // Menggunakan laravel eloquent
        // perusahaan::where('id_perusahaan', $id)->update([
        //     'id_perusahaan' => $request->id_perusahaan,
        //     'id_perusahaan' => $request->id_perusahaan,
        //     'perusahaanperusahaan' => $request->perusahaanperusahaan,
        //     'daerah' => $request->daerah,
        // ]);

        return redirect()->route('perusahaan.index')->with('success', 'Data perusahaan berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan perusahaand Bindings untuk valuesnya
        DB::delete('DELETE FROM perusahaan WHERE id_perusahaan = :id_perusahaan', ['id_perusahaan' => $id]);

        // Menggunakan laravel eloquent
        // perusahaan::where('id_perusahaan', $id)->delete();

        return redirect()->route('perusahaan.index')->with('success', 'Data perusahaan berhasil dihapus');
    }

    public function soft_delete($id, Request $request) {

        // Menggunakan Query Builder Laravel dan pegawaid Bindings untuk valuesnya
        DB::update('UPDATE perushaan 
        SET deleted_at = now()
        WHERE id_perushaan = :id_perushaan',
        [
            'id_perushaan' => $id,
        ]
        );

        return redirect()->route('perushaan.index')->with('success', 'Data perushaan berhasil dihapus');
    }

}