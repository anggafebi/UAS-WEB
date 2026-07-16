<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - Nike Store</title>

    @vite(['resources/css/app.css', 'resources/css/cart.css', 'resources/js/app.js'])
</head>
<body>

<header style="display: flex; justify-content: space-between; align-items: center; padding: 20px 40px; background: #111;">
    <h1 style="margin: 0;">
        <a href="/" style="color: white; text-decoration: none; font-size: 24px; font-weight: bold; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
            Nike Official Store
        </a>
    </h1>
</header>

<div class="container" style="max-width: 1000px; margin: 0 auto; padding: 30px 20px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
    
    <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 25px; border-bottom: 2px solid #eee; padding-bottom: 10px;">
        Keranjang Belanja Anda
    </h2>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    @if(isset($cart) && !$cart->isEmpty())
        <table>
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                
                @foreach($cart as $item)
                    @php $subtotal = $item->shoe->price * $item->quantity; @endphp
                    @php $total += $subtotal; @endphp
                    <tr>
                        <td>
                            <img src="{{ asset($item->shoe->image_url) }}" class="img-fluid" style="width: 80px;">
                        </td>
                        <td><strong>{{ $item->shoe->name }}</strong></td>
                        <td>Rp {{ number_format($item->shoe->price, 0, ',', '.') }}</td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <form action="{{ route('cart.decrement', $item->id) }}" method="POST" style="margin: 0;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" style="width: 30px; height: 30px; background: #ddd; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">-</button>
                                </form>
                                
                                <span style="font-weight: bold; width: 20px; text-align: center;">{{ $item->quantity }}</span>
                                
                                <form action="{{ route('cart.increment', $item->id) }}" method="POST" style="margin: 0;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" style="width: 30px; height: 30px; background: #111; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">+</button>
                                </form>
                            </div>
                        </td>
                        <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total-container">
            <p>Total Pembayaran:</p>
            <div class="total-price">Rp {{ number_format($total, 0, ',', '.') }}</div>
            <br>
            <a href="/" class="btn btn-back">Lanjut Belanja</a>
            <a href="{{ route('checkout.index') }}" class="btn btn-checkout">Proses ke Checkout</a>
        </div>
    @else
        <div class="empty-cart">
            <p>Keranjang belanja Anda masih kosong.</p>
            <a href="/" class="btn btn-back">Mulai Belanja</a>
        </div>
    @endif
</div>

</body>
</html>