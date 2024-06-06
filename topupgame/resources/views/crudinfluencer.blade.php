@extends('template.content')
@section('influencer')

<style>
    .bag{
        background-color: #fff5;
        backdrop-filter: blur(7px);
    }
</style>
<h1 class="mb-0 text-white text-center mt-3">List Influencer</h1>
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">                    
                    <a href="/addinfluencer" class="btn btn-primary">Add Influencer</a>
                </div>
                    <hr />
                    <table class="table table-bordered bag" >
                        <thead class="table-primary">
                            <tr class="text-center">                
                                <th>Nama Influencer</th>
                                <th>Platform</th>
                                <th>Masa Kontrak</th>                
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promos as $barang)
                                <tr class="text-white">
                                    
                                    <td class="align-middle">{{ $barang->Nama_influencer }}</td>
                                    <td class="align-middle">{{ $barang->platform }}</td>
                                    <td class="align-middle">{{ $barang->waktu }}</td>                                   
                                    <td class="d-flex align-items-center justify-content-center">
                                        <div class="btn-group" role="group" aria-label="Basic Example">
                                            <a href="{{ route('influencer.show', $barang->Id_influencer) }}" type="button" class="btn btn-secondary">UPDATE</a>
                                            <form action="{{ route('influencer.destroy', $barang->Id_influencer) }}" method="POST" onsubmit="return confirm('Delete?')">
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
