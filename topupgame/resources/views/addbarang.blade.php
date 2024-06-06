@extends('template.buyconsigntemplate')
@section('consign')
<style>       
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
        .form-group input {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
        }
        .form-group label {
            position: absolute;
            top: 50%;
            left: 0.75rem;
            transform: translateY(-50%);
            padding: 0 0.25rem;
            transition: all 0.2s ease-in-out;
            pointer-events: none;
        }
        .form-group input:focus + label,
        .form-group input:not(:placeholder-shown) + label {
            top: -0.75rem;
            left: 0.5rem;
            font-size: 0.75rem;
            color: #495057;
        }
        footer{
            height: 40vh;
        }
        .box{
            background: #c3d8e4;
            border: 1px solid black;
        }
    </style>
    <div class="d-flex justify-content-center " style="height: 100vh; align-items: flex-start; padding-top: 10vh;">
        <div class="container w-50 p-5 box">
            <h1 class="mb-0 text-center">Add Product</h1>
            <span class="navbar-text text-black me-2">
                <p><strong>Welcome, {{ Session::get('user') }}!</strong></p>
            </span>
            <form action="user/insert" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name="nama" class="form-control" placeholder=" " required>
                    <label for="nama">Nama Barang</label>
                </div>
                <div class="form-group">
                    <input type="text" name="deskripsi" class="form-control" placeholder=" " required>
                    <label for="nama">Deskripsi</label>
                </div>
                <div class="form-group">
                    <input type="number" name="harga" class="form-control" placeholder=" " required>
                    <label for="harga">Harga Barang</label>
                </div>
                <div class="form-group">
                    <select name="kategori" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->Id_kategori }}">{{ $category->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="game" class="form-control">
                        @foreach($game as $games)
                            <option value="{{ $games->id_game }}">{{ $games->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input">
                        <label for="" class="custom-file-label">Choose File</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="image2" class="custom-file-input">
                        <label for="" class="custom-file-label">Choose File</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="image3" class="custom-file-input">
                        <label for="" class="custom-file-label">Choose File</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="image4" class="custom-file-input">
                        <label for="" class="custom-file-label">Choose File</label>
                    </div>
                </div>
                <div class="d-grid col-md-2 mx-auto">
                    <button type="submit" class="btn btn-primary"><strong>Submit</strong></button>
                </div>
            </form>
        </div>
    </div>
@endsection