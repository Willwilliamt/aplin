@extends('template.content')
@section('addproduk')

            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="mb-0 text-white">Add Produk</h1>
                    
                    <a href="/crudproduk" class="btn btn-primary">List produk</a>
                </div>
                    <hr />
                    <div class="container">
                        <span class="navbar-text text-black me-2">
                            
                        </span>
                        <hr />
                        <form action="topup/insert" method="POST" enctype="">
                            @csrf
                            <div class="row mb-3">
                                <div class="col">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama"><br>
                                    <select name="id_game" id="">
                                        @foreach($game as $item)
                                            <option value="{{ $item->id_game }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="number" name="harga" class="form-control" placeholder="Harga produk"><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
    @endsection    