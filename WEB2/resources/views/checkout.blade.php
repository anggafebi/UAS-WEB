<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Pesanan - Nike Store</title>

    @vite(['resources/css/app.css', 'resources/css/checkout.css', 'resources/js/app.js'])
</head>
<body>

<header>
    <h2><a href="/">Nike Official Store</a></h2>
</header>

<div class="container">
    <h2>Selesaikan Pesanan Anda</h2>
    
    <div class="checkout-layout">
        <div class="form-col">
            <h3>Informasi Pengiriman</h3>
            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" required placeholder="Contoh: Budi Santoso">
                </div>
                <div class="form-group">
                    <label>Nomor WhatsApp / HP</label>
                    <input type="text" name="phone" required placeholder="Contoh: 08123456789">
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap Pengiriman</label>
                    <textarea name="address" rows="4" required placeholder="Nama Jalan, RT/RW, Kelurahan, Kecamatan, Kota..."></textarea>
                </div>
                <button type="submit" class="btn-submit">Selesaikan Pembayaran</button>
            </form>
        </div>

        <div class="summary-col">
            <h3>Ringkasan Pesanan</h3>
            @php $total = 0; @endphp
            @foreach($cart as $item)
                @php 
                    $subtotal = $item->shoe->price * $item->quantity; 
                    $total += $subtotal; 
                @endphp
                <div class="summary-item">
                    <div>
                        <strong>{{ $item->shoe->name }}</strong><br>
                        <small>{{ $item->quantity }} x Rp {{ number_format($item->shoe->price, 0, ',', '.') }}</small>
                    </div>
                    <div>
                        <strong>Rp {{ number_format($subtotal, 0, ',', '.') }}</strong>
                    </div>
                </div>
            @endforeach
            <div class="total-price">
                Total: Rp {{ number_format($total, 0, ',', '.') }}
            </div>
        </div>
    </div>
</div>

</body>
</html>