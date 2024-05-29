@extends('template.content')
@section('addkategori')
    <div class="container">
        <h1 class="mb-0" style="color: white">Add Kategori</h1>
        <span class="navbar-text text-black me-2">
            <a href="/crudkategori" class="btn btn-primary">List Kategori</a>
            
        </span>
        <hr />
        <form action="kategori/insert" method="POST" enctype="">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Kategori">
                </div>
                
            </div>

    
            <div class="row">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

    </div>
    @endsection
