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
            padding: 1rem;
            border-radius: 5px;
        }
        .order-info h5 {
            margin-bottom: 1rem;
        }
        body{
            background: linear-gradient(#1F2544,#474F7A,#81689D);
            height: 100vh;
            margin: 0;
        }
        .box {
            background:  #fff5;
            padding: 3rem;
            border-radius: 10px;
            backdrop-filter: blur(7px);
        }
    </style>
    <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-PtWwnPya47G5ddgV"></script>
</head>
<body>
    <div class="container box mt-5 p-5">
        <div class="game-info mb-3">
            <img src="{{ asset('uploads/game/' . $game->image) }}" class="game-image" alt="{{ $game->name }}">
            <h1>Quick Buy - {{ $game->name }}</h1>
        </div>

        <div class="dropdown-container mb-3">
            <div class="mb-3">
                <label for="product" class="form-label"><strong>Produk</strong></label>
                <select id="product" class="form-select">
    @foreach($topups as $topup)
        <option value="{{ $topup->ID_TOPUP }}" data-price="{{ $topup->harga_topup }}">{{ $topup->Nama_topup }} - Rp{{ number_format($topup->harga_topup, 0, ',', '.') }}</option>
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

    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
    fetch('{{ url('/get-snap-token') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            user_id: document.getElementById('userId').value,
            zone_id: document.getElementById('zoneId').value,
            note: document.getElementById('note').value,
            quantity: document.getElementById('quantity').value,
            product_id: document.getElementById('product').value,
            product_price: document.querySelector('#product option:checked').getAttribute('data-price'),
            game_id: '{{ $game->id_game }}'
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.token) {
            snap.pay(data.token, {
                onSuccess: function(result) {
                    alert("Payment successful!");
                    document.getElementById('snap_token').value = data.token;
                    document.getElementById('payment-form').submit();
                },
                onPending: function(result) {
                    alert("Payment pending!");
                },
                onError: function(result) {
                    alert("Payment failed!");
                },
                onClose: function() {
                    alert("You closed the popup without finishing the payment");
                }
            });
        }
    })
    .catch(error => console.error('Error:', error));
};
    </script>
</body>
</html>
