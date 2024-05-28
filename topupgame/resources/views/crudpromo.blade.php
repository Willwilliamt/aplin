@extends('template.content')
@section('promo')
    

            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="mb-0 text-white">List Promo</h1>
                    
                    <a href="/addpromo" class="btn btn-primary">Add Promo</a>
                </div>
                    <hr />
                    <table class="table table text-white" >
                        <thead class="table-primary">
                            <tr>
                                
                                <th>ID</th>
                                <th>Nama Promo</th>
                                <th>Jenis Promo</th>
                                <th>Nilai Promo</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promos as $barang)
                                <tr>
                                    
                                    <td class="align-middle">{{ $barang->Id_promo }}</td>
                                    <td class="align-middle">{{ $barang->Nama_promo }}</td>
                                    <td class="align-middle">{{ $barang->Jenis_promo }}</td>
                                    <td class="align-middle">{{ $barang->Nilai_promo }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic Example">
                                            <a href="{{ route('promo.show', $barang->Id_promo) }}" type="button" class="btn btn-secondary">UPDATE</a>
                                            <form action="{{ route('promo.destroy', $barang->Id_promo) }}" method="POST" onsubmit="return confirm('Delete?')">
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