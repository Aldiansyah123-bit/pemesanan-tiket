<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use App\Tiket;


class TiketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tiket = Tiket::all();
        return view('tiket.index',compact('tiket'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('tiket.create',compact('kategori'));
    }

    public function addprosesCreate(Request $request)
    {
        $request->validate([
            'nama_tiket'    => 'required',
            'jenis_tiket'   => 'required',
            'id_kategori'   => 'required',
            'jumlah_tiket'  => 'required',
            'harga_tiket'   => 'required',
        ]);

        Tiket::create([
            'nama_tiket'    => $request->nama_tiket,
            'jenis_tiket'   => $request->jenis_tiket,
            'id_kategori'   => $request->id_kategori,
            'jumlah_tiket'  => $request->jumlah_tiket,
            'harga_tiket'   => $request->harga_tiket,
        ]);

        return redirect('tiket')->with('status','Data Berhasil Di Tambah');
    }

    public function edit($id)
    {
        $tiket    = Tiket::where('id',$id)->first();
        $kategori = Kategori::all();
        return view('tiket.edit',compact('tiket','kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tiket'    => 'required',
            'jenis_tiket'   => 'required',
            'id_kategori'   => 'required',
            'jumlah_tiket'  => 'required',
            'harga_tiket'   => 'required',
        ]);
        Tiket::findOrFail($id)->update([
            'nama_tiket'    => $request->nama_tiket,
            'jenis_tiket'   => $request->jenis_tiket,
            'id_kategori'   => $request->id_kategori,
            'jumlah_tiket'  => $request->jumlah_tiket,
            'harga_tiket'   => $request->harga_tiket,
        ]);

        return redirect('tiket')->with('status','Data Berhasil Di Update');
    }

    public function destroy($id)
    {
        Tiket::destroy($id);
        return redirect('tiket')->with('status','Data Berhasil Di Hapus');
    }
}
