<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    

@extends('template.security')
@section('adminconsign')
    
<div class="details">
    <div id="userTable" class="recentOrders">
        <div class="cardHeader">
            <h2>Transaksi</h2>
            <button id="pending1" class="btn">Menunggu Konfirmasi</button>
            <button id="prosesBtn" class="btn">Dalam Proses</button>
            <button id="pending2" class="btn">Menunggu Konfirmasi Kedua</button>
            <button id="btnSelesai" class="btn">Selesai</button>
        </div>
        <table id="pendingTabel" class="status-table" border="1px solid black">
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
            @if ($item->status == 0 && $item->nama_admin == session("user"))
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
                    <form action="{{ route('confirmTransaction', $item->id_consign) }}" method="get">
                        @csrf
                        
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </form>
                </td>
            </tr>
            @endif      
    @endforeach
        </table>


        <table id="prosesTabel" class="status-table hidden" border="1px solid black">
            <tr>
                <th>Id Trans</th>
                <th>Barang</th>
                <th>Pembeli</th>
                <th>Penjual</th>
                <th>Tanggal</th>
                <th>Status</th>
                
            </tr>
            @foreach ($trans as $item)
            @if ($item->status == 1)
            <tr>
                <td>{{ $item->id_consign }}</td>
                <td>{{ $item->Nama_barang }}</td>
                <td>{{ $item->pembeli }}</td>
                <td>{{ $item->penjual }}</td>
                <td>{{ $item->Tanggal_transaksi }}</td>
                <td> @if ($item->status == 1)
                    Dalam Proses
                @else
                    {{ $item->status }}
                @endif</td>
                
            </tr>
            @endif
        
    @endforeach
        </table>


        <table id="selesaiTabel" class="status-table hidden" border="1px solid black">
            <tr>
                <th>Id Trans</th>
                <th>Barang</th>
                <th>Pembeli</th>
                <th>Penjual</th>
                <th>Tanggal</th>
                <th>Status</th>
                
            </tr>
            @foreach ($trans as $item)
            @if ($item->status == 3)
            <tr>
                <td>{{ $item->id_consign }}</td>
                <td>{{ $item->Nama_barang }}</td>
                <td>{{ $item->pembeli }}</td>
                <td>{{ $item->penjual }}</td>
                <td>{{ $item->Tanggal_transaksi }}</td>
                <td> @if ($item->status == 3)
                    Selesai
                @else
                    {{ $item->status }}
                @endif</td>
                
            </tr>
            @endif
        
    @endforeach
        </table>

        <table id="pending2Tabel" class="status-table hidden" border="1px solid black">
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
            @if ($item->status == 2)
            <tr>
                <td>{{ $item->id_consign }}</td>
                <td>{{ $item->Nama_barang }}</td>
                <td>{{ $item->pembeli }}</td>
                <td>{{ $item->penjual }}</td>
                <td>{{ $item->Tanggal_transaksi }}</td>
                <td> @if ($item->status == 2)
                    Konfirmasi 2
                @else
                    {{ $item->status }}
                @endif</td>
                <td>
                    <form action="{{ route('confirmTransaction2', $item->id_consign) }}" method="get">
                        @csrf
                        
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </form>
                </td>
                
            </tr>
            @endif
        
    @endforeach
        </table>

    
    </div>                
</div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var pending1 = document.getElementById("pending1");
        var prosesBtn = document.getElementById("prosesBtn");
        var pending2 = document.getElementById("pending2");
        var btnSelesai = document.getElementById("btnSelesai");

        var tables = document.querySelectorAll(".status-table");

        function showTable(tableId) {
            tables.forEach(function(table) {
                if (table.id === tableId) {
                    table.classList.remove("hidden");
                } else {
                    table.classList.add("hidden");
                }
            });
        }

        pending1.addEventListener("click", function() {
            showTable("pendingTabel");
        });

        prosesBtn.addEventListener("click", function() {
            showTable("prosesTabel");
        });

        pending2.addEventListener("click", function() {
            showTable("pending2Tabel");
        });

        btnSelesai.addEventListener("click", function() {
            showTable("selesaiTabel");
        });
    });
</script>
</body>

</html>