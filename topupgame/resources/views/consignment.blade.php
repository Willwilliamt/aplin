@extends('template.hometemplate')
@section('consign')
    <br>
    <h1 class="text-center">Consign</h1>
    <div class="text-center">
        <input type="text" id="search" style="border: 1px solid;border-radius:5px;width:250px;height:50px;padding:15px" name="search" placeholder="Search by item name">
    </div>
    <br>

    <div id="results" style="display: flex; justify-content: space-evenly; flex-wrap: wrap;">
        @include('partials.consignment_results', ['barang' => $barang])
    </div>
    <br>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: "{{ url('/consignment/search') }}",
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
    