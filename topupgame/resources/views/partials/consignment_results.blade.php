<div class="container">
    <div class="row">
        @foreach ($barang as $index)
            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card w-100" style="max-width: 18rem;">
                    <img src="{{ asset('uploads/barang/' . $index->image) }}" class="card-img-top" alt="..." style="width: 100%; height: 150px;">
                    <div class="card-body">
                        <h3 class="card-title">{{ $index->Nama_barang }}</h3>
                        <h5 class="card-title">Rp {{ $index->Harga_barang }}</h5>
                        <p class="card-text">{{ $index->deskripsi }}</p>
                        @if (session()->has('user'))
                        <form action="/buyconsignment" method="POST">
                            @csrf
                            <input type="hidden" name="id_barang" value="{{ $index->Id_barang }}">
                            <input type="hidden" name="id_seller" value="{{ $index->id_user }}">
                            <input type="hidden" name="id_game" value="{{ $index->id_game }}">
                            <button type="submit" class="btn btn-secondary">BUY</button>
                        </form>
                        @else
                        <p class="text-danger">Please log in to buy this item.</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
