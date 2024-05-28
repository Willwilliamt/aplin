<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-TlZzthgzo+Oj0bgdJ2yRbYNzeIW2alA0wulb1LV2a4oYYMMsmWi+0MaZ2MtbAs+leEKRkYOyBjZfHKR7FVT8wg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <h2>Consignment</h2>
        <h3>Welcome, {{ Session::get('user') }}!</h3><br>
        <a href="/" class="btn btn-secondary">Back</a>
        <div style="display: flex; justify-content: space-evenly;">
            @foreach ($barang as $index)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('uploads/barang/' . $index->image) }}" class="card-img-top" alt="..." width="100px" height="150px">
                <div class="card-body">
                    <h3 class="card-title">{{ $index->Nama_barang }}</h3>
                    <h5 class="card-title">{{ $index->Harga_barang }}</h5>
                    <p class="card-text">{{ $index->deskripsi }}</p>
                    <form action="/buyconsignment" method="POST">
                        @csrf
                        <input type="hidden" name="id_barang" value="{{ $index->Id_barang }}">
                        <input type="hidden" name="id_seller" value="{{ $index->id_user }}">
                        <button type="submit" class="btn btn-secondary">BUY</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
