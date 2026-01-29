<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Keranjang - Nand Second</title>
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

/* Search Box */
.search-box {
  display: flex;
  align-items: center;
  background: #f5f5f5;
  border: 2px solid #e0e0e0;
  border-radius: 25px;
  padding: 8px 15px;
  transition: all 0.3s ease;
}

.search-box:focus-within {
  border-color: #667eea;
  background: #fff;
  box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
}

.search-box input {
  border: none;
  outline: none;
  background: transparent;
  padding: 5px 10px;
  width: 200px;
  font-size: 0.95rem;
  font-family: 'Poppins', sans-serif;
}

.search-box::before {
  content: '🔍';
  font-size: 1.1rem;
  margin-right: 5px;
}

/* Icon keranjang */
.icon-btn {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border: none;
  cursor: pointer;
  padding: 10px 15px;
  border-radius: 50%;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
  position: relative;
}

.icon-btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
}

.icon-btn::before {
  content: '🛒';
  font-size: 1.3rem;
}

/* Kontainer utama */
.container {
  max-width: 1100px;
  margin: 50px auto;
  background: #fff;
  padding: 40px;
  border-radius: 20px;
  box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
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

.page-title {
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 30px;
  color: #111;
  position: relative;
  padding-bottom: 15px;
}

.page-title::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 80px;
  height: 4px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border-radius: 2px;
}

