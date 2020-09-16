@extends('layouts/main')

@section('title', 'Edit Foods Data')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center"></h6>
        </div>
        <div class="card-body">
            <form class=" form-signin" action="/foods/{{ $foods->id_makanan }}" method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Makanan</label>
                    <input type="text" class="form-control @error('nama_makanan') is-invalid @enderror" id="nama_makanan"
                        placeholder="Masukan Nama" name="nama_makanan" value="{{ $foods->nama_makanan }}">
                    @error('nama_makanan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                        placeholder="Masukan Harga" name="harga" value="{{ $foods->harga }}">
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status Makanan</label>
                    <input type="text" class="form-control @error('status_makanan') is-invalid @enderror" id="status_makanan"
                        placeholder="Masukan Status Makanan" name="status_makanan" value="{{ $foods->status_makanan }}">
                    @error('status_makanan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button style="width: 15%;" class="btn btn-small btn-success btn-block" type="submit">
                    <i class="far fa-save"></i><span class="ml-2">save changes</span>
                </button>
            </form>
        </div>
    </div>
    <a href="/foods" class="text-danger float-right">
        <i class="fas fa-arrow-left"><span class="ml-2">Back</span></i>
    </a>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection
