<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consignment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-TlZzthgzo+Oj0bgdJ2yRbYNzeIW2alA0wulb1LV2a4oYYMMsmWi+0MaZ2MtbAs+leEKRkYOyBjZfHKR7FVT8wg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background: url(bground1.jpeg) center / cover;
            margin: 0;
            height: 100vh;
        }
        .box {
            background: #fff5;
            backdrop-filter: blur(7px);
            padding: 3rem;
            border-radius: 10px;
        }
        .btn1{
            background: #96EFFF;
            color: black;
        }
        .btn1:hover{
            background: #96efff6e;
            color: black;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center" style="height: 100vh; align-items: flex-start; padding-top: 10vh;">
        <div class="container box">
            <a href="/consignment" class="btn btn1 mb-3" type="button"><strong>Back</strong></a>
            <h1 class="text-center">Detail Barang</h1><br>
            <div class="row">
                <div class="col-md-4 d-flex justify-content-center align-items-start">
                    <img src="{{ asset('uploads/barang/' . $barang->image) }}" alt="" width="250px" height="250px">
                </div>
                <div class="col-md-8">
                    <p><strong>Nama Barang : {{$barang->Nama_barang}}</strong></p>
                    <p><strong>Nama Penjual : {{$pengguna->name}}</strong></p>
                    <p><strong>Deskripsi : {{$barang->deskripsi}}</strong></p>
                    <p><strong>Harga : {{$barang->Harga_barang}}</strong></p>
                    <div class="d-flex justify-content-center mt-4">
                        <form action="/buybarang" method="post">
                            @csrf
                            <input type="hidden" name="idbarang" value="{{ Session::get('id_barang') }}">
                            <input type="hidden" name="idseller" value="{{ Session::get('id_seller') }}">
                            <input type="hidden" name="iduser" value="{{ Session::get('user_id') }}">
                            <button type="submit" class="btn btn-success">Buy Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
