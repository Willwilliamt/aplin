@foreach ($barang as $index)
    <div class="card" style="width: 18rem; margin: 10px;">
        <img src="{{ asset('uploads/barang/' . $index->image) }}" class="card-img-top" alt="..." width="100px" height="150px">
        <div class="card-body">
            <h3 class="card-title">{{ $index->Nama_barang }}</h3>
            <h5 class="card-title">{{ $index->Harga_barang }}</h5>
            <p class="card-text">{{ $index->deskripsi }}</p>
            <form action="/buyconsignment" method="POST">
                @csrf
                <input type="hidden" name="id_barang" value="{{ $index->Id_barang }}">
                <input type="hidden" name="id_seller" value="{{ $index->id_user }}">
                <input type="hidden" name="id_game" value="{{ $index->id_game }}">
                <button type="submit" class="btn btn-secondary">BUY</button>
            </form>
        </div>
    @endforeach
</div>

<style>
    .card {
        flex: 1 1 calc(33.333% - 20px);
        margin: 10px;
        box-sizing: border-box;
    }
    .card img {
        object-fit: cover;
    }
</style>

