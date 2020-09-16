@extends('layouts/main')

@section('title', 'Add Foods Data')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Add Foods</h6>
        </div>
        <div class="card-body">
            <form class=" form-signin" action="/foods" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama">Nama Makanan</label>
                    <input type="text" class="form-control @error('nama_menu') is-invalid @enderror" id="nama_menu"
                        placeholder="Masukan Nama" name="nama_menu" value="{{ old('nama_menu') }}">
                    @error('nama_menu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                        placeholder="Masukan Harga" name="harga" value="{{ old('harga') }}">
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock"
                        placeholder="Masukan Stock" name="stock" value="{{ old('stock') }}">
                    @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="desciption">Description</label>
                    <input type="text" class="form-control @error('desciption') is-invalid @enderror" id="desciption"
                        placeholder="Description" name="desciption" value="{{ old('desciption') }}">
                    @error('desciption')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status Makanan</label>
                    <input type="text" class="form-control @error('status_menu') is-invalid @enderror" id="status_menu"
                        placeholder="Masukan Status Makanan" name="status_menu" value="{{ old('status_menu') }}">
                    @error('status_menu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button style="width: 15%;" class="btn btn-small btn-success btn-block" type="submit"><i
                        class="far fa-save"></i><span class="ml-2">save changes</span></button>
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
