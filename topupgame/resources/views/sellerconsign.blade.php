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
    <button id="pendingButton">Menunggu Konfirmasi </button>
    <button id="prosesBtn">Dalam Proses</button>
    <button id="selesaiBtn">Selesai</button>

    <table id="pendingTable" border="1px solid black">
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

    <table id="prosesTabel" class="hidden" border="1px solid black">
        <tr>
            <th>Barang</th>
            <th>Pembeli</th>
            <th>Penjual</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($trans as $item)
        @if ($item->status == 1)
        <tr>
            <td>{{ $item->Nama_barang }}</td>
            <td>{{ $item->pembeli }}</td>
            <td>{{ $item->penjual }}</td>
            <td>{{ $item->Tanggal_transaksi }}</td>
            <td>Dalam Proses</td>
            <td>
                <form action="" method="post">
                    @csrf
                    
                    <button type="submit" class="btn btn-primary">Berikan Item Ke Buyer</button>
                </form>
            </td>
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
    </table>

    <script>
        document.getElementById('pendingButton').addEventListener('click', function() {
            document.getElementById('pendingTable').classList.remove('hidden');
            document.getElementById('prosesTabel').classList.add('hidden');
            document.getElementById('selesaiTabel').classList.add('hidden');
        });

        document.getElementById('prosesBtn').addEventListener('click', function() {
            document.getElementById('pendingTable').classList.add('hidden');
            document.getElementById('prosesTabel').classList.remove('hidden');
            document.getElementById('selesaiTabel').classList.add('hidden');
        });

        document.getElementById('selesaiBtn').addEventListener('click', function() {
            document.getElementById('pendingTable').classList.add('hidden');
            document.getElementById('prosesTabel').classList.add('hidden');
            document.getElementById('selesaiTabel').classList.remove('hidden');
        });
    </script>
</body>
</html>
