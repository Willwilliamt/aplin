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

    
    <h1 class="mb-0">Update Product</h1>
    <hr />
    <form action="{{ route('products.update', $product->Id_barang) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Id</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $product->Id_barang }}" readonly>
            </div>
            <div class="col mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $product->Nama_barang }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Harga</label>
                <input type="text" name="harga" class="form-control" placeholder="Harga" value="{{ $product->Harga_barang }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control" placeholder="Kategori" value="{{ $product->id_kategori }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Current Image</label>
                <div>
                    <img src="{{ asset('uploads/barang/' . $product->image) }}" alt="" width="100px" height="100px">
                </div>
            </div>
            <div class="col mb-3">
                <label class="form-label">New Image</label>
                <input type="file" name="image" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning" type="submit">Update</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>