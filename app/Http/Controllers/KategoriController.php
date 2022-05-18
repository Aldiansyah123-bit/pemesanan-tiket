<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Imports\KategoriImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index',compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function addprosesCreate(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect('kategori')->with('status','Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $kategori = Kategori::where('id',$id)->first();
        return view('kategori.edit',compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        Kategori::findOrFail($id)->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect('kategori')->with('status','Data Berhasil Di edit');
    }

    public function destroy($id)
    {
        Kategori::destroy($id);
        return redirect('kategori')->with('status','Data Berhasil Dihapus');
    }

    public function upload()
    {
        return view('kategori.excel');
    }

    public function uploadExcel(Request $request)
    {
        $request->validate([
            'file'  => 'required|mimes:xls,xlsx',
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            Excel::import(new KategoriImport,$file);
            return redirect('kategori')->with('status','Data Berhasil Di Upload');
        }

        return redirect()->back()->with('status','Gagal Upload File');
    }
}
