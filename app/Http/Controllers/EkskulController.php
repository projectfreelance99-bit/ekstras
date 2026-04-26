<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    // public function index()
    // {
    //     $data['ekskul'] = Ekskul::all();
    //     return view('admin/ekskul/index',$data);
    // }
    // public function tambahekskul()
    // {

    //     return view('admin.ekskul.tambahekskul');
    // }
    // public function store(Request $request)
    // {
        

    //     $data = new ekskul();
    //     $data->nama= trim($request->nama);
    //     $data->deskripsi = trim($request->deskripsi);
        
    //     // $data->Id = 1;
    //     $data->save();

    //     return redirect('admin/ekskul/index')->with('success', "Data admin sukses ditambah");
    // }
    // public function edit($id)
    // {
    //     $ekskul = ekskul::findOrFail($id);
    // return view('admin.ekskul.edit', compact('ekskul'));
    // }
    // public function update(Request $request, $id)
    // {
    //     $ekskul = ekskul::findOrFail($id);
    //     $ekskul->nama = trim($request->nama);
    //     $ekskul->deskripsi = trim($request->deskripsi);
        
    //     $ekskul->save();

    //     return redirect('admin/ekskul/index')->with('success', "Data ekskul berhasil diperbarui.");
    // }
}
