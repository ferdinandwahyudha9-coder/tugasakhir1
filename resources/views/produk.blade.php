<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Produk - Nand Second</title>
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  margin:0;
  font-family:'Poppins',sans-serif;
  background:#f5f5f5;
  color:#222;
}

a {
  text-decoration:none;
  color:inherit;
}

/* Header */
header {
  background:#fff;
  border-bottom:1px solid #e0e0e0;
  padding:20px 50px;
  display:flex;
  justify-content:space-between;
  align-items:center;
  position:sticky;
  top:0;
  box-shadow:0 2px 8px rgba(0,0,0,0.05);
  z-index:1000;
}

header h1 {
  font-size:1.8rem;
  font-weight:700;
  color:#111;
  letter-spacing:1px;
  cursor: pointer;
}

nav {
  display:flex;
  align-items:center;
  gap:25px;
  flex-wrap:wrap;
}

nav a {
  font-weight:500;
  transition:color 0.3s ease;
  position: relative;
}

nav a:hover {
  color:#555;
}

nav a.active {
  color:#111;
  font-weight:600;
}

nav a.active::after {
  content: "";
  position: absolute;
  bottom: -5px;
  left: 0;
  width: 100%;
  height: 2px;
  background: #111;
}

/* Nav Right */
.nav-right {
  display: flex;
  align-items: center;
  gap: 15px;
}

/* Search box */
.search-box {
  position:relative;
}

.search-box input {
  padding:8px 35px 8px 12px;
  border:1px solid #ddd;
  border-radius:6px;
  font-size:0.9rem;
  transition:0.3s;
  width: 200px;
}

.search-box input:focus {
  outline:none;
  border-color:#aaa;
  width: 250px;
}

.search-box img {
  position:absolute;
  right:10px;
  top:50%;
  transform: translateY(-50%);
  width:18px;
  height:18px;
  opacity:0.6;
  pointer-events: none;
}

/* Icon buttons */
.icon-btn {
  background:transparent;
  border:none;
  cursor:pointer;
  position: relative;
}

.icon-btn img {
  width:26px;
  height:26px;
  transition:transform 0.3s ease;
}

.icon-btn:hover img {
  transform:scale(1.1);
}

.cart-badge {
  position: absolute;
  top: -8px;
  right: -8px;
  background: #ff3b3b;
  color: white;
  border-radius: 50%;
  width: 20px;
  height: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.7rem;
  font-weight: 700;
}

/* User Menu */
.user-menu {
  display: flex;
  align-items: center;
  gap: 10px;
  cursor: pointer;
  padding: 8px 15px;
  border-radius: 8px;
  transition: 0.3s;
  border: 1px solid #e0e0e0;
}

.user-menu:hover {
  background: #f5f5f5;
  border-color: #aaa;
}

.user-avatar {
  width: 35px;
  height: 35px;
  border-radius: 50%;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-weight: 600;
  font-size: 0.9rem;
}

.user-name {
  font-weight: 600;
  font-size: 0.95rem;
  color: #111;
}

.login-btn {
  padding: 10px 25px;
  background: #1e90ff;
  color: white;
  border: none;
  border-radius: 8px;
  font-weight: 600;
  cursor: pointer;
  transition: 0.3s;
  font-size: 0.95rem;
}

.login-btn:hover {
  background: #00bfff;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(30,144,255,0.4);
}

/* Hero Banner */
.hero-banner {
  background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
  color: white;
  padding: 60px 50px;
  text-align: center;
  position: relative;
  overflow: hidden;
}

.hero-banner::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-image: url('images/lctb.jpeg');
  background-size: cover;
  background-position: center;
  opacity: 0.15;
}

.hero-content {
  position: relative;
  z-index: 2;
}

.hero-banner h1 {
  font-size: 3rem;
  margin-bottom: 15px;
  font-weight: 700;
}

.hero-banner p {
  font-size: 1.2rem;
  opacity: 0.9;
}

/* Filter & Sort Section */
.filter-section {
  background: white;
  padding: 25px 50px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 20px;
}

.filter-left {
  display: flex;
  gap: 15px;
  align-items: center;
  flex-wrap: wrap;
}

