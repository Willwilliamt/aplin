<div class="container">
    <div class="row justify-content-center">
        @foreach ($game as $g)
            <div class="col-md-4 mb-3" id="{{ $g->nama_kategori }}">
                <div class="card h-100 align-items-center w-75">
                    <img src="{{ asset('uploads/game/' . $g->image) }}" style="width: 355px; height:200px;" class="card-img-top" alt="{{ $g->name }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $g->name }}</h5>
                        <p class="card-text">{{ $g->description }}</p>
                        <a href="{{ route('quickbuy', $g->id_game) }}" class="btn btn-primary">Quick Buy</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

