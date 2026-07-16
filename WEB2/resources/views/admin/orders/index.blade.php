<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin - Daftar Pesanan</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; margin: 0; padding: 20px; }
        .container { max-width: 1000px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background: #111; color: white; }
        .nav-admin { margin-bottom: 20px; }
        .nav-admin a { margin-right: 15px; text-decoration: none; color: #007bff; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <div class="nav-admin">
        <a href="{{ route('shoes.index') }}">← Kelola Sepatu</a>
        <a href="/">Lihat Toko Depan</a>
    </div>

    <h2>Daftar Pesanan Masuk</h2>

    <table>
        <thead>
            <tr>
                <th>ID Order</th>
                <th>Tanggal</th>
                <th>Nama Pembeli</th>
                <th>No. HP</th>
                <th>Alamat</th>
                <th>Total Belanja</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->customer_phone }}</td>
                <td>{{ $order->customer_address }}</td>
                <td style="font-weight: bold; color: green;">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>