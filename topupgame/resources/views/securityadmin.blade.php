@extends('template.security')
@section('securityadmin')
    
<div class="topbar">
    <div class="toggle">
        <ion-icon name="menu-outline" style="color: white;"></ion-icon>
    </div>
    <div class="toggle-buttons">
        <button id="showUserTable" class="btn">Show User Table</button>
        <button id="showAdminTable" class="btn">Show Admin Table</button>
    </div>
    <p style="color: white">Welcome, Security Admin {{session("user")}}</p>
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
                <th>Id</th>
                <th>Nama Game</th>
                <th>Description</th>
                <th>Nama Kategori</th>
                <th>Image</th>
                
            </tr>
            @foreach ($games as $item)
                    <tr>
                        <td>{{ $item['id_game'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['description'] }}</td>
                        <td>{{ $item['nama_kategori'] }}</td>
                        <td><img src="{{ asset('uploads/game/' . $item->image) }}" alt="..." width="100px" height="100px"></td>
                        <td>
                            <div style="display: flex">

                                <a href="{{ route('games.show', $item->id_game) }}" type="button" class="btn btn-secondary">UPDATE</a>
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
