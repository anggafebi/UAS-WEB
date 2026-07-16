<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun Baru - Nike Store</title>
    @vite(['resources/css/admin.css', 'resources/js/app.js'])
    <style>
        body { display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .alert-error { color: #dc3545; background: #f8d7da; padding: 10px; border-radius: 4px; margin-bottom: 15px; text-align: left; }
    </style>
</head>
<body>

<div class="form-container">
    <h2 style="text-align: center;">Daftar Akun Baru</h2>
    
    @if($errors->any())
        <div class="alert-error">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.process') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus>
        </div>
        <div class="form-group">
            <label>Alamat Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label>Password (Minimal 8 karakter)</label>
            <input type="password" name="password" required>
        </div>
        <div class="form-group">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required>
        </div>
        
        <button type="submit" class="btn-submit" style="background-color: #111;">Daftar Sekarang</button>
    </form>
    
    <div style="text-align: center; margin-top: 15px;">
        <span style="color: #666;">Sudah punya akun?</span> 
        <a href="{{ route('login') }}" style="color: #111; text-decoration: underline; font-weight: bold;">Login di sini</a>
    </div>
    <div style="text-align: center; margin-top: 10px;">
        <a href="/" style="color: #666; text-decoration: none;">&larr; Kembali ke Toko</a>
    </div>
</div>

</body>
</html>