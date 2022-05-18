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
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-11">
                            <i class="fas fa-database"> Data Kategori </i>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <a href="/kategori/create" class="btn btn-danger btn-sm pull-left"><i class="fas fa-plus-square"> Tambah Data</i></a>
                    <a href="/kategori/upload" class="btn btn-success btn-sm pull-left"><i class="fas fa-file-excel"> Import File Excel</i></a>
                    <hr>
                    @if (session('status'))
                        <div class="alert alert-success">
                            <h5>{{session('status')}}</h5>
                        </div>
                    @endif
                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($kategori as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama_kategori }}</td>
                                    <td class="text-center">
                                        <a href="/kategori/edit/{{$data->id}}"><i class="fas fa-edit text-info"></i></a>
                                        <a href="/kategori/delete/{{$data->id}}"><i class="fas fa-trash-alt text-danger"></i></a>
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

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable();
});
</script>
@endpush
@endsection
