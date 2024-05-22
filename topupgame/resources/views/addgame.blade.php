<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Welcome</h1> 
    <form action="game/insert" method="POST" enctype="multipart/form-data">
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
        <div class="row mb-3">
            <div class="custom-file">
                <input type="file" name="image" class="custom-file-input">
                <label for="" class="custom-file-label">Choose File</label>
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</body>
</html>