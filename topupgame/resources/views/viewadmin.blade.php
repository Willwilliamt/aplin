<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    * {
        color: white;
    }
    .hidden {
        display: none;
    }
</style>
<body>
    @extends('template.content')
    @section('viewadmin')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="mb-0 text-white">Transaksi</h1><br><br>
            <button id="pending1" style="color: black">Transaksi Consign</button>
            <button id="prosesBtn" style="color: black">Transaksi Top up</button>
            <button id="pending2" style="color: black">Transaksi Influencer</button>
        </div>
        <hr />
        <table id="pendingTabel" class="status-table" border="1px solid black">
            <tr>
                <th>Id Trans</th>
                <th>Barang</th>
                <th>Pembeli</th>
                <th>Penjual</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
            @foreach ($trans as $item)
            <tr>
                <td>{{ $item->id_consign }}</td>
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

        {{-- Transaksi Top up --}}
        <table id="prosesTabel"  class="status-table hidden" border="1px solid black">
            <tr>
                <th>Id Trans</th>
                <th>Barang</th>
                <th>Pembeli</th>
                <th>Penjual</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </table>

        {{-- Transaksi Influencer --}}
        <table id="pending2Tabel" style="color: white"  class="status-table hidden" border="1px solid black">
            <tr>
                <th>Id Trans</th>
                <th>Nama Infuencer</th>
                <th>Waktu Kontrak</th>
                <th>Tanggal</th>
                <th>Kode Promo</th>
                <th>Jumlah Promo</th>
            </tr>
            @foreach ($trans2 as $item)
            <tr>
                <td>{{ $item->id_transaksi }}</td>
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
