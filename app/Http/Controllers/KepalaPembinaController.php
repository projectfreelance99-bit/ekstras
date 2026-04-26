<?php

namespace App\Http\Controllers;

use App\Models\Pembina;
use Illuminate\Http\Request;

class KepalaPembinaController extends Controller
{
    public function index()
    {
        $pembina = Pembina::all(); 
        return view('kasekolah.pembina.index', compact('pembina'));
    }
    public function tambahpembina()
    {

        return view('kasekolah.pembina.tambahpembina');
    }
    public function store(Request $request)
    {
        

        $data = new Pembina();
        $data->nama_pembina = trim($request->nama_pembina);
        $data->jenis_kelamin = trim($request->jenis_kelamin);
        $data->no_hp = trim($request->no_hp);
        $data->alamat = trim($request->alamat);
        
        // $data->Id = 1;
        $data->save();

        return redirect('kasekolah/pembina/index')->with('success', "Data Pembina sukses ditambah");
    }
    public function edit($id)
    {
        $pembina = Pembina::findOrFail($id);
        return view('kasekolah.pembina.editpembina', compact('pembina'));
    }
    public function update(Request $request, $id)
    {
        $pembina = Pembina::findOrFail($id);
        $pembina->nama_pembina = trim($request->nama_pembina);
        $pembina->jenis_kelamin = trim($request->jenis_kelamin);
        $pembina->no_hp = trim($request->no_hp);
        $pembina->alamat = trim($request->alamat);
        $pembina->save();

        return redirect('kasekolah/pembina/index')->with('success', "Data berhasil diperbarui.");
    }
    public function delete($id)
    {
        $pembina = Pembina::findOrFail($id);
        $pembina->delete();

        return redirect('kasekolah/pembina/index')->with('success', "Data berhasil dihapus.");
    }
}
