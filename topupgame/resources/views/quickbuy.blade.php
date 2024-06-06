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
        data-client-key="SB-Mid-client-HBZnyp6lCehdke1N"></script>
</head>
<body>
    <div class="container box mt-5 p-5">
        <a href="{{ url('/') }}" class="btn btn-primary mb-3">Back to Home</a>
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
            <form id="payment-form"  method="POST">
    @csrf
    <input type="hidden" name="payment_type" id="payment_type" value="snap">
    <input type="hidden" name="snap_token" id="snap_token">
    <form action="{{ route('quickbuy.purchase', ['id_game' => $game->id_game]) }}" method="POST" id="payment-form">
    @csrf
    <input type="hidden" name="snap_token" id="snap_token">

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
    
    <button type="button" id="pay-button" class="btn btn-success">Beli Sekarang</button>
</form>



        </div>
    </div>

    <script>
    document.getElementById('pay-button').onclick = function() {
        let userId = document.getElementById('userId').value.trim();
        let zoneId = document.getElementById('zoneId').value.trim();
        let quantity = document.getElementById('quantity').value.trim();

        if (!userId || !zoneId || !quantity) {
            alert("Please fill out all required fields.");
            return;
        }

        const selectedProduct = document.getElementById('product');
        const selectedOption = selectedProduct.options[selectedProduct.selectedIndex];
        const price = selectedOption.getAttribute('data-price');
        const productId = selectedProduct.value;

        fetch('{{ url('/get-snap-token') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                user_id: userId,
                zone_id: zoneId,
                note: document.getElementById('note').value,
                quantity: quantity,
                product_id: productId,
                product_price: price,
                game_id: '{{ $game->id_game }}'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.token) {
                snap.pay(data.token, {
                    onSuccess: function(result) {
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
