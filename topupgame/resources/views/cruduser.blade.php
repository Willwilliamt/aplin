
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
@extends('template.buyconsigntemplate')
@section('consign')
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .container {
            flex: 1 0 auto;
        }

        footer {
            height: 50vh;
        }
        tbody{
            background-color: #8a8a8a
        }
    </style>
    <div class="container">
        <main class="table p-3">
            <section class="table__header">
                <h1 class="text-center">List Barang</h1>
                <a href="/addbarang" class="btn btn-primary btn-sm">Add Barang</a>
            </section>
            <br>
            <section class="table__body">
                <table class="table table-hover table-bordered">
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
                                <td class="align-middle">{{ $barang->kategori->nama_kategori }}</td>
                                <td class="align-middle">{{ $barang->deskripsi }}</td>
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
    </div>
    <footer></footer>
@endsection
