<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Barang</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background: url(simplegaming.jpg) center / cover;
            height: 100vh;
            margin: 0;
        }
        .box {
            background-color: #fff5;
            backdrop-filter: blur(7px);
            padding: 2rem;
            border-radius: 10px;
        }
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
    </style>
</head>
<body>
    <div class="d-flex justify-content-center" style="height: 100vh; align-items: flex-start; padding-top: 10vh;">
        <div class="container w-50 p-5 box">
            <h1 class="mb-0 text-center text-white">Add Product</h1>
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
</body>
</html>
