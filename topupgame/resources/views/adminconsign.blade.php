@extends('template.security')
@section('adminconsign')
    
<div class="details">
    <div id="userTable" class="recentOrders">
        <div class="cardHeader">
            <h2>Transaksi Belum Di Confirm</h2>
            <a href="#" class="btn">View All</a>
        </div>
        <table>
            <tr>
                <th>Id Trans</th>
                <th>Barang</th>
                <th>Pembeli</th>
                <th>Penjual</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach ($trans as $item)
            @if ($item->status == 0)
            <tr>
                <td>{{ $item->id_consign }}</td>
                <td>{{ $item->Nama_barang }}</td>
                <td>{{ $item->pembeli }}</td>
                <td>{{ $item->penjual }}</td>
                <td>{{ $item->Tanggal_transaksi }}</td>
                <td> @if ($item->status == 0)
                    Belum Di Confirm
                @else
                    {{ $item->status }}
                @endif</td>
                <td>
                    <form action="" method="post">
                        @csrf
                        
                        <button type="submit" class="btn">Confirm</button>
                    </form>
                </td>
            </tr>
            @endif
        
    @endforeach
        </table>
    </div>                
</div>
@endsection
