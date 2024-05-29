<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Promo</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    body{
        background: linear-gradient(#1F2544,#474F7A,#81689D);
        height: 100vh;
        margin: 0;
    }
    .box{
        background: linear-gradient(#81689D,#FFD0EC);
        padding: 3rem;
        border-radius: 10px;
    }

</style>
<body>
    <div class="d-flex justify-content-center" style="height: 100vh; align-items: flex-start; padding-top: 10vh;">
        <div class="container box">
            <h1 class="text-center text-white">Update Promo</h1>
            <hr />
            <form action="{{ route('promo.update', $promo->Id_promo) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label "><strong>ID</strong></label>
                        <input type="text" name="id" class="form-control" value="{{ $promo->Id_promo }}" readonly>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label "><strong>Nama</strong></label>
                        <input type="text" name="nama" class="form-control" value="{{ $promo->Nama_promo }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label "><strong>Jenis</strong></label>
                        <input type="text" name="jenis" class="form-control" value="{{ $promo->Jenis_promo }}">
                    </div>
                    <div class="col mb-3">
                        <label class="form-label "><strong>Nilai</strong></label>
                        <input type="text" name="nilai" class="form-control" value="{{ $promo->Nilai_promo }}">
                    </div>
        
                </div>
                <div class="row">
                    <div class="d-grid col-md-2 mx-auto">
                        <button class="btn btn-warning" type="submit"><strong>Update</strong></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>