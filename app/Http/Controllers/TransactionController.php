<?php

namespace App\Http\Controllers;

use App\Tiket;
use Illuminate\Http\Request;
use App\Transaksi;
use Laravel\Ui\Presets\React;
use PDF;
use App\Exports\TransaksiExport;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $transaksi = Transaksi::where('status','0')->get();
        $tiket     = Tiket::all();
        return view('transaction.index',compact('transaksi','tiket'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'id_tiket'  => 'required',
            'qty'       => 'required',
        ]);

        Transaksi::create([
            'id_tiket'  => $request->id_tiket,
            'qty'       => $request->qty,
        ]);

        return redirect('/transaction')->with('status','Data berhasil disimpan');
    }

    public function destroy($id)
    {
        Transaksi::destroy($id);
        return redirect('transaction')->with('status','Data Berhasil di Cancel');
    }

    public function update()
    {
        $transaksi = Transaksi::where('status','0');
        $transaksi->update(['status'=>'1']);
        return redirect('transaction')->with('status','Transaksi Telah Selesai');
    }

    public function laporanPDF()
    {
        $transaksi = Transaksi::all();
        $pdf       = PDF::loadview('transaction.laporan',compact('transaksi'))->setPaper('a4','portrait');
        return $pdf->stream();
    }

    public function laporanExcel()
    {
        return (new TransaksiExport)->download('penjualan_tiket.xlsx');
    }
}
