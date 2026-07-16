<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nike Store - Katalog Utama</title>
    
    @vite(['resources/css/home.css', 'resources/js/app.js'])
</head>
<body>

<header>
    <h1><a href="/">Nike Official Store</a></h1>
    
    <div class="header-nav">
        @auth
            <span style="color: white;">Halo, {{ auth()->user()->name }}!</span>
            
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('shoes.index') }}" class="btn-header" style="background: #28a745;">Panel Admin</a>
            @endif
            
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-header" style="background: #dc3545;">Logout</button>
            </form>
        @endauth

        @guest
            <a href="{{ route('login') }}" class="btn-header" style="background: white; color: #111;">Login</a>
            <a href="{{ route('register') }}" class="btn-header" style="background: transparent; border: 1px solid white;">Daftar</a>
        @endguest
    </div>
</header>

<div class="container">
    <h2 class="page-title">Koleksi Terbaru</h2>
    
    <div class="filter-container">
        <a href="/" class="btn-filter {{ !request('category') ? 'active' : '' }}">Semua</a>
        <a href="/?category=Lifestyle" class="btn-filter {{ request('category') == 'Lifestyle' ? 'active' : '' }}">Lifestyle</a>
        <a href="/?category=Running" class="btn-filter {{ request('category') == 'Running' ? 'active' : '' }}">Running</a>
        <a href="/?category=Basketball" class="btn-filter {{ request('category') == 'Basketball' ? 'active' : '' }}">Basketball</a>
        <a href="/?category=Football" class="btn-filter {{ request('category') == 'Football' ? 'active' : '' }}">Football</a>
    </div>

    <div class="grid">
        @foreach($shoes as $shoe)
            <div class="card">
                <div class="image-wrapper">
                    <img src="{{ asset($shoe->image_url) }}" alt="{{ $shoe->name }}">
                </div>
                <h3>{{ $shoe->name }}</h3>
                <p class="price">Rp {{ number_format($shoe->price, 0, ',', '.') }}</p>
                <a href="{{ route('shoe.show', $shoe->id) }}" class="btn-action">Lihat Detail</a>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>