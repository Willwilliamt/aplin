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
<style>
    body{
        background: linear-gradient(#7469B6,#AD88C6,#E1AFD1);
        height: 100vh; 
        margin: 0;
    }
    .box{
        background-color: #FFE6E6;
        padding: 2rem;
        border-radius: 10px;
    }
</style>
<body>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="container w-50 p-5 box">
            <h1 class="text-center">Welcome</h1> 
            <form action="game/insert" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6 mx-auto">
                        <input type="text" name="name" class="form-control" placeholder="Nama Game"><br>
                        <input type="text" name="desc" class="form-control" placeholder="Description">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mx-auto">
                        <select name="kategori" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->nama_kategori }}">{{ $category->nama_kategori }}</option>
                            @endforeach
                        </select>
                        
                    </div>        
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mx-auto">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input">
                            <label for="" class="custom-file-label">Choose File</label>
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="d-grid col-md-2 mx-auto">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>