
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
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="mb-0">List Barang</h1>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $barang)
                    <tr>
                        
                        <td>{{ $barang->Id_barang }}</td>
                        <td>{{ $barang->Nama_barang }}</td>
                        <td>{{ $barang->Harga_barang }}</td>
                        <td>{{ $barang->id_kategori }}</td>
                        <td>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>
</html>