.filter-btn {
  padding: 10px 20px;
  border: 2px solid #e0e0e0;
  background: white;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 500;
  transition: all 0.3s;
  font-size: 0.9rem;
}

.filter-btn:hover {
  border-color: #aaa;
}

.filter-btn.active {
  background: #111;
  color: white;
  border-color: #111;
}

.sort-select {
  padding: 10px 15px;
  border: 2px solid #e0e0e0;
  border-radius: 8px;
  font-weight: 500;
  cursor: pointer;
  background: white;
  font-size: 0.9rem;
}

.sort-select:focus {
  outline: none;
  border-color: #111;
}

.product-count {
  color: #666;
  font-size: 0.95rem;
}

/* Products Grid */
.produk-container {
  display:grid;
  grid-template-columns:repeat(auto-fill,minmax(280px,1fr));
  gap:30px;
  padding:40px 50px 80px;
  max-width: 1400px;
  margin: 0 auto;
}

.produk-card {
  position:relative;
  overflow:hidden;
  border-radius:12px;
  cursor:pointer;
  background:#fff;
  border:1px solid #eee;
  transition:all 0.3s;
  display: flex;
  flex-direction: column;
}

.produk-card:hover {
  transform:translateY(-10px);
  box-shadow:0 15px 40px rgba(0,0,0,0.15);
}

.produk-image-wrapper {
  position: relative;
  overflow: hidden;
  height: 350px;
}

.produk-card img {
  width:100%;
  height:100%;
  object-fit:cover;
  transition: transform 0.5s ease;
}

.produk-card:hover img {
  transform:scale(1.1);
}

/* Quick View Badge */
.quick-view {
  position: absolute;
  top: 15px;
  right: 15px;
  background: rgba(255,255,255,0.9);
  padding: 8px 12px;
  border-radius: 8px;
  font-size: 0.85rem;
  font-weight: 600;
  opacity: 0;
  transform: translateY(-10px);
  transition: all 0.3s;
}

.produk-card:hover .quick-view {
  opacity: 1;
  transform: translateY(0);
}

/* Product Info */
.produk-info {
  padding: 20px;
  flex: 1;
  display: flex;
  flex-direction: column;
}

.produk-nama {
  font-size: 1.1rem;
  font-weight: 600;
  color: #111;
  margin-bottom: 10px;
  line-height: 1.4;
}

.produk-harga {
  font-size: 1.3rem;
  font-weight: 700;
  color: #10b981;
  margin-bottom: 15px;
}

.produk-actions {
  display: flex;
  gap: 10px;
  margin-top: auto;
}

.btn {
  flex: 1;
  padding: 10px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 600;
  font-size: 0.9rem;
  transition: all 0.3s;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 5px;
}

.btn-cart {
  background: #f3f4f6;
  color: #111;
}

.btn-cart:hover {
  background: #e5e7eb;
  transform: translateY(-2px);
}

.btn-buy {
  background: #111;
  color: white;
}

.btn-buy:hover {
  background: #000;
  transform: translateY(-2px);
  box-shadow: 0 4px 15px rgba(0,0,0,0.3);
}

/* Empty State */
.empty-state {
  text-align: center;
  padding: 80px 20px;
  grid-column: 1 / -1;
}

.empty-state-icon {
  font-size: 5rem;
  margin-bottom: 20px;
  opacity: 0.3;
}

.empty-state h3 {
  font-size: 1.8rem;
  color: #666;
  margin-bottom: 10px;
}

.empty-state p {
  color: #999;
  font-size: 1rem;
}

/* Loading Animation */
.loading {
  text-align: center;
  padding: 60px;
  grid-column: 1 / -1;
}

