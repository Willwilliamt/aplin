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
    <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>
</head>
<body>
<form action="{{ route('purchase', ['id' => $game->id_game]) }}" method="POST">
    @csrf
    <div class="container mt-5">
        <div class="game-info mb-3">
            <img src="{{ asset('uploads/game/' . $game->image) }}" class="game-image" alt="{{ $game->name }}">
            <h1>Quick Buy - {{ $game->name }}</h1>
        </div>

        <div class="dropdown-container mb-3">
            <div class="mb-3">
                <label for="product" class="form-label">Produk</label>
                <select id="product" class="form-select">
                    @foreach($topups as $topup)
                    <option value="{{ $topup->ID_TOPUP }}">{{ $topup->Nama_topup }} - Rp{{ number_format($topup->harga_topup, 0, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="order-info">
            <h5>Informasi Pesanan</h5>
            <div class="mb-3">
                <label for="userId" class="form-label">Nama Pembeli</label>
                <input type="text" class="form-control" id="userId" name="user_id" placeholder="Contoh: Ahmad Johnson" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com" required>
            </div>
            <div class="mb-3">
                <label for="notelp" class="form-label">No Telfon</label>
                <input type="tel" class="form-control" id="notelp" name="notelp" placeholder="0856341213">
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Kuantitas</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" required>
            </div>
            <input type="hidden" name="product_id" id="product_id" value="{{ $topups->first()->ID_TOPUP }}">
            <input type="hidden" name="product_name" id="product_name" value="{{ $topups->first()->Nama_topup }}">
            <input type="hidden" name="product_price" id="product_price" value="{{ $topups->first()->harga_topup }}">
            <input type="hidden" name="product_image" id="product_image" value="{{ $game->image }}">
            <input type="hidden" name="product_platform" id="product_platform" value="{{ $game->platform }}">
            <button type="submit" class="btn btn-primary">Beli Sekarang</button>
        </div>
    </div>
</form>
<script>
    document.getElementById('product').addEventListener('change', function () {
        var selectedValue = this.value;
        var product_id = document.getElementById('product_id');
        var product_name = document.getElementById('product_name');
        var product_price = document.getElementById('product_price');

        product_id.value = selectedValue;
        product_name.value = document.getElementById('product').options[document.getElementById('product').selectedIndex].text;
        product_price.value = product_price.value.replace(/[Rp. ]/g, '');
    });
</script>
<!-- Tambahkan kode JavaScript untuk memicu pop-up pembayaran Snap -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
    var snapToken = '{{ $snapToken ?? '' }}';
    if (snapToken !== '') {
        snap.pay(snapToken, {
            onSuccess: function(result) {
                // Handle ketika pembayaran berhasil
                console.log('Payment successful:', result);
            },
            onPending: function(result) {
                // Handle ketika pembayaran masih tertunda
                console.log('Payment pending:', result);
            },
            onError: function(result) {
                // Handle kesalahan pembayaran
                console.error('Payment error:', result);
            }
        });
    }
});

</script>

</body>
</html>