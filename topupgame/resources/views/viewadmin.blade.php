<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .bag{
        background-color: #fff5;
        backdrop-filter: blur(7px);
    }
    .hidden {
        display: none;
    }
</style>
<body>
    @extends('template.content')
    @section('viewadmin')
    <h1 class="mb-0 text-white text-center mt-3">Transaksi</h1><br><br>
    <div class="container">
        <div class="d-flex align-items-center justify-content-center">
            <button class="btn btn-primary text-white mx-2" id="pending1">Transaksi Consign</button>
            <button class="btn btn-primary text-white mx-2" id="prosesBtn">Transaksi Top up</button>
            <button class="btn btn-primary text-white mx-2" id="pending2">Transaksi Influencer</button>
        </div>
        <hr />
        <table id="pendingTabel" class="table table-bordered bag status-table">
            <thead class="table-primary">
                <tr class="text-center">
                    <th>Barang</th>
                    <th>Pembeli</th>
                    <th>Penjual</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            @foreach ($trans as $item)
            <tr class="text-white">
                <td>{{ $item->Nama_barang }}</td>
                <td>{{ $item->pembeli }}</td>
                <td>{{ $item->penjual }}</td>
                <td>{{ $item->Tanggal_transaksi }}</td>
                <td>
                    @if ($item->status == 0)
                        Belum Di Confirm
                    @elseif ($item->status == 1)
                        Sudah Di Confirm
                    @elseif ($item->status == 3)
                        Sudah Selesai
                    @else
                        {{ $item->status }}
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
        


        <table id="prosesTabel"  class="status-table hidden table table-bordered bag">
            <thead class="table-primary">
                <tr class="text-center">
                    <th>Nama User</th>
                    <th>Game</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    
                </tr>
            </thead>
            @foreach ($trans3 as $item)
            <tr>
                <td>{{ $item->pembeli }}</td>
                <td>{{ $item->game_name }}</td>
                <td>{{ $item->jumlah_topup }}</td>
                <td>{{ $item->Tanggal_transaksi }}</td>
            </tr>
            @endforeach
        </table>


        <table id="pending2Tabel" style="color: white"  class="status-table hidden table table-bordered bag">
            <thead class="table-primary">
                <tr class="text-center">
                    <th>Nama Infuencer</th>
                    <th>Waktu Kontrak</th>
                    <th>Tanggal</th>
                    <th>Kode Promo</th>
                    <th>Jumlah Promo</th>
                </tr>
            </thead>
            @foreach ($trans2 as $item)
            <tr>
                <td>{{ $item->Nama_influencer }}</td>
                <td>{{ $item->waktu }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->kode_promo }}</td>
                <td>{{ $item->jumlah_promo }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    @endsection

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var pending1 = document.getElementById("pending1");
            var prosesBtn = document.getElementById("prosesBtn");
            var pending2 = document.getElementById("pending2");
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
        });
    </script>
</body>
</html>
