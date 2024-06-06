@extends('template.buyconsigntemplate')
@section('consign')

<style>
    .container.box {
        padding: 20px;
        background: rgb(200, 227, 253);
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .main-image {
        max-width: 100%;
        max-height: 400px;
        border: 2px solid #ddd;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .thumbnail-container {
        margin-top: 20px;
        text-align: center;
    }

    .thumbnail-container img {
        width: 100px;
        height: 100px;
        border: 2px solid transparent;
        transition: border 0.3s ease, transform 0.3s ease;
        cursor: pointer;
        margin: 0 5px;
    }

    .thumbnail-container img:hover {
        border: 2px solid #007bff;
        transform: scale(1.05);
    }

    .details-container {
        margin-top: 20px;
        padding-left: 20px;
    }

    .details-container p {
        margin: 5px 0;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
</style>
<br>
<div class="container box">
    <h1 class="text-center">Detail Barang</h1>
    <a href="/consignment" class="btn btn-secondary mb-3" type="button"><strong>Back</strong></a>
    <div class="row">
        <div class="col-md-6 text-center">
            <img id="mainImage" src="{{ asset('uploads/barang/' . ($barang->image ?: 'default.jpg')) }}" alt="Main Image" class="img-fluid main-image">
            <div class="thumbnail-container mt-3">
                <img src="{{ asset('uploads/barang/' . ($barang->image ?: 'default.jpg')) }}" alt="Image 1" class="img-thumbnail thumb">
                <img src="{{ asset('uploads/barang/' . ($barang->image2 ?: 'default.jpg')) }}" alt="Image 2" class="img-thumbnail thumb">
                <img src="{{ asset('uploads/barang/' . ($barang->image3 ?: 'default.jpg')) }}" alt="Image 3" class="img-thumbnail thumb">
                <img src="{{ asset('uploads/barang/' . ($barang->image4 ?: 'default.jpg')) }}" alt="Image 4" class="img-thumbnail thumb">
            </div>
        </div>
        <div class="col-md-6 details-container">
            <div class="d-flex justify-content-center mt-4">
                <form action="/buybarang" method="post">
                    @csrf
                    <div class="form-group">
                        <h1>{{$barang->Nama_barang}}</h1>
                        <h4>{{$game->name}}</h4>
                        <p><strong>Nama Penjual: </strong> {{$pengguna->name}}</p>
                        <p><strong>Deskripsi: </strong> {{$barang->deskripsi}}</p>
                        <p><strong>Harga: </strong> {{$barang->Harga_barang}}</p>
                        <label for="id_admin"><strong>Pilih Admin:</strong></label>
                        <select name="id_admin" id="id_admin" class="form-control">
                            @foreach($admin as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="promo"><strong>Kode Promo:</strong></label>
                        <input type="text" name="promo" id="promo" class="form-control">
                    </div>
                    <input type="hidden" name="idbarang" value="{{ Session::get('id_barang') }}">
                    <input type="hidden" name="idseller" value="{{ Session::get('id_seller') }}">
                    <input type="hidden" name="iduser" value="{{ Session::get('user_id') }}">
                    <input type="hidden" name="harga" value="{{$barang->Harga_barang}}">
                    <button type="submit" class="btn btn-success">Buy Now</button>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const thumbnails = document.querySelectorAll('.thumb');
        const mainImage = document.getElementById('mainImage');

        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function() {
                mainImage.src = this.src;
            });
        });
    });
</script>
@endsection