.spinner {
  border: 4px solid #f3f3f3;
  border-top: 4px solid #111;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  animation: spin 1s linear infinite;
  margin: 0 auto 20px;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Responsive */
@media(max-width:768px){
  header {
    flex-direction: column;
    align-items: flex-start;
    padding: 15px 20px;
  }

  nav {
    width: 100%;
    justify-content: space-between;
  }

  .nav-right {
    width: 100%;
    justify-content: space-between;
    margin-top: 10px;
  }

  .search-box input {
    width: 150px;
  }

  .search-box input:focus {
    width: 100%;
  }

  .hero-banner {
    padding: 40px 20px;
  }

  .hero-banner h1 {
    font-size: 2rem;
  }

  .hero-banner p {
    font-size: 1rem;
  }

  .filter-section {
    padding: 20px;
    flex-direction: column;
    align-items: flex-start;
  }

  .filter-left {
    width: 100%;
  }

  .produk-container {
    padding: 30px 20px;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
  }

  .produk-image-wrapper {
    height: 280px;
  }
}
</style>
</head>
<body>

<header>
  <h1 onclick="window.location.href='index.html'">Nand Second</h1>
  <nav>
    <a href="{{route('beranda')}}">Beranda</a>
    <a href="{{route('produk')}}" class="active">Produk</a>
    <a href="{{route('beranda')}}#story">Sejarah</a>
    <a href="{{ route('beranda') }}#contact">Kontak</a>


    <div class="nav-right">
      <div class="search-box">
        <input type="text" id="searchInput" placeholder="Cari produk...">
        <img src="/images/download.jpg" alt="Search">
      </div>

      <button class="icon-btn" onclick="window.location.href='{{route('keranjang')}}'" title="Keranjang">
        <img src="/images/keranjang.jpg" alt="Keranjang">
        <span class="cart-badge" id="cartBadge">0</span>
      </button>

      <!-- USER MENU - Sama seperti di beranda -->
@auth
  <div class="user-menu" onclick="window.location.href='{{route('profil')}}'" title="Profil Saya">
    <div class="user-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
    <span class="user-name">{{ explode(' ', Auth::user()->name)[0] }}</span>
  </div>
@else
  <button class="login-btn" onclick="window.location.href='{{route('login')}}'">Login</button>
@endauth

  </nav>
</header>

<!-- Hero Banner -->
<section class="hero-banner">
  <div class="hero-content">
    <h1>🔥 Our Collection</h1>
    <p>Temukan style casual football culture yang autentik</p>
  </div>
</section>

<!-- Filter & Sort Section -->
<section class="filter-section">
  <div class="filter-left">
    <button class="filter-btn active" data-filter="all" onclick="filterProducts('all')">
      Semua Produk
    </button>
    <button class="filter-btn" data-filter="new" onclick="filterProducts('new')">
      🆕 Terbaru
    </button>
    <button class="filter-btn" data-filter="popular" onclick="filterProducts('popular')">
      ⭐ Populer
    </button>
    <button class="filter-btn" data-filter="sale" onclick="filterProducts('sale')">
      🔥 Promo
    </button>
  </div>

  <div style="display: flex; gap: 15px; align-items: center;">
    <span class="product-count" id="productCount">Menampilkan 4 produk</span>
    <select class="sort-select" id="sortSelect" onchange="sortProducts()">
      <option value="default">Urutkan</option>
      <option value="name-asc">Nama: A-Z</option>
      <option value="name-desc">Nama: Z-A</option>
      <option value="price-asc">Harga: Terendah</option>
      <option value="price-desc">Harga: Tertinggi</option>
    </select>
  </div>
</section>

<!-- Products Grid -->
<section class="produk-container" id="produkContainer">
  <!-- Products will be rendered here -->
</section>

<script>
// Product Data
const produkList = [
  {
    id:1,
    nama:"MP x LC TRUE BLOOD",
    harga:180000,
    hargaStr:"Rp 180.000",
    image:"/images/tb1.jpeg",
    category: "new",
    label: "New"
  },
  {
    id:2,
    nama:"Lads Club Moscow",
    harga:260000,
    hargaStr:"Rp 260.000",
    image:"/images/lc1.jpeg",
    category: "popular",
    label: "Populer"
  },
  {
    id:3,
    nama:"FNF x PH",
    harga:330000,
    hargaStr:"Rp 330.000",
    image:"/images/bh1.jpeg",
    category: "sale",
    label: "Promo"
  },
  {
    id:4,
    nama:"James Boogie",
    harga:450000,
    hargaStr:"Rp 450.000",
    image:"/images/jb1.jpeg",
    category: "new",
    label: "New"
  }
];

let currentProducts = [...produkList];
let currentFilter = 'all';

// Update cart badge
function updateCartBadge() {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  const badge = document.getElementById('cartBadge');
  badge.textContent = cart.length;
  badge.style.display = cart.length > 0 ? 'flex' : 'none';
}

// Render products
function renderProduk(products) {
  const container = document.getElementById('produkContainer');
  const productCount = document.getElementById('productCount');

  if (products.length === 0) {
    container.innerHTML = `
      <div class="empty-state">
        <div class="empty-state-icon">🔍</div>
        <h3>Produk Tidak Ditemukan</h3>
        <p>Coba kata kunci lain atau reset filter</p>
      </div>
    `;
    productCount.textContent = 'Tidak ada produk';
    return;
  }

  productCount.textContent = `Menampilkan ${products.length} produk`;

  container.innerHTML = '';
  products.forEach(produk => {
    const card = document.createElement('div');
    card.className = 'produk-card';
    card.innerHTML = `
      <div class="produk-image-wrapper">
        <img src="${produk.image}" alt="${produk.nama}" onclick="goToDetail(${produk.id})">
        <div class="quick-view">👁️ Lihat Detail</div>
      </div>
      <div class="produk-info">
        <div class="produk-nama">${produk.nama}</div>
        <div class="produk-harga">${produk.hargaStr}</div>
        <div class="produk-actions">
          <button class="btn btn-cart" onclick="addToCart(${produk.id})">
            🛒 Keranjang
          </button>
          <button class="btn btn-buy" onclick="buyNow(${produk.id})">
            ⚡ Beli
          </button>
        </div>
      </div>
    `;
    container.appendChild(card);
  });
}

// Go to detail
function goToDetail(id) {
  window.location.href = `/detail_produk?id=${id}`;
}

// Add to cart
function addToCart(id) {
  const produk = produkList.find(p => p.id === id);
  let cart = JSON.parse(localStorage.getItem('cart')) || [];

  cart.push({
    id: produk.id,
    name: produk.nama,
    price: produk.harga,
    image: produk.image
  });

  localStorage.setItem('cart', JSON.stringify(cart));
  updateCartBadge();

  alert(`✅ ${produk.nama} ditambahkan ke keranjang!`);
}

// Buy now 
function buyNow(id) {
  const produk = produkList.find(p => p.id === id);
  localStorage.setItem('checkoutItem', JSON.stringify([{
    id: produk.id,
    name: produk.nama,
    price: produk.harga,
    image: produk.image,
    qty: 1
  }]));
  window.location.href = '/checkout';  // Pakai path langsung
}

// Filter products
function filterProducts(category) {
  currentFilter = category;

  document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.classList.remove('active');
  });
  event.target.classList.add('active');

  if (category === 'all') {
    currentProducts = [...produkList];
  } else {
    currentProducts = produkList.filter(p => p.category === category);
  }

  renderProduk(currentProducts);
}

