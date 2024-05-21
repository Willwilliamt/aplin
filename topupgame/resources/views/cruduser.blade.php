
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
            
        }
    </style>
</head>
<body>
    <div class="container">
        <span class="navbar-text text-white me-2">
            Welcome, {{ Session::get('user') }}!
        </span>
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="mb-0">List Barang</h1>
            <a href="/" class="btn btn-primary">BACK</a>
            <a href="/addbarang" class="btn btn-primary">Add Barang</a>
        </div>
        <hr />
        <table class="table table-hover" >
            <thead class="table-primary">
                <tr>
                    
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Kategori</th>
                    <th>Foto Barang</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $barang)
                    <tr>
                        
                        <td class="align-middle">{{ $barang->Id_barang }}</td>
                        <td class="align-middle">{{ $barang->Nama_barang }}</td>
                        <td class="align-middle">{{ $barang->Harga_barang }}</td>
                        <td class="align-middle">{{ $barang->kategori->nama_kategori}}</td>
                        <td class="align-middle"><img src="{{ asset('uploads/barang/' . $barang->image) }}" alt="" width="100px" height="100px"></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic Example">
                                <a href="{{ route('products.show', $barang->Id_barang) }}" type="button" class="btn btn-secondary">UPDATE</a>
                                <form action="{{ route('products.destroy', $barang->Id_barang) }}" method="POST" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger m-0">Delete</button>
                                </form>
                                
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>
</html>