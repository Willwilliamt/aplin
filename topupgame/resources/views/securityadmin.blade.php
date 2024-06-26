@extends('template.security')
@section('securityadmin')
<style>
    .btn1{
        text-decoration: none;
        color: black;
    }
</style>
<div class="topbar">
    <div class="toggle">
        <ion-icon name="menu-outline" style="color: white;"></ion-icon>
    </div>
     <h3 style="color: white">
        Welcome, Security Admin {{session("user")}}
     </h3>
    <div class="user">
        <img src="{{ URL('customer01.jpg') }}" height="30px" width="30px">
    </div>
</div>
<div class="details">
    <div id="userTable" class="recentOrders">
        <div class="cardHeader">
            <h2>Table GAME</h2>
            <a href="#" class="btn">View All</a>
        </div>
        <table>
            <tr>
                <th>Nama Game</th>
                <th>Description</th>
                <th>Nama Kategori</th>
                <th>Image</th>
                
            </tr>
            @foreach ($games as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['description'] }}</td>
                        <td>{{ $item['nama_kategori'] }}</td>
                        <td><img src="{{ asset('uploads/game/' . $item->image) }}" alt="..." width="100px" height="100px"></td>
                        <td>
                            <div class="d-flex justify-content-evenly">
                                <button><a href="{{ route('games.show', $item->id_game) }}" type="button" class="btn btn1">Update</a></button>
                                <form action="/securityadmin/delete" method="post">  
                                    @csrf    
                                    <input type="hidden" name="id" value="{{ $item['id_game'] }}">                                      
                                    <button type="submit" class="btn">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
            @endforeach
        </table>
    </div>                
</div>
@endsection
