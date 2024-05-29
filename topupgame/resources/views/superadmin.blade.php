@extends('template.content')
@section('dashboard')

            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline" style="color: white;"></ion-icon>
                </div>
                <div class="toggle-buttons">
                    <button id="showUserTable" class="btn">Show User Table</button>
                    <button id="showAdminTable" class="btn">Show Admin Table</button>
                </div>
                <div class="user">
                    <img src="{{ URL('customer01.jpg') }}" height="30px" width="30px">
                </div>
            </div>
            <div class="details">
                <div id="userTable" class="recentOrders">
                    <div class="cardHeader">
                        <h2>Table User</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Id User</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($users as $item)
                            @if ($item['Role'] == 0)
                                <tr>
                                    <td>{{ $item['Id_user'] }}</td>
                                    <td>{{ $item['Username'] }}</td>
                                    <td>{{ $item['Password'] }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['phone'] }}</td>
                                    <td>{{ $item['email'] }}</td>
                                    <td>
                                        <form action="/superadmin/promote" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item['Id_user'] }}">
                                            <button type="submit" class="btn">Promote</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif 
                        @endforeach
                    </table>
                </div>
                <div id="adminTable" class="recentOrders" style="display: none;">
                    <div class="cardHeader">
                        <h2>Table SecurityAdmin</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table border="1">
                        <tr>
                            <th>Id Admin</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($users as $admin)
                            @if ($admin['Role'] == 1)
                                <tr>
                                    <td>{{ $admin['Id_user'] }}</td>
                                    <td>{{ $admin['Username'] }}</td>
                                    <td>{{ $admin['name'] }}</td>
                                    <td>{{ $admin['email'] }}</td>
                                    <td>
                                        <form action="/superadmin/demote" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $admin['Id_user'] }}">
                                            <button type="submit" class="btn">Demote</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
       @endsection 