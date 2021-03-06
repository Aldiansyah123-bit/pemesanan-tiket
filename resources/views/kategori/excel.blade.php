@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                  <div class="card-header">Upload Excel</div>
                      <div class="card-body">
                        <form action="/kategori/upload/excel" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-md-right">Upload Kategori</label>
                                    <div class="col-md-6">
                                      <input type="file" name="file" class="form-control">
                                      <div class="text-danger">
                                          @error('file')
                                              {{$message}}
                                          @enderror
                                      </div>
                                    </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                    <a href="/kategori" class="btn btn-danger">Kembali</a>
                                </div>
                          </div>
                        </form>
                      </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
