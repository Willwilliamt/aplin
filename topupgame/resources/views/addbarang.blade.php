<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    body {
        background: linear-gradient(#86469C, #BC7FCD, #FB9AD1);
        height: 100vh;
        margin: 0;
    }
    .box {
        background-color: #FFCDEA;
        padding: 2rem;
        border-radius: 10px;
    }
</style>
<body>
    <div class="d-flex justify-content-center" style="height: 100vh; align-items: flex-start; padding-top: 10vh;">
        <div class="container box">
            <h1 class="mb-0 text-center">Add Product</h1>
            <span class="navbar-text text-black me-2">
                <p><strong>Welcome, {{ Session::get('user') }}!</strong></p> 
            </span>
            <hr />
            <form action="user/insert" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6 mx-auto">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Barang"><br>
                        <input type="number" name="harga" class="form-control" placeholder="Harga Barang">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mx-auto">
                        <select name="kategori" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->Id_kategori }}">{{ $category->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mx-auto">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input">
                            <label for="" class="custom-file-label">Choose File</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="d-grid col-md-2 mx-auto">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>  
    </div>
</body>
</html>
