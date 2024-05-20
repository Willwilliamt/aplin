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
<body>
    <div class="container">
        <h1 class="mb-0">Add Product</h1>
        <span class="navbar-text text-black me-2">
            Welcome, {{ Session::get('user') }}!
            Welcome, {{ Session::get('user_id') }}!
        </span>
        <hr />
        <form action="user/insert" method="POST" enctype="">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Barang">
                </div>
                <div class="col">
                    <input type="number" name="harga" class="form-control" placeholder="Harga Barang">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kategori" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->Id_kategori }}">{{ $category->nama_kategori }}</option>
                        @endforeach
                    </select>
                    
                </div>
                
            </div>
    
            <div class="row">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

    </div>
    
</body>
</html>