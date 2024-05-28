
@extends('template.content')
@section('addpromo')
    
        
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="mb-0 text-white">Add Promo</h1>
                    
                    <a href="/crudpromo" class="btn btn-primary">List promo</a>
                </div>
                    <hr />
                    <div class="container">
                        <span class="navbar-text text-black me-2">
                            
                        </span>
                        <hr />
                        <form action="promo/insert" method="POST" enctype="">
                            @csrf
                            <div class="row mb-3">
                                <div class="col">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama promo"><br>
                                    <input type="text" name="jenis" class="form-control" placeholder="Jenis promo"><br>
                                    <input type="text" name="nilai" class="form-control" placeholder="Nilai promo"><br>
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
        
    </div>
    @endsection