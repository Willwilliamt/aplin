<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>User Consignment</title>
    <style>
        .hidden {
            display: none;
        }

        @media print {
            .table, .table__body {
                overflow: visible;
                height: auto !important;
                width: auto !important;
            }
        }

        body {
            min-height: 100vh;
            background: url(html_table.jpg) center / cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        main.table {
            width: 82vw;
            height: 90vh;
            background-color: #fff5;
            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;
            overflow: hidden;
        }

        .table__body {
            width: 95%;
            max-height: calc(89% - 1.6rem);
            background-color: #fffb;
            margin: .8rem auto;
            border-radius: .6rem;
            overflow: auto;
            overflow: overlay;
        }

        .table__body::-webkit-scrollbar {
            width: 0.5rem;
            height: 0.5rem;
        }

        .table__body::-webkit-scrollbar-thumb {
            border-radius: .5rem;
            background-color: #0004;
            visibility: hidden;
        }

        .table__body:hover::-webkit-scrollbar-thumb { 
            visibility: visible;
        }

        table {
            width: 100%;
        }

        table, th, td {
            border-collapse: collapse;
            padding: 1rem;
            text-align: center;
        }

        thead th {
            position: sticky;
            top: 0;
            left: 0;
            background-color: #d5d1defe;
            cursor: pointer;
            text-transform: capitalize;
        }

        tbody tr:nth-child(even) {
            background-color: #0000000b;
        }

        tbody tr {
            --delay: .1s;
            transition: .5s ease-in-out var(--delay), background-color 0s;
        }

        tbody tr:hover {
            background-color: rgba(223, 227, 233, 0.4) !important;
        }

        .btn1 {
            background: #C4E4FF;
        }
    </style>
</head>
<body>
    <main class="table p-3" id="customers_table">
        <section class="table__header">
            <button id="pendingBtn" class="btn1">Menunggu Konfirmasi</button>
            <button id="prosesBtn" class="btn1">Dalam Proses</button>
            <button id="selesaiBtn" class="btn1">Selesai</button>
            <h1 class="text-center">User's Consignment</h1>
        </section>
        <section class="table__body">
            <table id="pendingTable">
                <thead>
                    <tr>
                        <th>Barang</th>
                        <th>Pembeli</th>
                        <th>Penjual</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trans as $item)
                    @if ($item->status == 0)
                    <tr>
                        <td>{{ $item->Nama_barang }}</td>
                        <td>{{ $item->pembeli }}</td>
                        <td>{{ $item->penjual }}</td>
                        <td>{{ $item->Tanggal_transaksi }}</td>
                        <td>Menunggu Confirm Admin</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            <table id="ProsesTable" class="hidden">
                <thead>
                    <tr>
                        <th>Barang</th>
                        <th>Pembeli</th>
                        <th>Penjual</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trans as $item)
                    @if ($item->status == 1)
                    <tr>
                        <td>{{ $item->Nama_barang }}</td>
                        <td>{{ $item->pembeli }}</td>
                        <td>{{ $item->penjual }}</td>
                        <td>{{ $item->Tanggal_transaksi }}</td>
                        <td>Dalam Proses</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            <table id="selesaiTabel" class="hidden">
                <thead>
                    <tr>
                        <th>Barang</th>
                        <th>Pembeli</th>
                        <th>Penjual</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trans as $item)
                    @if ($item->status == 3)
                    <tr>
                        <td>{{ $item->Nama_barang }}</td>
                        <td>{{ $item->pembeli }}</td>
                        <td>{{ $item->penjual }}</td>
                        <td>{{ $item->Tanggal_transaksi }}</td>
                        <td>Selesai</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
    {{-- <table id="pendingTable">
        <tr>
            <th>Barang</th>
            <th>Pembeli</th>
            <th>Penjual</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>
        @foreach ($trans as $item)
        @if ($item->status == 0)
        <tr>
            <td>{{ $item->Nama_barang }}</td>
            <td>{{ $item->pembeli }}</td>
            <td>{{ $item->penjual }}</td>
            <td>{{ $item->Tanggal_transaksi }}</td>
            <td>Menunggu Confirm Admin</td>
        </tr>
        @endif
        @endforeach
    </table>

    <table id="prosesTable" class="hidden" border="1px solid black">
        <tr>
            <th>Barang</th>
            <th>Pembeli</th>
            <th>Penjual</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>
        @foreach ($trans as $item)
        @if ($item->status == 1)
        <tr>
            <td>{{ $item->Nama_barang }}</td>
            <td>{{ $item->pembeli }}</td>
            <td>{{ $item->penjual }}</td>
            <td>{{ $item->Tanggal_transaksi }}</td>
            <td>Dalam Proses</td>
        </tr>
        @endif
        @endforeach
    </table>

    <table id="selesaiTabel" class="hidden" border="1px solid black">
        <tr>
            <th>Barang</th>
            <th>Pembeli</th>
            <th>Penjual</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>
        @foreach ($trans as $item)
        @if ($item->status == 3)
        <tr>
            <td>{{ $item->Nama_barang }}</td>
            <td>{{ $item->pembeli }}</td>
            <td>{{ $item->penjual }}</td>
            <td>{{ $item->Tanggal_transaksi }}</td>
            <td>Selesai</td>
        </tr>
        @endif
        @endforeach
    </table> --}}

    <script>
        document.getElementById('pendingBtn').addEventListener('click', function() {
            document.getElementById('pendingTable').classList.remove('hidden');
            document.getElementById('prosesTable').classList.add('hidden');
            document.getElementById('selesaiTabel').classList.add('hidden');
        });

        document.getElementById('prosesBtn').addEventListener('click', function() {
            document.getElementById('pendingTable').classList.add('hidden');
            document.getElementById('prosesTable').classList.remove('hidden');
            document.getElementById('selesaiTabel').classList.add('hidden');
        });

        document.getElementById('selesaiBtn').addEventListener('click', function() {
            document.getElementById('pendingTable').classList.add('hidden');
            document.getElementById('prosesTable').classList.add('hidden');
            document.getElementById('selesaiTabel').classList.remove('hidden');
        });
    </script>
</body>
</html>
