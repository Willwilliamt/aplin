<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Buy - {{ $game->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .game-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .game-image {
            width: 100px;
            height: auto;
        }
        .dropdown-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        .order-info {
            border: 1px solid #ddd;
            padding: 1rem;
            border-radius: 5px;
        }
        .order-info h5 {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="game-info mb-3">
            <img src="{{ asset('uploads/game/' . $game->image) }}" class="game-image" alt="{{ $game->name }}">
            <h1>Quick Buy - {{ $game->name }}</h1>
        </div>

        <div class="dropdown-container mb-3">
            <div class="mb-3">
                <label for="type" class="form-label">Tipe</label>
                <select id="type" class="form-select">
                    @foreach($barang as $item)
                        <option value="{{ $item->Id_barang }}">{{ $item->Nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="product" class="form-label">Produk</label>
                <select id="product" class="form-select">
                    @foreach($barang as $item)
                        <option value="{{ $item->Id_barang }}">{{ $item->Nama_barang }} - Rp{{ number_format($item->Harga_barang, 0, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="order-info">
            <h5>Informasi Pesanan</h5>
            <form action="{{ url('/purchase', ['id' => $game->id_game]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="userId" class="form-label">User ID</label>
                    <input type="text" class="form-control" id="userId" name="user_id" placeholder="Contoh: 12345678" required>
                </div>
                <div class="mb-3">
                    <label for="zoneId" class="form-label">Zone ID</label>
                    <input type="text" class="form-control" id="zoneId" name="zone_id" placeholder="Contoh: 2020. Tanpa tanda kurung" required>
                </div>
                <div class="mb-3">
                    <label for="note" class="form-label">Catatan untuk Penjual (Optional)</label>
                    <input type="text" class="form-control" id="note" name="note" placeholder="Catatan untuk Penjual">
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" required>
                </div>
                <button type="submit" class="btn btn-success">Beli Sekarang</button>
            </form>
        </div>
    </div>
</body>
</html>
