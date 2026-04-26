<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Pembina;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    public function index()

    {
        $data['ekskul'] = Ekstrakurikuler::with('pembina')->get();

        $data['ekskul'] = Ekstrakurikuler::all();
        return view('admin/ekskul/index',$data);
    }
    public function tambahekskul()
    {
        $pembinas = Pembina::all();
        return view('admin.ekskul.tambahekskul',compact('pembinas'));
    }
    public function store(Request $request)
    {
        

        $request->validate([
        'nama' => 'required|string',
        'pembina_id' => 'required|exists:pembina,id',
        ]);

        $data = new Ekstrakurikuler();
        $data->nama = trim($request->nama);
        $data->pembina_id = $request->pembina_id;
        $data->save();

        return redirect('admin/ekskul/index')->with('success', "Data admin sukses ditambah");
    }
    public function edit($id)
    {
        
        $ekskul = Ekstrakurikuler::findOrFail($id);
        $pembinas = Pembina::all();
        return view('admin.ekskul.edit', compact('ekskul','pembinas'));
    }
    public function update(Request $request, $id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id);
        $ekskul->nama = trim($request->nama);
        $ekskul->pembina_id = trim($request->pembina_id);
        
        $ekskul->save();

        return redirect('admin/ekskul/index')->with('success', "Data ekskul berhasil diperbarui.");
    }
    
    public function delete($id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id); // agar error 404 jika tidak ditemukan
        $ekskul->delete();

        return redirect('admin/ekskul/index')->with('success', 'Data ekskul berhasil dihapus.');
    }

}
