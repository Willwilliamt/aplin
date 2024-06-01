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
    <a href="/consignment" class="btn btn-secondary" type="button">Back</a>

    <h3>
        Nama Barang: {{$barang ->Nama_barang}}

    </h3>
    <h3>
        Nama Penjual: {{$pengguna ->name}}
    </h3>
    <img src="{{ asset('uploads/barang/' . $barang->image) }}" alt="" width="150px" height="150px">
    <h3>Deskripsi : {{$barang ->deskripsi}}</h3>
    <h3>Harga : {{$barang ->Harga_barang}}</h3>
    <form action="/buybarang" method="post">
        @csrf
        <select name="id_admin" id="">
            @foreach($admin as $item)
                <option value="{{ $item->name }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <input type="hidden" name="idbarang" value="{{ Session::get('id_barang') }}">
        <input type="hidden" name="idseller" value="{{ Session::get('id_seller') }}">
        <input type="hidden" name="iduser" value="{{ Session::get('user_id') }}">
        <button type="submit" class="btn btn-success">Buy Now</button>
    </form>
</body>
</html>
