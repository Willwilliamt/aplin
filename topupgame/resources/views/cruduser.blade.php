
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
            background: linear-gradient(#F1EAFF,#E5D4FF,#DCBFFF);
            height: 100vh; 
            margin: 0;
        }
        .box{
            background: linear-gradient(#F1EAFF,#E5D4FF,#DCBFFF);
            padding: 2rem;
            border-radius: 10px;
            border: 1px solid black;
        }
        .text{
            color: #F1EAFF;
        }
        .bodyTable{
            background-color: #D0A2F7;
        }
        .buton{
            background: #E7BCDE;
        }
        .buton:hover {
            background: rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center" style="height: 100vh; align-items: flex-start; padding-top: 10vh;">
        <span class="navbar-text text me-2">
            Welcome, {{ Session::get('user') }}!
        </span>
        <div class="container box p-5">
            <a href="/" class="btn buton">Back</a>
            <div class="">
                <h1 class="text-center">List Barang</h1>
                <a href="/addbarang" class="btn buton">Add Barang</a>
            </div>
            <hr />
            <table class="table table-hover" >
                <thead class="table-primary text-center">
                    <tr>         
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Foto Barang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="bodyTable text-center">
                    @foreach ($barangs as $barang)
                        <tr>                
                            <td class="align-middle">{{ $barang->Id_barang }}</td>
                            <td class="align-middle">{{ $barang->Nama_barang }}</td>
                            <td class="align-middle">{{ $barang->Harga_barang }}</td>
                            <td class="align-middle">{{ $barang->kategori->nama_kategori}}</td>
                            <td class="align-middle">{{ $barang->deskripsi}}</td>
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
    </div>

</body>
</html>