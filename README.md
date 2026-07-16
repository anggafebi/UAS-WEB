*Bahasa Pemrograman

1.PHP: Menangani logika backend, pengolahan data, dan autentikasi sistem.

2.HTML5: Membangun kerangka dan struktur antarmuka halaman web.

3.CSS3: Mengatur penataan gaya visual dan tata letak halaman agar responsif.

4.JavaScript: Memberikan interaktivitas dinamis pada sisi klien.

5.SQL: Mengeksekusi kueri untuk interaksi dan manipulasi basis data.


*Framework, Library, & Tools

1.Laravel: Framework PHP utama yang digunakan untuk routing, controller, dan database ORM.

2.Blade Templating: Engine bawaan Laravel untuk merender tampilan antarmuka secara dinamis.

3.MySQL: Sistem Manajemen Basis Data Relasional (RDBMS) untuk menyimpan seluruh data toko dan pengguna.

4.Vite: Bundler aset modern untuk kompilasi CSS dan JS agar situs dimuat lebih cepat.

5.Composer: Manajer dependensi untuk mengelola paket dan pustaka PHP pihak ketiga.


*Fungsi dan Fitur

Sisi User (Pembeli):

1.Katalog Produk Real-time: Menampilkan daftar sepatu beserta harga dan ketersediaan stok terkini.

2.Sistem Keranjang Belanja: Memungkinkan penambahan item, modifikasi kuantitas, dan kalkulasi subtotal serta total belanja secara otomatis.

3.Proses Checkout Terintegrasi: Menangkap data pengiriman (Nama, HP, Alamat) dan memunculkan nota bukti transaksi instan.

4.Pengurangan Stok Otomatis: Sistem langsung memotong ketersediaan barang di database setelah pesanan berhasil diselesaikan.

Sisi Admin (Pengelola):

1.Manajemen CRUD Sepatu: Fasilitas penuh untuk menambah, mengedit detail/harga/stok, serta menghapus produk dari katalog.

2.Pemantauan Pesanan Masuk: Dasbor khusus untuk melihat rekapitulasi transaksi pelanggan beserta detail pengiriman dan nominal belanja.


*Kelebihan Proyek

1.Penyimpanan Keranjang Berbasis Database: Keranjang belanja tidak akan hilang meskipun browser ditutup, karena data disimpan dengan aman di tabel basis data, bukan sekadar session sementara.

2.Struktur Kode Rapi (MVC): Pemisahan yang sangat jelas antara logika (Controller), representasi data (Model), dan antarmuka visual (View).

3.Keamanan Berlapis: Meliputi autentikasi halaman admin, proteksi token CSRF pada setiap formulir, dan pencegahan dari celah Mass Assignment pada model.


*Kekurangan / Bug / Warning

1.Kategori Belum Terhubung: Kolom "Kategori" di panel admin saat ini masih menggunakan karakter placeholder (-) karena tabel dan relasi kategorinya belum diimplementasikan secara utuh di tingkat basis data.

2.Absennya Payment Gateway: Sistem pembayaran masih mengandalkan pencetakan nota untuk pencatatan manual dan belum terhubung dengan verifikasi pihak ketiga (seperti Midtrans atau Xendit).

3.Pembaruan Dasbor Manual: Admin harus memuat ulang (refresh) halaman secara manual untuk mengecek masuknya pesanan baru karena belum terpasang sistem notifikasi real-time.

*Dokumentasi Visual
https://drive.google.com/file/d/1jRvv8C5HbLZ0MpRzWAMpPrAsBb6MgNFM/view?usp=sharing