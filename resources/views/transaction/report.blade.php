<table class="table table-bordered">
    <tr class="success">
        <th colspan="5" class="text-center"><h4>Laporan Penjualan Tiket</h4></th>
    </tr>
    <tr class="success">
        <th colspan="5" class="text-center">Madiun</th>
    </tr>
    <tr class="success">
        <th colspan="5" class="text-center">08128349343</th>
    </tr>
    <tr>
        <th>No</th>
        <th>Nama Tiket</th>
        <th>Qty</th>
        <th>Harga Tiket</th>
        <th>Subtotal</th>
    </tr>
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
        <?php $no++ ?>
        <?php $total=$total+($harga * $item->qty) ?>
    @endforeach
    <tr>
        <td colspan="4"><p align="right">Total</p></td>
        <td>Rp. {{number_format($total)}}</td>
    </tr>
</table>
