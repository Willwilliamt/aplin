@extends('template.content')
@section('kategori')
    

            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="mb-0 text-white">List Kategori</h1>
                    
                    <a href="/addkategori" class="btn btn-primary">Add Kategori</a>
                </div>
                    <hr />
                    <table class="table table text-white" >
                        <thead class="table-primary">
                            <tr>
                                
                                <th>ID</th>
                                <th>Nama Kategori</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $barang)
                                <tr>
                                    
                                    <td class="align-middle">{{ $barang->Id_kategori }}</td>
                                    <td class="align-middle">{{ $barang->nama_kategori }}</td>
                                    <td>
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