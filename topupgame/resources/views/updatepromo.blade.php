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
    <h1 class="mb-0">Update Promo</h1>
    <hr />
    <form action="{{ route('promo.update', $promo->Id_promo) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Id</label>
                <input type="text" name="id" class="form-control" value="{{ $promo->Id_promo }}" readonly>
            </div>
            <div class="col mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $promo->Nama_promo }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Jenis</label>
                <input type="text" name="jenis" class="form-control" value="{{ $promo->Jenis_promo }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Nilai</label>
                <input type="text" name="nilai" class="form-control" value="{{ $promo->Nilai_promo }}">
            </div>

        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning" type="submit">Update</button>
            </div>
        </div>
    </form>
</body>
</html>