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
               <div class="card-header"><i class="fas fa-database"> Data Tiket </i></div>
                  <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            <h5>{{session('status')}}</h5>
                        </div>
                    @endif
                  <a href="/tiket/create" class="btn btn-danger btn-sm"><i class="fas fa-plus-square"> Tambah Tiket </i></a>
                   <hr>
                     <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th><i class="far fa-sticky-note"> No  </i></th>
                                <th><i class="fas fa-file-signature"> Nama Tiket </i></th>
                                <th><i class="fas fa-star-of-david"> Jenis Tiket </i></th>
                                <th><i class="fas fa-cubes"> Kategori Tiket </i></th>
                                <th><i class="fab fa-cuttlefish"> Jumlah Tiket </i></th>
                                <th><i class="fas fa-puzzle-piece"> Harga Tiket </i></th>
                                <th><i class="fas fa-edit"> Action </i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($tiket as $item)
                              <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama_tiket }}</td>
                                    <td>{{ $item->jenis_tiket }}</td>
                                    <td>{{ $item->kategori->nama_kategori }}</td>
                                    <td>{{ $item->jumlah_tiket}}</td>
                                    <td>Rp. {{ $item->harga_tiket }}</td>
                                    <td class="text-center">
                                        <a href="/tiket/edit/{{$item->id}}"><i class="fas fa-edit text-info"></i></a>
                                        <a href="/tiket/delete/{{$item->id}}"><i class="fas fa-trash-alt text-danger"></i></a>
                                    </td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>
                 </div>
               </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(function() {
        $('#users-table').DataTable();
    });
</script>
@endpush
@endsection

