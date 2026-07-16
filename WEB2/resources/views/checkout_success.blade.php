<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian #{{ $order->id }} - Nike Store</title>
    <style>
        body { font-family: 'Helvetica Neue', Arial, sans-serif; color: #111; background: #f8f9fa; margin: 0; padding: 40px 20px; }
        .invoice-card { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .header { border-bottom: 2px dashed #eee; padding-bottom: 20px; margin-bottom: 20px; text-align: center; }
        .header h1 { margin: 0 0 5px 0; font-size: 22px; }
        .status-badge { display: inline-block; background: #28a745; color: white; padding: 5px 15px; border-radius: 20px; font-size: 12px; font-weight: bold; margin-top: 10px; }
        .info-section { margin-bottom: 20px; font-size: 14px; line-height: 1.6; }
        .info-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .info-table th { text-align: left; padding: 10px; background: #f8f9fa; font-size: 14px; }
        .info-table td { padding: 12px 10px; border-bottom: 1px solid #eee; font-size: 14px; }
        .total-row { font-weight: bold; font-size: 16px; background: #f8f9fa; }
        .btn-home { display: block; text-align: center; background: #111; color: white; padding: 12px; text-decoration: none; border-radius: 30px; font-weight: 500; font-size: 14px; margin-top: 30px; }
        .btn-home:hover { background: #333; }
    </style>
</head>
<body>

<div class="invoice-card">
    <div class="header">
        <h1>Nike Official Store</h1>
        <p style="color: #707072; margin: 0; font-size: 14px;">Bukti Pembayaran Sah</p>
        <span class="status-badge">PESANAN BERHASIL</span>
    </div>

    <div class="info-section">
        <strong>Nomor Invoice :</strong> #{{ $order->id }}<br>
        <strong>Tanggal Waktu  :</strong> {{ $order->created_at->format('d M Y, H:i') }} WIB<br>
        <strong>Nama Pembeli  :</strong> {{ $order->customer_name }}<br>
        <strong>No. Handphone :</strong> {{ $order->customer_phone }}<br>
        <strong>Alamat Tujuan :</strong> {{ $order->customer_address }}
    </div>

    <table class="info-table">
        <thead>
            <tr>
                <th>Item Sepatu</th>
                <th style="text-align: center;">Jml</th>
                <th style="text-align: right;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderItems as $item)
            <tr>
                <td>{{ $item->shoe_name }}</td>
                <td style="text-align: center;">{{ $item->quantity }}</td>
                <td style="text-align: right;">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
            </tr>
            @endforeach
            <tr class="total-row">
                <td colspan="2">TOTAL YANG DIBAYAR</td>
                <td style="text-align: right; color: #d90429;">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <a href="/" class="btn-home">Kembali ke Toko Utama</a>
</div>

</body>
</html>