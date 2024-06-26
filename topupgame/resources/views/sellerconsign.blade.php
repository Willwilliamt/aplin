@extends('template.buyconsigntemplate')
@section('consign')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<title>Seller Consignment</title>
<style>
    .hidden {
        display: none;
    }
    .container {
        flex: 1 0 auto;
    }

    footer {
        flex-shrink: 0;
        background-color: #f8f9fa;
        padding: 10px; 
        width: 100%;
        height: 50vh;
    }
    tbody {
        background-color: #8a8a8a;
    }
    .box {
        background: #e8f0f5;
        border: 0.5px solid black;
        border-radius: 10px;
    }
</style>
<br>
    <div class="container box p-5">
        <h1 class="text-center">Seller's Consignment</h1>
        <main class="table p-3" id="customers_table">
            <form action="/consignment" method="get">
                <a href="/" class="btn btn-primary btn-sm">Back</a>
            </form>
            <br>
            <section class="table__header">
                <button id="pendingButton" class="btn btn-primary btn-sm">Menunggu Konfirmasi</button>
                <button id="prosesBtn" class="btn btn-primary btn-sm">Dalam Proses</button>
                <button id="selesaiBtn" class="btn btn-primary btn-sm">Selesai</button>
            </section>
            <br>
            <section class="table__body">
                <table id="pendingTable" class="table table-hover table-bordered"> 
                    <thead  class="table-primary text-center">
                        <tr>
                            <th>Barang</th>
                            <th>Pembeli</th>
                            <th>Penjual</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="bodyTable text-center">
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
                <table id="prosesTabel" class="hidden table table-hover table-bordered">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>Barang</th>
                            <th>Pembeli</th>
                            <th>Penjual</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="bodyTable text-center">
                        @foreach ($trans as $item)
                        @if ($item->status == 1)
                        <tr>
                            <td>{{ $item->Nama_barang }}</td>
                            <td>{{ $item->pembeli }}</td>
                            <td>{{ $item->penjual }}</td>
                            <td>{{ $item->Tanggal_transaksi }}</td>
                            <td>Dalam Proses</td>
                            <td>
                                <form action="{{ route('berikanBuyer', $item->id_consign) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Berikan Item Ke Buyer</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
    
                <table id="selesaiTabel" class="hidden table table-hover table-bordered">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>Barang</th>
                            <th>Pembeli</th>
                            <th>Penjual</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="bodyTable text-center">
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
    </div>
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
    <footer></footer>
@endsection
