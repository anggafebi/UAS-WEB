<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Sepatu</title>
    
    @vite(['resources/css/admin.css', 'resources/js/app.js'])
</head>
<body>

<div class="form-container">
    <h2>Edit Data Sepatu</h2>
    
    <form action="{{ route('shoes.update', $shoe->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Nama Sepatu</label>
            <input type="text" name="name" value="{{ $shoe->name }}" required>
        </div>
        
        <div class="form-group">
            <label>Kategori Sepatu</label>
            <select name="category" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                <option value="Lifestyle" {{ $shoe->category == 'Lifestyle' ? 'selected' : '' }}>Lifestyle</option>
                <option value="Running" {{ $shoe->category == 'Running' ? 'selected' : '' }}>Running</option>
                <option value="Basketball" {{ $shoe->category == 'Basketball' ? 'selected' : '' }}>Basketball</option>
                <option value="Football" {{ $shoe->category == 'Football' ? 'selected' : '' }}>Football</option>
                <option value="Training" {{ $shoe->category == 'Training' ? 'selected' : '' }}>Training</option>
            </select>
        </div>

        <div class="form-group">
            <label>Harga (Rp)</label>
            <input type="number" name="price" value="{{ $shoe->price }}" required>
        </div>
        
        <div class="form-group">
            <label>Jumlah Stok</label>
            <input type="number" name="stock" value="{{ $shoe->stock }}" required>
        </div>
        
        <div class="form-group">
            <label>Ganti Gambar Sepatu (Opsional)</label>
            <small style="color: #666; display: block; margin-bottom: 8px;">*Biarkan kosong jika tidak ingin mengganti gambar.</small>
            <input type="file" name="image_file" accept="image/png, image/jpeg, image/jpg">
        </div>
        
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="4">{{ $shoe->description }}</textarea>
        </div>
        
        <button type="submit" class="btn-update">Update Data Sepatu</button>
    </form>
</div>

</body>
</html>