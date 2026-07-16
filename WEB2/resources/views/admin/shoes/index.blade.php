<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Daftar Sepatu</title>
    
    @vite(['resources/css/admin.css', 'resources/js/app.js'])
</head>
<body>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding: 15px; background: #f8f9fa; border-radius: 8px; border: 1px solid #ddd;">
        
        <!-- BAGIAN KIRI: Menu Navigasi Admin -->
        <div style="display: flex; gap: 15px; align-items: center;">
            <a href="/" style="text-decoration: none; color: #111; font-weight: bold; font-family: sans-serif;">
                &larr; Kembali ke Katalog Utama
            </a>
            
            <span style="color: #ccc;">|</span>

            <!-- TOMBOL UNTUK MELIHAT PESANAN -->
            <a href="{{ route('admin.orders.index') }}" style="text-decoration: none; background: #28a745; color: white; padding: 8px 15px; border-radius: 5px; font-weight: bold; font-family: sans-serif;">
                📋 Daftar Pesanan Masuk
            </a>
        </div>
        
        <!-- BAGIAN KANAN: Tombol Logout -->
        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" style="background: #dc3545; color: white; border: none; padding: 8px 15px; cursor: pointer; border-radius: 5px; font-weight: bold;">
                Logout
            </button>
        </form>
        
    </div>

    <h1>Manajemen Stok Sepatu Nike</h1>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <a href="{{ route('shoes.create') }}" class="btn btn-add">+ Tambah Sepatu Baru</a>

    <table>
        <thead>
            <tr>
                <th>Nama Sepatu</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shoes as $shoe)
            <tr>
                <td>{{ $shoe->name }}</td>
                
                <!-- Kolom Kategori diisi strip agar data di kanannya tidak bergeser -->
                <td>{{ $shoe->category }}</td> 
                
                <td>Rp {{ number_format($shoe->price, 0, ',', '.') }}</td>
                <td>{{ $shoe->stock }}</td>
                <td>
                    <a href="{{ route('shoes.edit', $shoe->id) }}" class="btn btn-edit">Edit</a>
                    
                    <form action="{{ route('shoes.destroy', $shoe->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus sepatu ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>