// Sort products
function sortProducts() {
  const sortValue = document.getElementById('sortSelect').value;

  switch(sortValue) {
    case 'name-asc':
      currentProducts.sort((a, b) => a.nama.localeCompare(b.nama));
      break;
    case 'name-desc':
      currentProducts.sort((a, b) => b.nama.localeCompare(a.nama));
      break;
    case 'price-asc':
      currentProducts.sort((a, b) => a.harga - b.harga);
      break;
    case 'price-desc':
      currentProducts.sort((a, b) => b.harga - a.harga);
      break;
    default:
      currentProducts = [...produkList];
  }

  renderProduk(currentProducts);
}

// Search products
const searchInput = document.getElementById('searchInput');
searchInput.addEventListener('input', () => {
  const keyword = searchInput.value.toLowerCase().trim();

  if (keyword === '') {
    currentProducts = currentFilter === 'all'
      ? [...produkList]
      : produkList.filter(p => p.category === currentFilter);
  } else {
    const filtered = produkList.filter(p =>
      p.nama.toLowerCase().includes(keyword)
    );
    currentProducts = filtered;
  }

  renderProduk(currentProducts);
});

// Initialize
updateCartBadge();
renderProduk(produkList);

// Handle URL search params
const urlParams = new URLSearchParams(window.location.search);
const searchQuery = urlParams.get('search');
if (searchQuery) {
  searchInput.value = searchQuery;
  searchInput.dispatchEvent(new Event('input'));
}
</script>

</body>
</html>