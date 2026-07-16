<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Nike Store</title>
    @vite(['resources/css/admin.css', 'resources/js/app.js'])
    <style>
        /* Sedikit tambahan agar form berada persis di tengah layar */
        body { display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .alert-error { color: #dc3545; background: #f8d7da; padding: 10px; border-radius: 4px; margin-bottom: 15px; text-align: center; }
    </style>
</head>
<body>

<div class="form-container">
    <h2 style="text-align: center;">Login Area</h2>
    
    @if($errors->any())
        <div class="alert-error">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Alamat Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit" class="btn-submit" style="background-color: #111;">Masuk</button>
    </form>
    <div style="text-align: center; margin-top: 15px;">
        <a href="/" style="color: #666; text-decoration: none;">&larr; Kembali ke Toko</a>
    </div>
</div>

</body>
</html>