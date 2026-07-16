<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Sepatu Baru</title>
    
    @vite(['resources/css/admin.css', 'resources/js/app.js'])
</head>
<body>

<div class="form-container">
    <h2>Tambah Sepatu Nike Baru</h2>
    
    <form action="{{ route('shoes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Sepatu</label>
            <input type="text" name="name" required>
        </div>
        <div class="form-group">
            <label>Kategori Sepatu</label>
            <select name="category" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                <option value="Lifestyle">Lifestyle</option>
                <option value="Running">Running</option>
                <option value="Basketball">Basketball</option>
                <option value="Football">Football</option>
                <option value="Training">Training</option>
            </select>
        </div>
        <div class="form-group">
            <label>Harga (Rp)</label>
            <input type="number" name="price" required>
        </div>
        <div class="form-group">
            <label>Jumlah Stok</label>
            <input type="number" name="stock" required>
        </div>
        <div class="form-group">
            <label>Unggah Gambar Sepatu (JPG/PNG)</label>
            <input type="file" name="image_file" accept="image/png, image/jpeg, image/jpg" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="4"></textarea>
        </div>
        <button type="submit" class="btn-submit">Simpan Sepatu</button>
    </form>
</div>

</body>
</html>