/* Table Styles */
.table-wrapper {
  overflow-x: auto;
  margin-bottom: 30px;
  border-radius: 12px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

table {
  width: 100%;
  border-collapse: collapse;
  background: #fff;
}

thead {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

th {
  padding: 16px;
  text-align: left;
  color: #fff;
  font-weight: 600;
  font-size: 0.95rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

td {
  padding: 18px 16px;
  border-bottom: 1px solid #f0f0f0;
  font-size: 0.95rem;
}

tbody tr {
  transition: all 0.3s ease;
  animation: slideIn 0.5s ease forwards;
  opacity: 0;
}

@keyframes slideIn {
  to {
    opacity: 1;
  }
}

tbody tr:hover {
  background: #f9f9f9;
  transform: scale(1.01);
}

.product-name {
  font-weight: 600;
  color: #111;
}

.product-price {
  color: #667eea;
  font-weight: 600;
}

/* Quantity Input */
.qty-input {
  width: 70px;
  padding: 8px 12px;
  border: 2px solid #e0e0e0;
  border-radius: 8px;
  font-size: 0.95rem;
  font-family: 'Poppins', sans-serif;
  text-align: center;
  transition: all 0.3s ease;
}

.qty-input:focus {
  outline: none;
  border-color: #667eea;
  box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

/* Buttons */
.btn {
  display: inline-block;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: #fff;
  padding: 12px 24px;
  border-radius: 10px;
  text-decoration: none;
  font-size: 0.95rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  border: none;
  box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
}

.btn-delete {
  background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
  padding: 8px 16px;
  font-size: 0.85rem;
  box-shadow: 0 4px 15px rgba(245, 87, 108, 0.3);
}

.btn-delete:hover {
  box-shadow: 0 6px 20px rgba(245, 87, 108, 0.4);
}

.btn-checkout {
  padding: 16px 40px;
  font-size: 1.1rem;
  margin-top: 20px;
}

/* Summary Section */
.cart-summary {
  background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
  padding: 25px;
  border-radius: 15px;
  margin-bottom: 25px;
}

.summary-row {
  display: flex;
  justify-content: space-between;
  margin-bottom: 15px;
  font-size: 1rem;
  color: #555;
}

.summary-row.total {
  font-size: 1.5rem;
  font-weight: 700;
  color: #111;
  padding-top: 15px;
  border-top: 2px solid rgba(0, 0, 0, 0.1);
  margin-bottom: 0;
}

.summary-row .label {
  font-weight: 500;
}

.summary-row .value {
  font-weight: 600;
  color: #667eea;
}

.summary-row.total .value {
  color: #111;
}

/* Empty State */
.empty {
  text-align: center;
  padding: 80px 20px;
  color: #666;
}

.empty-icon {
  font-size: 6rem;
  margin-bottom: 25px;
  opacity: 0.2;
  animation: float 3s ease-in-out infinite;
}

@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-20px); }
}

.empty h3 {
  font-size: 1.8rem;
  margin-bottom: 15px;
  color: #333;
}

.empty p {
  margin-bottom: 30px;
  font-size: 1.1rem;
  color: #777;
}

.action-buttons {
  display: flex;
  justify-content: flex-end;
  gap: 15px;
  margin-top: 25px;
}

.btn-secondary {
  background: #fff;
  color: #667eea;
  border: 2px solid #667eea;
  box-shadow: 0 4px 15px rgba(102, 126, 234, 0.15);
}

.btn-secondary:hover {
  background: #667eea;
  color: #fff;
}

/* Loading Animation */
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

/* Mobile Responsive */
@media (max-width: 768px) {
  header {
    padding: 15px 20px;
    flex-direction: column;
    gap: 15px;
  }

  header h1 {
    font-size: 1.5rem;
  }

  nav {
    flex-wrap: wrap;
    justify-content: center;
    gap: 15px;
  }

  .search-box input {
    width: 150px;
  }

  .container {
    margin: 30px 20px;
    padding: 25px 15px;
  }

  .page-title {
    font-size: 1.5rem;
  }

  table {
    font-size: 0.85rem;
  }

  th, td {
    padding: 12px 8px;
  }

  .qty-input {
    width: 50px;
    padding: 6px 8px;
  }

  .btn-checkout {
    width: 100%;
    text-align: center;
  }

  .action-buttons {
    flex-direction: column;
  }

  .summary-row.total {
    font-size: 1.3rem;
  }
}

@media (max-width: 480px) {
  .table-wrapper {
    overflow-x: scroll;
  }

  table {
    min-width: 600px;
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
    <div class="search-box">
      <input type="text" id="searchInput" placeholder="Cari produk...">
    </div>
    <button class="icon-btn" onclick="window.location.href='{{route('keranjang')}}'" title="Keranjang Belanja"></button>
  </nav>
</header>

<div class="container">
  <h2 class="page-title">🛒 Keranjang Belanja</h2>
  <div id="cartContainer"></div>
</div>

<script>
let cart = JSON.parse(localStorage.getItem('cart')) || [];
const cartContainer = document.getElementById('cartContainer');

function renderCart(filter = '') {
  if (cart.length === 0) {
    cartContainer.innerHTML = `
      <div class="empty">
        <div class="empty-icon">🛒</div>
        <h3>Keranjang Kosong</h3>
        <p>Belum ada produk yang ditambahkan ke keranjang</p>
        <button class="btn" onclick="window.location.href='{{route('produk')}}'">
          Mulai Belanja
        </button>
      </div>
    `;
    return;
  }

  let filtered = cart.filter(i => i.name.toLowerCase().includes(filter.toLowerCase()));

  if (filtered.length === 0) {
    cartContainer.innerHTML = `
      <div class="empty">
        <div class="empty-icon">🔍</div>
        <h3>Produk Tidak Ditemukan</h3>
        <p>Coba kata kunci lain atau hapus filter pencarian</p>
      </div>
    `;
    return;
  }

  let subtotal = 0;
  let html = `
    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>`;

  filtered.forEach((item, idx) => {
    const qty = item.qty || 1;
    const itemSubtotal = item.price * qty;
    subtotal += itemSubtotal;

    html += `
      <tr style="animation-delay: ${idx * 0.1}s">
        <td class="product-name">${item.name}</td>
        <td class="product-price">Rp ${item.price.toLocaleString('id-ID')}</td>
        <td>
          <input type="number" min="1" max="99" value="${qty}"
                 data-idx="${idx}" class="qty-input qtyInput">
        </td>
        <td class="product-price">Rp ${itemSubtotal.toLocaleString('id-ID')}</td>
        <td>
          <button class="btn btn-delete" onclick="removeItem(${idx})">
            🗑️ Hapus
          </button>
        </td>
      </tr>`;
  });

  const tax = subtotal * 0.1;
  const shipping = 15000;
  const total = subtotal + tax + shipping;

  html += `
        </tbody>
      </table>
    </div>

    <div class="cart-summary">
      <div class="summary-row">
        <span class="label">Subtotal (${filtered.length} item)</span>
        <span class="value">Rp ${subtotal.toLocaleString('id-ID')}</span>
      </div>
      <div class="summary-row">
        <span class="label">PPN (10%)</span>
        <span class="value">Rp ${tax.toLocaleString('id-ID')}</span>
      </div>
      <div class="summary-row">
        <span class="label">Ongkos Kirim</span>
        <span class="value">Rp ${shipping.toLocaleString('id-ID')}</span>
      </div>
      <div class="summary-row total">
        <span class="label">Total Pembayaran</span>
        <span class="value">Rp ${total.toLocaleString('id-ID')}</span>
      </div>
    </div>

    <div class="action-buttons">
      <button class="btn btn-secondary" onclick="clearCart()">
        🗑️ Kosongkan Keranjang
      </button>
      <button class="btn btn-checkout" onclick="goCheckout()">
        💳 Lanjut ke Checkout
      </button>
    </div>
  `;

  cartContainer.innerHTML = html;

  // Event listener untuk quantity input
  document.querySelectorAll('.qtyInput').forEach(input => {
    input.addEventListener('change', e => {
      const idx = parseInt(e.target.dataset.idx);
      let val = parseInt(e.target.value);
      if (val < 1) val = 1;
      if (val > 99) val = 99;
      cart[idx].qty = val;
      localStorage.setItem('cart', JSON.stringify(cart));
      renderCart(filter);
    });
  });
}

function removeItem(idx) {
  const itemName = cart[idx].name;
  if (confirm(`Hapus "${itemName}" dari keranjang?`)) {
    cart.splice(idx, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart();
  }
}

function clearCart() {
  if (cart.length === 0) return;

  if (confirm('Apakah Anda yakin ingin mengosongkan keranjang?')) {
    cart = [];
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart();
  }
}

function goCheckout() {
  if (cart.length === 0) {
    alert("Keranjang kosong!");
    return;
  }
  localStorage.setItem('checkoutData', JSON.stringify(cart));
  window.location.href = '{{route("checkout")}}';
}

// Pencarian
document.getElementById('searchInput').addEventListener('input', e => {
  renderCart(e.target.value);
});

// Load Data
const checkoutItem = JSON.parse(localStorage.getItem('checkoutItem')) || [];
if (checkoutItem.length > 0) {
  checkoutItem.forEach(item => {
    const existingIndex = cart.findIndex(c => c.name === item.name);
    if (existingIndex >= 0) {
      cart[existingIndex].qty = (cart[existingIndex].qty || 1) + 1;
    } else {
      cart.push({ ...item, qty: 1 });
    }
  });
  localStorage.setItem('cart', JSON.stringify(cart));
  localStorage.removeItem('checkoutItem');
}

renderCart();
</script>

</body>
</html>
