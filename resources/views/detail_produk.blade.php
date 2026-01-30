<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Produk - Nand Second</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  min-height: 100vh;
  color: #222;
  padding-bottom: 40px;
}

/* Header */
header {
  background: rgba(255, 255, 255, 0.98);
  backdrop-filter: blur(10px);
  border-bottom: 1px solid rgba(0, 0, 0, 0.08);
  padding: 20px 50px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: sticky;
  top: 0;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
  z-index: 100;
  animation: slideDown 0.5s ease;
}

@keyframes slideDown {
  from {
    transform: translateY(-100%);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

header h1 {
  font-size: 1.8rem;
  font-weight: 700;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  letter-spacing: 0.5px;
}

nav {
  display: flex;
  align-items: center;
  gap: 25px;
}

nav a {
  text-decoration: none;
  color: #222;
  font-weight: 500;
  font-size: 1rem;
  transition: all 0.3s ease;
  position: relative;
}

nav a::after {
  content: '';
  position: absolute;
  bottom: -5px;
  left: 0;
  width: 0;
  height: 2px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  transition: width 0.3s ease;
}

nav a:hover::after {
  width: 100%;
}

nav a:hover {
  color: #667eea;
}

.container {
  max-width: 1200px;
  margin: 50px auto;
  background: #fff;
  padding: 50px;
  border-radius: 20px;
  box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
  display: flex;
  flex-wrap: wrap;
  gap: 60px;
  animation: fadeInUp 0.6s ease;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Product Images Section */
.product-images {
  flex: 1 1 500px;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.main-image-wrapper {
  position: relative;
  width: 100%;
  aspect-ratio: 1;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
  background: #f5f5f5;
}

.main-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
  cursor: zoom-in;
}

.main-image:hover {
  transform: scale(1.05);
}

.image-badge {
  position: absolute;
  top: 20px;
  right: 20px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: #fff;
  padding: 8px 16px;
  border-radius: 20px;
  font-size: 0.85rem;
  font-weight: 600;
  box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
}

.thumbnails {
  display: flex;
  gap: 15px;
  flex-wrap: wrap;
}

.thumbnails img {
  width: 100px;
  height: 100px;
  object-fit: cover;
  border-radius: 12px;
  cursor: pointer;
  border: 3px solid #e0e0e0;
  transition: all 0.3s ease;
  opacity: 0.7;
}

.thumbnails img:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
  opacity: 1;
}

.thumbnails img.active {
  border-color: #667eea;
  opacity: 1;
  box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.2);
}

/* Product Info Section */
.product-info {
  flex: 1 1 450px;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
}

.product-title {
  font-size: 2.2rem;
  font-weight: 700;
  margin-bottom: 15px;
  color: #111;
  line-height: 1.3;
  animation: slideInRight 0.6s ease;
}

@keyframes slideInRight {
  from {
    opacity: 0;
    transform: translateX(30px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.product-rating {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 20px;
  animation: slideInRight 0.7s ease;
}

.stars {
  color: #ffc107;
  font-size: 1.1rem;
}

.rating-text {
  color: #666;
  font-size: 0.9rem;
}

.price-section {
  background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
  padding: 20px 25px;
  border-radius: 15px;
  margin-bottom: 25px;
  animation: slideInRight 0.8s ease;
}

.price {
  font-size: 2rem;
  font-weight: 700;
  color: #667eea;
  margin-bottom: 5px;
}

.price-label {
  font-size: 0.85rem;
  color: #666;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.condition-badge {
  display: inline-block;
  background: #4caf50;
  color: #fff;
  padding: 6px 14px;
  border-radius: 20px;
  font-size: 0.85rem;
  font-weight: 600;
  margin-top: 10px;
}

.description-section {
  margin-bottom: 30px;
  animation: slideInRight 0.9s ease;
}

.section-title {
  font-size: 1.1rem;
  font-weight: 600;
  color: #111;
  margin-bottom: 12px;
  position: relative;
  padding-bottom: 8px;
}

.section-title::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 50px;
  height: 3px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border-radius: 2px;
}

.description {
  color: #555;
  font-size: 1rem;
  line-height: 1.7;
}

.features-list {
  list-style: none;
  margin-top: 15px;
}

.features-list li {
  padding: 8px 0;
  color: #666;
  position: relative;
  padding-left: 25px;
}

.features-list li::before {
  content: '✓';
  position: absolute;
  left: 0;
  color: #4caf50;
  font-weight: bold;
  font-size: 1.1rem;
}

.action-buttons {
  display: flex;
  gap: 15px;
  margin-bottom: 25px;
  animation: slideInRight 1s ease;
}

.icon-btn {
  background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
  border: 2px solid #e0e0e0;
  cursor: pointer;
  padding: 14px 18px;
  border-radius: 12px;
  font-size: 1.5rem;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.icon-btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 20px rgba(102, 126, 234, 0.3);
  border-color: #667eea;
  background: #fff;
}

.buy-btn {
  flex: 1;
  padding: 16px 32px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: #fff;
  border-radius: 12px;
  border: none;
  cursor: pointer;
  font-size: 1.05rem;
  font-weight: 600;
  transition: all 0.3s ease;
  box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
  text-transform: uppercase;
  letter-spacing: 1px;
}

.buy-btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 12px 30px rgba(102, 126, 234, 0.4);
}

.buy-btn:active {
  transform: translateY(-1px);
}

.divider {
  height: 2px;
  background: linear-gradient(90deg, transparent, #e0e0e0, transparent);
  margin: 25px 0;
  border: none;
}

.back-link {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  text-decoration: none;
  color: #667eea;
  font-weight: 500;
  transition: all 0.3s ease;
  font-size: 1rem;
}

.back-link:hover {
  color: #764ba2;
  transform: translateX(-5px);
}

.info-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
  margin-bottom: 25px;
  animation: slideInRight 1.1s ease;
}

.info-item {
  background: #f9f9f9;
  padding: 15px;
  border-radius: 10px;
  border-left: 4px solid #667eea;
}

.info-label {
  font-size: 0.85rem;
  color: #666;
  margin-bottom: 5px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.info-value {
  font-size: 1rem;
  font-weight: 600;
  color: #111;
}

.loading {
  display: inline-block;
  width: 18px;
  height: 18px;
  border: 3px solid rgba(255, 255, 255, 0.3);
  border-radius: 50%;
  border-top-color: #fff;
  animation: spin 0.8s linear infinite;
  margin-right: 8px;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}

.not-found {
  text-align: center;
  padding: 100px 20px;
}

.not-found-icon {
  font-size: 6rem;
  margin-bottom: 25px;
  opacity: 0.2;
}

.not-found h2 {
  font-size: 2rem;
  margin-bottom: 15px;
  color: #333;
}

.not-found p {
  color: #666;
  margin-bottom: 30px;
  font-size: 1.1rem;
}

@media (max-width: 768px) {
  header {
    padding: 15px 20px;
    flex-direction: column;
    gap: 15px;
  }

  header h1 {
    font-size: 1.5rem;
  }

  .container {
    margin: 30px 20px;
    padding: 30px 20px;
    gap: 30px;
  }

  .product-title {
    font-size: 1.7rem;
  }

  .price {
    font-size: 1.6rem;
  }

  .thumbnails img {
    width: 70px;
    height: 70px;
  }

  .action-buttons {
    flex-direction: column;
  }

  .icon-btn {
    width: 100%;
  }

  .info-grid {
    grid-template-columns: 1fr;
  }
}
</style>
</head>
<body>

<header>
  <h1>Nand Second</h1>
  <nav>
    <a href="{{route('beranda')}}">Beranda</a>
    <a href="{{route('produk')}}">Produk</a>
    <a href="{{route('keranjang')}}">Keranjang</a>
  </nav>
</header>

<div class="container" id="mainContainer">
  <div class="product-images">
    <div class="main-image-wrapper">
      <img id="mainImage" class="main-image" src="" alt="Produk">
      <div class="image-badge">📸 Foto Asli</div>
    </div>
    <div class="thumbnails" id="thumbnails"></div>
  </div>

  <div class="product-info">
    <h1 class="product-title" id="produkNama"></h1>

    <div class="product-rating">
      <span class="stars">⭐⭐⭐⭐⭐</span>
      <span class="rating-text">(4.8/5)</span>
    </div>

    <div class="price-section">
      <div class="price-label">Harga</div>
      <div class="price" id="produkHarga"></div>
      <div class="condition-badge" id="conditionBadge">✓ Kondisi Bagus</div>
    </div>

    <div class="description-section">
      <h3 class="section-title">Deskripsi Produk</h3>
      <p class="description" id="produkDeskripsi"></p>
      <ul class="features-list">
        <li>Produk original & terjamin kualitas</li>
        <li>Sudah dicek dan dibersihkan</li>
        <li>Ready stock & siap kirim</li>
      </ul>
    </div>

    <div class="info-grid">
      <div class="info-item">
        <div class="info-label">Kategori</div>
        <div class="info-value">Pakaian Second</div>
      </div>
      <div class="info-item">
        <div class="info-label">Status</div>
        <div class="info-value">Tersedia</div>
      </div>
    </div>

    <div class="action-buttons">
      <button class="icon-btn" id="addToBagBtn" title="Tambah ke Keranjang">🛒</button>
      <button class="buy-btn" id="buyNowBtn">
        💳 Beli Sekarang
      </button>
    </div>

    <hr class="divider">
    <a href="{{route('produk')}}" class="back-link">
      ← Kembali ke Produk
    </a>
  </div>
</div>

<script>
const produkList = [
  {id:1, nama:"MP x LC True Blood", deskripsi:"Used Like New VVGC - Kondisi sangat baik, nyaris seperti baru. Tidak ada cacat atau kerusakan berarti.", harga:180000, hargaStr:"Rp 180.000", images:["/images/tb1.jpeg","/images/tb2.jpeg","/images/tb3.jpeg"]},
  {id:2, nama:"Lads Club", deskripsi:"Used 1x VVGC - Baru dipakai sekali, kondisi masih sangat prima. Seperti baru dari toko.", harga:260000, hargaStr:"Rp 260.000", images:["/images/lc1.jpeg","/images/lc2.jpeg","/images/lc3.jpeg"]},
  {id:3, nama:"FNF x PH", deskripsi:"Used Conditions - Kondisi bekas pakai normal, masih layak dan nyaman digunakan.", harga:330000, hargaStr:"Rp 330.000", images:["/images/bh1.jpeg","/images/bh2.jpeg","/images/bh3.jpeg"]},
  {id:4, nama:"James Boogie", deskripsi:"With Minus Drop Color - Ada sedikit luntur warna, namun tidak mengurangi kualitas dan kenyamanan produk.", harga:450000, hargaStr:"Rp 450.000", images:["/images/jb1.jpeg","/images/jb3.jpeg"]}
];

const params = new URLSearchParams(window.location.search);
const id = parseInt(params.get('id'));
const produk = produkList.find(p => p.id === id);

if (produk) {
  const mainImage = document.getElementById('mainImage');
  const thumbnailsDiv = document.getElementById('thumbnails');

  mainImage.src = produk.images[0];

  // Generate thumbnails
  produk.images.forEach((imgSrc, idx) => {
    const thumb = document.createElement('img');
    thumb.src = imgSrc;
    if (idx === 0) thumb.classList.add('active');
    thumb.onclick = () => {
      mainImage.src = imgSrc;
      thumbnailsDiv.querySelectorAll('img').forEach(t => t.classList.remove('active'));
      thumb.classList.add('active');
    };
    thumbnailsDiv.appendChild(thumb);
  });

  // Set product details
  document.getElementById('produkNama').textContent = produk.nama;
  document.getElementById('produkDeskripsi').textContent = produk.deskripsi;
  document.getElementById('produkHarga').textContent = produk.hargaStr;

  // Add to cart functionality
  document.getElementById('addToBagBtn').onclick = () => {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Check if item already exists in cart
    const existingIndex = cart.findIndex(item => item.name === produk.nama);

    if (existingIndex >= 0) {
      cart[existingIndex].qty = (cart[existingIndex].qty || 1) + 1;
    } else {
      cart.push({
        name: produk.nama,
        price: produk.harga,
        qty: 1,
        image: produk.images[0]
      });
    }

    localStorage.setItem('cart', JSON.stringify(cart));

    const btn = document.getElementById('addToBagBtn');
    const originalContent = btn.innerHTML;
    btn.innerHTML = '✓';
    btn.style.background = 'linear-gradient(135deg, #4caf50 0%, #45a049 100%)';
    btn.style.color = '#fff';
    btn.style.borderColor = '#4caf50';

    setTimeout(() => {
      btn.innerHTML = originalContent;
      btn.style.background = '';
      btn.style.color = '';
      btn.style.borderColor = '';
      alert(`✓ ${produk.nama} telah ditambahkan ke keranjang!`);
    }, 1000);
  };

  // Buy now functionality
  document.getElementById('buyNowBtn').onclick = () => {
    const btn = document.getElementById('buyNowBtn');
    btn.innerHTML = '<span class="loading"></span> Memproses...';
    btn.disabled = true;

    setTimeout(() => {
      localStorage.setItem('checkoutItem', JSON.stringify([{
        name: produk.nama,
        price: produk.harga,
        qty: 1,
        image: produk.images[0]
      }]));
      window.location.href = '{{route("checkout")}}';
    }, 800);
  };

} else {
  // Product not found
  document.getElementById('mainContainer').innerHTML = `
    <div class="not-found">
      <div class="not-found-icon">🔍</div>
      <h2>Produk Tidak Ditemukan</h2>
      <p>Maaf, produk yang Anda cari tidak tersedia</p>
      <a href="{{route('produk')}}" class="buy-btn" style="display: inline-block; text-decoration: none;">
        Kembali ke Produk
      </a>
    </div>
  `;
}
</script>

</body>
</html>
