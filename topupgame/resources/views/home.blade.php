@extends('template.hometemplate')
@section('home')
<div class="cardBag p-5" id="category">
    <h1 class="text-center">Vouchers & Games</h1>
    <div class="d-flex justify-content-center p-3">
        <input type="text" id="search" style="border: 1px solid; border-radius:5px; width:250px; height:50px; padding:15px" name="search" placeholder="Search by item name">
    </div>
    <br>
    <div class="d-flex justify-content-center p-3">
        <button class="btn btn-primary me-2" id="allBtn">All</button>
        @foreach($categories as $category)
            <button class="btn btn-primary me-2" id="{{ strtoupper($category->nama_kategori) }}Btn">{{ $category->nama_kategori }}</button>
        @endforeach
    </div>
    <div class="row" id="results">
        @include('partials.game_results', ['game' => $game])
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var query = $(this).val();
            $.ajax({
                url: "{{ url('/games/search') }}",
                type: "GET",
                data: {'search': query},
                success: function(data) {
                    $('#results').html(data);
                }
            });
        });
    });
</script>
@endsection
