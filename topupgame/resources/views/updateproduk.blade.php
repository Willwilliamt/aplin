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
    <h1 class="mb-0">Update Produk</h1>
    <hr />
    <form action="{{ route('topup.update', $produk->ID_TOPUP) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Id</label>
                <input type="text" name="id" class="form-control" value="{{ $produk->ID_TOPUP }}" readonly>
            </div>
            <div class="col mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $produk->Nama_topup }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" value="{{ $produk->harga_topup }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Game</label>
                <select name="id_game" id="">
                    @foreach($game as $item)
                        <option value="{{ $item->id_game }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>


        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </div>
    </form>
</body>
</html>
