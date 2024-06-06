<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Product</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    body{
        background: linear-gradient(#1F2544,#474F7A,#81689D);
        height: 100vh;
        margin: 0;
    }
    .box {
        background:  #fff5;
        padding: 3rem;
        border-radius: 10px;
        backdrop-filter: blur(7px);
    }
</style>
<body>
    <div class="d-flex justify-content-center" style="height: 100vh; align-items: flex-start; padding-top: 10vh;">
        <div class="container p-5 box">
            <h1 class="text-center text-white">Update Product</h1>
            <hr />
            <form action="{{ route('products.update', $product->Id_barang) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label"><strong>ID</strong></label>
                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $product->Id_barang }}" readonly>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label"><strong>Nama</strong></label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $product->Nama_barang }}">
                    </div>
                    <div class="col mb-3">
                        <label class="form-label"><strong>Deskripsi</strong></label>
                        <input type="text" name="deskripsi" class="form-control" placeholder="Nama" value="{{ $product->deskripsi }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label"><strong>Harga</strong></label>
                        <input type="text" name="harga" class="form-control" placeholder="Harga" value="{{ $product->Harga_barang }}">
                    </div>
                    <div class="col mb-3">
                        <label for="" class="form-label"><strong>Kategori</strong></label>
                        <select name="kategori" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->Id_kategori }}">{{ $category->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label"><strong>Current Image</strong></label>
                        <div>
                            <img src="{{ asset('uploads/barang/' . $product->image) }}" alt="" width="100px" height="100px">
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label"><strong>New Image</strong></label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="col mb-3">
                    <label class="form-label"><strong>Current Image 2</strong></label>
                    <div>
                        <img src="{{ asset('uploads/barang/' . $product->image2) }}" alt="" width="100px" height="100px">
                    </div>
                </div>
                <div class="col mb-3">
                    <label class="form-label"><strong>Current Image 3</strong></label>
                    <div>
                        <img src="{{ asset('uploads/barang/' . $product->image3) }}" alt="" width="100px" height="100px">
                    </div>
                </div>
                <div class="col mb-3">
                    <label class="form-label"><strong>Current Image 4</strong></label>
                    <div>
                        <img src="{{ asset('uploads/barang/' . $product->image4) }}" alt="" width="100px" height="100px">
                    </div>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label"><strong>New Image</strong></label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col mb-3">
                        <label class="form-label"><strong>New Image 2</strong></label>
                        <input type="file" name="image2" class="form-control">
                    </div>
                    <div class="col mb-3">
                        <label class="form-label"><strong>New Image 3</strong></label>
                        <input type="file" name="image3" class="form-control">
                    </div>
                    <div class="col mb-3">
                        <label class="form-label"><strong>New Image 4</strong></label>
                        <input type="file" name="image4" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="d-grid col-md-2 mx-auto">
                        <button class="btn btn-primary" type="submit"><strong>Update</strong></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
