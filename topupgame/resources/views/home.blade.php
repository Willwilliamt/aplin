
@extends('template.hometemplate')
@section('home')
    

  <div class="cardBag p-5" id="category">
  <h1 class="text-center">Vouchers & Games</h1>
        <div class="d-flex justify-content-center p-3">
            <button class="btn btn-primary me-2" id="allBtn">All</button>
            @foreach($categories as $category)
                <button class="btn btn-primary me-2" id="{{ strtoupper($category->nama_kategori) }}Btn">{{ $category->nama_kategori }}</button>
            @endforeach
        </div>
        <div class="row">
        @foreach ($game as $g)
    <div class="col-md-4 mb-3" id="{{ $g->nama_kategori }}">
        <div class="card h-100">
            <img src="{{ asset('uploads/game/' . $g->image) }}" style="width: 355px; height:200px;" class="card-img-top" alt="{{ $g->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $g->name }}</h5>
                <p class="card-text">{{ $g->description }}</p>
                <a href="{{ route('quickbuy', $g->id_game) }}" class="btn btn-primary">Quick Buy</a>
            </div>
        </div>
    </div>
@endforeach
        </div>
        </div>
    </div>
</div>
@endsection
    