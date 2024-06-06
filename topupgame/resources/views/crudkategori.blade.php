@extends('template.content')
@section('kategori')
    
<style>
    .bag{
        background-color: #fff5;
        backdrop-filter: blur(7px);
    }
</style>
<h1 class="mb-0 text-white text-center mt-3">List Kategori</h1>
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    
                    <a href="/addkategori" class="btn btn-primary">Add Kategori</a>
                </div>
                    <hr />
                    <table class="table table-bordered bag">
                        <thead class="table-primary">
                            <tr class="text-center">                             
                                <th>Nama Kategori</th>
                                <th>Action</th>                           
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $barang)
                                <tr class="text-white"> 
                                    <td class="align-middle">{{ $barang->nama_kategori }}</td>
                                    <td class="d-flex align-items-center justify-content-center">
                                        <div class="btn-group" role="group" aria-label="Basic Example">
                                            <a href="{{ route('kategori.show', $barang->Id_kategori) }}" type="button" class="btn btn-secondary">UPDATE</a>
                                            <form action="{{ route('kategori.destroy', $barang->Id_kategori) }}" method="POST" onsubmit="return confirm('Delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger m-0">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            
                    
                

            </div>
            @endsection