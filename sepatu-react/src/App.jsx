import { useState, useEffect } from 'react';
import axios from 'axios';

function App() {
  // Tempat penampungan data sepatu
  const [shoes, setShoes] = useState([]);

  // Fungsi yang otomatis berjalan saat halaman pertama kali dibuka
  useEffect(() => {
    // Meminta data JSON ke API Laravel
    axios.get('http://localhost:8000/api/shoes')
      .then((response) => {
        // Jika sukses, masukkan datanya ke penampungan
        setShoes(response.data.data);
      })
      .catch((error) => {
        console.error("Gagal mengambil data:", error);
      });
  }, []);

  return (
    <div style={{ padding: '20px', fontFamily: 'sans-serif' }}>
      <h2>Katalog Sepatu Nike (React Version)</h2>
      
      {/* Menggunakan CSS Grid untuk layout 2 kolom vertikal yang presisi */}
      <div style={{ 
        display: 'grid', 
        gridTemplateColumns: 'repeat(2, 1fr)', 
        gap: '20px', 
        marginTop: '20px' 
      }}>
        
        {/* Melakukan perulangan (looping) data sepatu */}
        {shoes.map((shoe) => (
          <div key={shoe.id} style={{ border: '1px solid #ccc', padding: '15px', borderRadius: '10px', width: '250px' }}>
            {/* Mengambil gambar langsung dari server Laravel */}
            <img 
              src={`http://localhost:8000${shoe.image_url}`} 
              alt={shoe.name} 
              style={{ width: '100%', borderRadius: '8px' }} 
            />
            <h3 style={{ margin: '10px 0 5px 0' }}>{shoe.name}</h3>
            <p style={{ color: '#555', marginBottom: '10px' }}>{shoe.category}</p>
            <p style={{ fontWeight: 'bold', fontSize: '18px', margin: 0 }}>
              Rp {shoe.price.toLocaleString('id-ID')}
            </p>
          </div>
        ))}

      </div>
    </div>
  );
}

export default App;