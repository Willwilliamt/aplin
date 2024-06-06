
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Barang</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
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
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            background-color: #D895DA;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>
    <main class="table p-3">
        <section  class="table__header">
            <a href="/" class="btn1">Back</a>
            <h1 class="text-center">List Barang</h1>
            <a href="/addbarang" class="btn1">Add Barang</a>
        </section>
        <section class="table__body">
            <table class="table table-hover">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Foto Barang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="bodyTable text-center">
                    @foreach ($barangs as $barang)
                        <tr>
                            <td class="align-middle">{{ $barang->Nama_barang }}</td>
                            <td class="align-middle">{{ $barang->Harga_barang }}</td>
                            <td class="align-middle">{{ $barang->kategori->nama_kategori}}</td>
                            <td class="align-middle">{{ $barang->deskripsi}}</td>
                            <td class="align-middle"><img src="{{ asset('uploads/barang/' . $barang->image) }}" alt="" width="100px" height="100px"></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic Example">
                                    <a href="{{ route('products.show', $barang->Id_barang) }}" type="button" class="btn btn-secondary">UPDATE</a>
                                    <form action="{{ route('products.destroy', $barang->Id_barang) }}" method="POST" onsubmit="return confirm('Delete?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger m-0">Delete</button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
