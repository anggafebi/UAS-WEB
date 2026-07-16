<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $shoe->name }} - Nike Store</title>
    
    @vite(['resources/css/app.css', 'resources/css/show.css', 'resources/js/app.js'])
</head>
<body>

<header style="display: flex; justify-content: space-between; align-items: center; padding: 20px 40px; background: #111;">
    <h1 style="margin: 0;">
        <a href="/" style="color: white; text-decoration: none; font-size: 24px; font-weight: bold; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
            Nike Official Store
        </a>
    </h1>
    
    <a href="{{ route('cart.index') }}" style="color: white; text-decoration: none; font-weight: bold; font-family: sans-serif; background: #333; padding: 8px 15px; border-radius: 5px;">
        Lihat Keranjang
    </a>
</header>

<div class="container">
    <div class="product-layout">
        
        <div class="product-image-col">
            <img src="{{ asset($shoe->image_url) }}" ... >
        </div>

        <div class="product-info-col">
            <h1 class="product-title">{{ $shoe->name }}</h1>
            <p class="product-price">Rp {{ number_format($shoe->price, 0, ',', '.') }}</p>
            
            <div class="product-desc">
                {{ $shoe->description ?? 'Belum ada deskripsi untuk produk ini.' }}
            </div>
            
            <div class="stock-status">
                Tersedia: {{ $shoe->stock }} Pasang
            </div>

            <form action="{{ route('cart.add', $shoe->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn-cart" style="width: 100%;">Tambah ke Keranjang</button>
            </form>
            <a href="/" class="btn-back">← Kembali ke Katalog</a>
        </div>

    </div>
</div>

</body>
</html>