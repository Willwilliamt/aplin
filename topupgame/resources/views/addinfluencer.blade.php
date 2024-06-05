@extends('template.content')
@section('addinfluencer')
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="mb-0 text-white">Add Influencer</h1>
                    
                    <a href="/crudpromo" class="btn btn-primary">List Influencer</a>
                </div>
                    <hr />
                    <div class="container">
                        <span class="navbar-text text-black me-2">
                            
                        </span>
                        <hr />
                        <form action="influencer/insert" method="POST" enctype="">
                            @csrf
                            <div class="row mb-3">
                                <div class="col">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Influencer"><br>
                                    <input type="text" name="platform" class="form-control" placeholder="Platform"><br>
                                    <input type="text" name="waktu" class="form-control" placeholder="Waktu Kontrak"><br>
                                    <input type="text" name="kode" class="form-control" placeholder="Kode Promo Untuk Influencer"><br>
                                    <input type="text" name="jumlah" class="form-control" placeholder="Jumlah Promo"><br>
                                    
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