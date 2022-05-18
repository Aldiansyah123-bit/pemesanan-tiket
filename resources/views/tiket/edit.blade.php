@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                  <div class="card-header">Tambah Tiket</div>
                      <div class="card-body">
                        <form action="/tiket/update/{{$tiket->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Nama Tiket</label>
                                    <div class="col-md-6">
                                        <input type="text" name="nama_tiket" class="form-control" value="{{$tiket->nama_tiket}}">
                                        <div class="text-danger">
                                            @error('nama_tiket')
                                                {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Jenis Tiket</label>
                                    <div class="col-md-6">
                                        <input type="text" name="jenis_tiket" class="form-control" value="{{$tiket->jenis_tiket}}">
                                        <div class="text-danger">
                                            @error('jenis_tiket')
                                                {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Nama kategori</label>
                                    <div class="col-md-6">
                                        <select name="id_kategori" class="form-control" value="{{$tiket->kategori->nama_kategori}}">
                                            <option value="">Select Kategori</option>
                                            @foreach ($kategori as $item)
                                                <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger">
                                            @error('id_kategori')
                                                {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Jumlah Tiket</label>
                                    <div class="col-md-6">
                                        <input type="text" name="jumlah_tiket" class="form-control" value="{{$tiket->jumlah_tiket}}">
                                        <div class="text-danger">
                                            @error('jumlah_tiket')
                                                {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Harga Tiket</label>
                                    <div class="col-md-6">
                                        <input type="text" name="harga_tiket" class="form-control uang" value="{{$tiket->harga_tiket}}">
                                        <div class="text-danger">
                                            @error('harga_tiket')
                                                {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-2">
                                    <button type="submit" class="btn btn-danger">Simpan</button>
                                    <a href="/tiket" class="btn btn-warning">Kembali</a>
                                </div>
                            </div>
                        </form>
                      </div>
                  </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.uang').mask('000.000.000',{reverse:true});
    });
</script>
@endsection
