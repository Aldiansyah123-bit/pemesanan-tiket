@extends('layouts.app')
@section('content')
<style type="text/css">
    .card-header {
       background-color:  #27c8f9;
     }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
        <div class="card-header"><i class="far fa-credit-card"> TRANSAKSI TIKET</i></div>
                    <div class="card-body">
                    <h3><i class="far fa-clipboard"> Form Transaksi</i></h3>
                    @if (session('status'))
                        <div class="alert alert-success">
                            <h5>{{session('status')}}</h5>
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <form action="/transaction/create" class="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <tr><td>
                                <div class="col-md-12">
                                    <select name="id_tiket" class="form-control">
                                        <option value="">Select Nama Tiket</option>
                                        @foreach ($tiket as $item)
                                            <option value="{{$item->id}}">{{$item->nama_tiket}}</option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger">
                                        @error('id_tiket')
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            </td></tr>
                            <tr><td>
                                    <div class="col-md-12">
                                        <input type="text" name="qty" placeholder="QTY" class="form-control">
                                        <div class="text-danger">
                                            @error('qty')
                                                {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                            </td></tr>
                            <tr><td>
                                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                                    <a href="/transaction/selesai" class="btn btn-danger">Selesai</a>
                            </td></tr>
                        </form>
                    </table>
                    <table class="table table-bordered">
                        <tr class="success">
                            <th colspan="6">Detail Transaksi</th>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Nama Tiket</th>
                            <th>Qty</th>
                            <th>Harga Tiket</th>
                            <th>Subtotal</th>
                            <th>Cancel</th>
                        </tr>
                        <?php $no=1; $total=0; ?>
                         @foreach ($transaksi as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{ $item->tiket->nama_tiket }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>Rp. {{ $item->tiket->harga_tiket }}</td>
                                @php
                                    $harga = str_replace('.','',$item->tiket->harga_tiket)
                                @endphp
                                <td>Rp. {{ number_format($harga * $item->qty) }}</td>
                                <td>
                                    <a href="/transaction/cancel/{{$item->id}}" class="btn btn-danger">Cancel</a>
                                </td>
                            </tr>
                            <?php $total=$total+($harga*$item->qty) ?>
                       @endforeach
                        <tr>
                            <td colspan="4"><p align="right">Total</p></td>
                            <td>Rp. {{number_format($total)}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
