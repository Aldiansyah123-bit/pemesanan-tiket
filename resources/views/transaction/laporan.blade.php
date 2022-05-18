<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan Tiket</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
        .garis-lurus{
            background-color: rgb(0, 0, 0);
            height:4px;
            width:100%;
        }
        .jenis-font{
            font-size: 17pt;
            font-family: 'Times New Roman', Times, serif;
        }
        .jenis-font1{
            font-size: 12pt;
            font-family: 'Times New Roman', Times, serif;
        }
        .title-font{
            font-size: 20pt;
            font-family: 'Times New Roman', Times, serif;
        }
	</style>
	<center>
		<div class="title-font"><b>Laporan Penjulan Tiket</b></div>
        <div class="jenis-font">Kota Madiun</div>
        <div class="jenis-font1">08120395456</div>
        <div class="garis-lurus"></div>
	</center>

	<table class='table table-bordered mt-4'>
		<thead>
			<tr class="text-center btn-danger">
                <th>No</th>
                <th>Nama Tiket</th>
                <th>Qty</th>
                <th>Harga Tiket</th>
                <th>Subtotal</th>
            </tr>
		</thead>
		<tbody>
			<?php $no=1; $total=0; ?>
            @foreach ($transaksi as $item)
            <tr>
                <td>{{$no++}}</td>
                <td>{{ $item->tiket->nama_tiket }}</td>
                <td>{{ $item->qty }}</td>
                @php
                    $harga = str_replace('.','',$item->tiket->harga_tiket)
                @endphp
                <td>Rp. {{ number_format($harga) }}</td>
                <td>Rp. {{ number_format($harga * $item->qty) }}</td>
            </tr>
                <?php $total=$total+($harga * $item->qty) ?>
            @endforeach
            <tr>
                <td colspan="4"><p align="right">Total</p></td>
                <td>Rp. {{number_format($total)}}</td>
            </tr>
		</tbody>
	</table>
</body>
</html>
