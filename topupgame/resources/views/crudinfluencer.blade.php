@extends('template.content')
@section('influencer')

            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="mb-0 text-white">List Influencer</h1>
                    
                    <a href="/addinfluencer" class="btn btn-primary">Add Influencer</a>
                </div>
                    <hr />
                    <table class="table table text-white" >
                        <thead class="table-primary">
                            <tr>
                                
                                <th>ID</th>
                                <th>Nama Influencer</th>
                                <th>Platform</th>
                                <th>Masa Kontrak</th>
                      
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promos as $barang)
                                <tr>
                                    
                                    <td class="align-middle">{{ $barang->Id_influencer }}</td>
                                    <td class="align-middle">{{ $barang->Nama_influencer }}</td>
                                    <td class="align-middle">{{ $barang->platform }}</td>
                                    <td class="align-middle">{{ $barang->waktu }}</td>
                                    
                                    <td>
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
