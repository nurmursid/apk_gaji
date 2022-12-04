<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GajiController extends Controller
{
    public function index() {
        $datas = DB::select('select * from gaji');

        return view('gaji.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('gaji.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_gaji' => 'required',
            'gaji_pokok' => 'required',
            'tunjangan' => 'required',

        ]);

        // Menggunakan Query Builder Laravel dan gaji Bindings untuk valuesnya
        DB::insert('INSERT INTO gaji(id_gaji, gaji_pokok, tunjangan) 
        VALUES (:id_gaji, :gaji_pokok, :tunjangan)',
        [
            'id_gaji' => $request->id_gaji, 
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,

        ]
        );

        // Menggunakan laravel eloquent
        // gaji::create([
        //     'id_gaji' => $request->id_gaji,
        //     'id_gaji' => $request->id_gaji,
        //     'gaji' => $request->gaji,
        //     'tunjangan' => $request->tunjangan,
        // ]);

        return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('gaji')->where('id_gaji', $id)->first();

        return view('gaji.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_gaji' => 'required',
            'gaji_pokok' => 'required',
            'tunjangan' => 'required',
            
        ]);

        // Menggunakan Query Builder Laravel dan gajid Bindings untuk valuesnya
        DB::update('UPDATE gaji SET id_gaji = :id_gaji, gaji_pokok = :gaji_pokok, 
        tunjangan = :tunjangan, WHERE id_gaji = :id',
        [
            'id' => $id,
            'id_gaji' => $request->id_gaji,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,

        ]
        );

        // Menggunakan laravel eloquent
        // gaji::where('id_gaji', $id)->update([
        //     'id_gaji' => $request->id_gaji,
        //     'id_gaji' => $request->id_gaji,
        //     'gajigaji' => $request->gajigaji,
        //     'tunjangan' => $request->tunjangan,
        // ]);

        return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan gajid Bindings untuk valuesnya
        DB::delete('DELETE FROM gaji WHERE id_gaji = :id_gaji', ['id_gaji' => $id]);

        // Menggunakan laravel eloquent
        // gaji::where('id_gaji', $id)->delete();

        return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil dihapus');
    }

}