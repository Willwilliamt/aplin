@extends('template.content')
@section('promo')
    
<style>
    .bag{
        background-color: #fff5;
        backdrop-filter: blur(7px);
    }
</style>
<h1 class="mb-0 text-white text-center mt-3">List Promo</h1>
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">                  
                    <a href="/addpromo" class="btn btn-primary">Add Promo</a>
                </div>
                    <hr />
                    <table class="table table-bordered bag">
                        <thead class="table-primary">
                            <tr class="text-center">                               
                                <th>Nama Promo</th>
                                <th>Jenis Promo</th>
                                <th>Nilai Promo</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promos as $barang)
                                <tr class="text-white">
                               
                                    <td class="align-middle">{{ $barang->Nama_promo }}</td>
                                    <td class="align-middle">{{ $barang->Jenis_promo }}</td>
                                    <td class="align-middle">{{ $barang->Nilai_promo }}</td>
                                    <td class="d-flex justify-content-center">
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