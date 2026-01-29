<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin - Detail Pesanan</title>
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  display: flex;
  background: #f4f6f9;
}

/* Sidebar */
.sidebar {
  width: 260px;
  background: linear-gradient(180deg, #1f2937 0%, #111827 100%);
  color: white;
  height: 100vh;
  position: fixed;
  box-shadow: 2px 0 10px rgba(0,0,0,0.1);
}

.sidebar-header {
  padding: 1.5rem;
  border-bottom: 1px solid #374151;
  text-align: center;
}

.sidebar-header h2 {
  font-size: 1.3rem;
  margin-bottom: 0.5rem;
}

.sidebar-header p {
  font-size: 0.8rem;
  color: #9ca3af;
}

.sidebar ul {
  list-style: none;
  padding: 1rem 0;
}

.sidebar ul li {
  padding: 0.9rem 1.5rem;
  cursor: pointer;
  border-left: 3px solid transparent;
  transition: all 0.3s;
  display: flex;
  align-items: center;
}

.sidebar ul li:hover {
  background: #374151;
  border-left-color: #3b82f6;
}

.sidebar ul li.active {
  background: #374151;
  border-left-color: #3b82f6;
}

.sidebar ul li::before {
  content: "▸";
  margin-right: 0.8rem;
  color: #6b7280;
}

/* Content */
.content {
  margin-left: 260px;
  padding: 2rem;
  width: calc(100% - 260px);
  min-height: 100vh;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 2rem;
}

.header h1 {
  font-size: 2rem;
  color: #1f2937;
}

.header p {
  color: #6b7280;
  margin-top: 0.5rem;
}

/* Stats Cards */
.stats-row {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 1rem;
  margin-bottom: 2rem;
}

.stat-card {
  background: white;
  padding: 1.2rem;
  border-radius: 10px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.08);
  display: flex;
  align-items: center;
  gap: 1rem;
  transition: all 0.3s;
}

.stat-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 15px rgba(0,0,0,0.12);
}

.stat-icon {
  width: 50px;
  height: 50px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.5rem;
}

.stat-icon.blue { background: #dbeafe; }
.stat-icon.green { background: #d1fae5; }
.stat-icon.orange { background: #fef3c7; }
.stat-icon.purple { background: #ede9fe; }

.stat-info h3 {
  color: #6b7280;
  font-size: 0.85rem;
  font-weight: 500;
}

.stat-info p {
  font-size: 1.5rem;
  font-weight: bold;
  color: #1f2937;
  margin-top: 0.3rem;
}

/* Filter Section */
.filter-section {
  background: white;
  padding: 1.5rem;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  margin-bottom: 1.5rem;
}

.filter-row {
  display: flex;
  gap: 1rem;
  align-items: center;
  flex-wrap: wrap;
}

.search-box {
  flex: 1;
  min-width: 300px;
  position: relative;
}

.search-box input {
  width: 100%;
  padding: 0.8rem 1rem 0.8rem 2.8rem;
  border: 1px solid #e5e7eb;
  border-radius: 8px;
  font-size: 0.95rem;
  transition: all 0.3s;
}

.search-box input:focus {
  outline: none;
  border-color: #3b82f6;
  box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.search-box::before {
  content: "🔍";
  position: absolute;
  left: 1rem;
  top: 50%;
  transform: translateY(-50%);
}

.filter-select {
  padding: 0.8rem 1rem;
  border: 1px solid #e5e7eb;
  border-radius: 8px;
  font-size: 0.95rem;
  cursor: pointer;
  background: white;
}

/* Buttons */
.btn {
  padding: 0.8rem 1.5rem;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-size: 0.95rem;
  transition: all 0.3s;
  font-weight: 500;
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
}

.btn-primary {
  background: #3b82f6;
  color: white;
}

.btn-primary:hover {
  background: #2563eb;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
}

.btn-success {
  background: #10b981;
  color: white;
}

.btn-success:hover {
  background: #059669;
}

.btn-edit {
  background: #3b82f6;
  color: white;
  padding: 0.5rem 1rem;
  font-size: 0.85rem;
}

.btn-edit:hover {
  background: #2563eb;
}

.btn-delete {
  background: #ef4444;
  color: white;
  padding: 0.5rem 1rem;
  font-size: 0.85rem;
}

.btn-delete:hover {
  background: #dc2626;
}

.btn-secondary {
  background: #f3f4f6;
  color: #1f2937;
}

.btn-secondary:hover {
  background: #e5e7eb;
}

/* Table */
.table-container {
  background: white;
  padding: 1.5rem;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  overflow-x: auto;
}

table {
  width: 100%;
  border-collapse: collapse;
}

thead {
  background: #f9fafb;
}

th {
  padding: 1rem;
  text-align: left;
  font-weight: 600;
  color: #6b7280;
  font-size: 0.85rem;
  text-transform: uppercase;
  border-bottom: 2px solid #e5e7eb;
}

td {
  padding: 1rem;
  border-bottom: 1px solid #f3f4f6;
  color: #1f2937;
}

tbody tr {
  transition: all 0.2s;
}

tbody tr:hover {
  background: #f9fafb;
}

.order-id {
  font-weight: 600;
  color: #3b82f6;
  cursor: pointer;
}

.order-id:hover {
  text-decoration: underline;
}

.product-info {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.product-thumb {
  width: 50px;
  height: 50px;
  border-radius: 8px;
  object-fit: cover;
}

.product-details h4 {
  font-size: 0.95rem;
  color: #1f2937;
  margin-bottom: 0.3rem;
}

.product-details p {
  font-size: 0.8rem;
  color: #6b7280;
}

.quantity-badge {
  background: #dbeafe;
  color: #1e40af;
  padding: 0.4rem 0.8rem;
  border-radius: 20px;
  font-size: 0.85rem;
  font-weight: 600;
  display: inline-block;
}

.price {
  font-weight: 700;
  color: #10b981;
  font-size: 1.05rem;
}

/* Modal */
.modal {
  display: none;
  position: fixed;
  z-index: 1000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.5);
  animation: fadeIn 0.3s;
  overflow-y: auto;
}

.modal-content {
  background-color: white;
  margin: 3% auto;
  padding: 2rem;
  border-radius: 12px;
  width: 90%;
  max-width: 600px;
  box-shadow: 0 10px 40px rgba(0,0,0,0.2);
  animation: slideIn 0.3s;
}

.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1.5rem;
}

.modal-header h2 {
  color: #1f2937;
  font-size: 1.5rem;
}

.close {
  font-size: 2rem;
  cursor: pointer;
  color: #6b7280;
  transition: all 0.3s;
}

.close:hover {
  color: #1f2937;
}

.form-group {
  margin-bottom: 1.2rem;
}

.form-group label {
  display: block;
  margin-bottom: 0.5rem;
  color: #374151;
  font-weight: 500;
}

.form-group input,
.form-group select {
  width: 100%;
  padding: 0.8rem;
  border: 1px solid #e5e7eb;
  border-radius: 8px;
  font-size: 0.95rem;
}

.form-group input:focus,
.form-group select:focus {
  outline: none;
  border-color: #3b82f6;
  box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1rem;
}

.form-actions {
  display: flex;
  gap: 1rem;
  margin-top: 1.5rem;
}

.calculation-box {
  background: #f9fafb;
  padding: 1rem;
  border-radius: 8px;
  margin-top: 1rem;
}

.calc-row {
  display: flex;
  justify-content: space-between;
  padding: 0.5rem 0;
  font-size: 0.95rem;
}

.calc-row.total {
  font-weight: 700;
  font-size: 1.1rem;
  border-top: 2px solid #e5e7eb;
  padding-top: 1rem;
  margin-top: 0.5rem;
  color: #10b981;
}

/* Summary Cards */
.summary-section {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 1.5rem;
  margin-bottom: 2rem;
}

.summary-card {
  background: white;
  padding: 1.5rem;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.summary-card h3 {
  color: #1f2937;
  margin-bottom: 1rem;
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.summary-item {
  display: flex;
  justify-content: space-between;
  padding: 0.7rem 0;
  border-bottom: 1px solid #f3f4f6;
}

.summary-item:last-child {
  border-bottom: none;
}

.summary-label {
  color: #6b7280;
}

.summary-value {
  font-weight: 600;
  color: #1f2937;
}

.product-select-box {
  background: #f9fafb;
  padding: 1rem;
  border-radius: 8px;
  margin-bottom: 1rem;
}

.product-option {
  display: flex;
  align-items: center;
  gap: 1rem;
  padding: 0.8rem;
  background: white;
  border-radius: 8px;
  margin-bottom: 0.5rem;
  cursor: pointer;
  transition: all 0.3s;
  border: 2px solid transparent;
}

.product-option:hover {
  border-color: #3b82f6;
}

.product-option.selected {
  border-color: #3b82f6;
  background: #eff6ff;
}

.product-option img {
  width: 40px;
  height: 40px;
  border-radius: 6px;
  object-fit: cover;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes slideIn {
  from {
    transform: translateY(-50px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

@media (max-width: 768px) {
  .sidebar {
    width: 0;
    overflow: hidden;
  }

  .content {
    margin-left: 0;
    width: 100%;
  }

  .stats-row {
    grid-template-columns: 1fr;
  }

  .filter-row {
    flex-direction: column;
  }

  .summary-section {
    grid-template-columns: 1fr;
  }

  .form-row {
    grid-template-columns: 1fr;
  }
}
</style>
</head>
<body>

<div class="sidebar">
  <div class="sidebar-header">
    <h2>⚡ Admin Panel</h2>
    <p>Nand Second</p>
  </div>
  <ul>
    <li onclick="location.href='{{ route('admin.index') }}'">Dashboard</li>
    <li onclick="location.href='{{ route('admin.users') }}'">Users</li>
    <li onclick="location.href='{{ route('admin.produk') }}'">Produk</li>
    <li onclick="location.href='{{ route('admin.pesanan') }}'">Pesanan</li>
    <li class="active" onclick="location.href='{{ route('admin.pesanan.detail', 1) }}'">Detail Pesanan</li>
  </ul>
</div>

<div class="content">
  <div class="header">
    <div>
      <h1>📋 Order Item Details</h1>
      <p>Detail item dalam setiap pesanan</p>
    </div>
    <button class="btn btn-success" onclick="openModal('add')">➕ Tambah Item ke Order</button>
  </div>

  <!-- Stats Cards -->
  <div class="stats-row">
    <div class="stat-card">
      <div class="stat-icon blue">📦</div>
      <div class="stat-info">
        <h3>Total Items</h3>
        <p>148</p>
      </div>
    </div>
    <div class="stat-card">
      <div class="stat-icon green">🛍️</div>
      <div class="stat-info">
        <h3>Total Orders</h3>
        <p>52</p>
      </div>
    </div>
    <div class="stat-card">
      <div class="stat-icon orange">📊</div>
      <div class="stat-info">
        <h3>Avg Items/Order</h3>
        <p>2.8</p>
      </div>
    </div>
    <div class="stat-card">
      <div class="stat-icon purple">💰</div>
      <div class="stat-info">
        <h3>Total Revenue</h3>
        <p>Rp 15.2M</p>
      </div>
    </div>
  </div>

  <!-- Summary Section -->
  <div class="summary-section">
    <div class="summary-card">
      <h3>🏆 Top Selling Products</h3>
      <div class="summary-item">
        <span class="summary-label">Kaos Polos</span>
        <span class="summary-value">45 terjual</span>
      </div>
      <div class="summary-item">
        <span class="summary-label">Jaket Hoodie</span>
        <span class="summary-value">32 terjual</span>
      </div>
      <div class="summary-item">
        <span class="summary-label">Topi Baseball</span>
        <span class="summary-value">28 terjual</span>
      </div>
    </div>

    <div class="summary-card">
      <h3>📈 Order Statistics</h3>
      <div class="summary-item">
        <span class="summary-label">Pesanan Hari Ini</span>
        <span class="summary-value">8 orders</span>
      </div>
      <div class="summary-item">
        <span class="summary-label">Pesanan Minggu Ini</span>
        <span class="summary-value">34 orders</span>
      </div>
      <div class="summary-item">
        <span class="summary-label">Pesanan Bulan Ini</span>
        <span class="summary-value">142 orders</span>
      </div>
    </div>
  </div>

  <!-- Filter Section -->
  <div class="filter-section">
    <div class="filter-row">
      <div class="search-box">
        <input type="text" id="searchInput" placeholder="Cari order ID, produk, atau customer..." onkeyup="searchTable()">
      </div>
      <select class="filter-select" id="orderFilter" onchange="filterByOrder()">
        <option value="">Semua Order</option>
        <option value="ORD-001">Order #ORD-001</option>
        <option value="ORD-002">Order #ORD-002</option>
        <option value="ORD-003">Order #ORD-003</option>
      </select>
      <select class="filter-select" id="productFilter" onchange="filterByProduct()">
        <option value="">Semua Produk</option>
        <option value="Kaos">Kaos Polos</option>
        <option value="Jaket">Jaket Hoodie</option>
        <option value="Topi">Topi Baseball</option>
      </select>
      <button class="btn btn-secondary" onclick="resetFilters()">🔄 Reset</button>
      <button class="btn btn-primary" onclick="exportData()">📥 Export</button>
    </div>
  </div>

  <!-- Table -->
  <div class="table-container">
    <table id="detailsTable">
      <thead>
        <tr>
          <th>Detail ID</th>
          <th>Order ID</th>
          <th>Produk</th>
          <th>Harga Satuan</th>
          <th>Jumlah</th>
          <th>Subtotal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><span style="font-weight: 600; color: #6b7280;">#DTL-001</span></td>
          <td><span class="order-id" onclick="goToOrder('ORD-001')">#ORD-001</span></td>
          <td>
            <div class="product-info">
              <img src="https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=100" class="product-thumb" alt="Jaket">
              <div class="product-details">
                <h4>Jaket Hoodie</h4>
                <p>Size: L • SKU: JKT-002</p>
              </div>
            </div>
          </td>
          <td>Rp 150.000</td>
          <td><span class="quantity-badge">× 1</span></td>
          <td><span class="price">Rp 150.000</span></td>
          <td>
            <button class="btn btn-edit" onclick="editDetail(1)">✏️ Edit</button>
            <button class="btn btn-delete" onclick="deleteDetail(1)">🗑️</button>
          </td>
        </tr>
        <tr>
          <td><span style="font-weight: 600; color: #6b7280;">#DTL-002</span></td>
          <td><span class="order-id" onclick="goToOrder('ORD-001')">#ORD-001</span></td>
          <td>
            <div class="product-info">
              <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=100" class="product-thumb" alt="Kaos">
              <div class="product-details">
                <h4>Kaos Polos</h4>
                <p>Size: M • SKU: KOS-001</p>
              </div>
            </div>
          </td>
          <td>Rp 100.000</td>
          <td><span class="quantity-badge">× 1</span></td>
          <td><span class="price">Rp 100.000</span></td>
          <td>
            <button class="btn btn-edit" onclick="editDetail(2)">✏️ Edit</button>
            <button class="btn btn-delete" onclick="deleteDetail(2)">🗑️</button>
          </td>
        </tr>
        <tr>
          <td><span style="font-weight: 600; color: #6b7280;">#DTL-003</span></td>
          <td><span class="order-id" onclick="goToOrder('ORD-002')">#ORD-002</span></td>
          <td>
            <div class="product-info">
              <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=100" class="product-thumb" alt="Kaos">
              <div class="product-details">
                <h4>Kaos Polos</h4>
                <p>Size: M • SKU: KOS-001</p>
              </div>
            </div>
          </td>
          <td>Rp 100.000</td>
          <td><span class="quantity-badge">× 2</span></td>
          <td><span class="price">Rp 200.000</span></td>
          <td>
            <button class="btn btn-edit" onclick="editDetail(3)">✏️ Edit</button>
            <button class="btn btn-delete" onclick="deleteDetail(3)">🗑️</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Add/Edit Modal -->
<div id="detailModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <h2 id="modalTitle">➕ Tambah Item ke Order</h2>
      <span class="close" onclick="closeModal()">&times;</span>
    </div>
    <form id="detailForm">
      <div class="form-group">
        <label>Pilih Order</label>
        <select id="orderId" required onchange="loadOrderInfo()">
          <option value="">-- Pilih Order --</option>
          <option value="ORD-001">Order #ORD-001 - Ahmad Hidayat</option>
          <option value="ORD-002">Order #ORD-002 - Siti Nurhaliza</option>
          <option value="ORD-003">Order #ORD-003 - Budi Santoso</option>
        </select>
      </div>

      <div class="form-group">
        <label>Pilih Produk</label>
        <div class="product-select-box">
          <div class="product-option" onclick="selectProduct(1, 'Kaos Polos', 100000)">
            <input type="radio" name="product" value="1">
            <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=100" alt="Kaos">
            <div style="flex: 1;">
              <div style="font-weight: 600;">Kaos Polos</div>
              <div style="font-size: 0.8rem; color: #6b7280;">Rp 100.000 • Stok: 20</div>
            </div>
          </div>
          <div class="product-option" onclick="selectProduct(2, 'Jaket Hoodie', 150000)">
            <input type="radio" name="product" value="2">
            <img src="https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=100" alt="Jaket">
            <div style="flex: 1;">
              <div style="font-weight: 600;">Jaket Hoodie</div>
              <div style="font-size: 0.8rem; color: #6b7280;">Rp 150.000 • Stok: 15</div>
            </div>
          </div>
          <div class="product-option" onclick="selectProduct(3, 'Topi Baseball', 50000)">
            <input type="radio" name="product" value="3">
            <img src="https://images.unsplash.com/photo-1588850561407-ed78c282e89b?w=100" alt="Topi">
            <div style="flex: 1;">
              <div style="font-weight: 600;">Topi Baseball</div>
              <div style="font-size: 0.8rem; color: #6b7280;">Rp 50.000 • Stok: 30</div>
            </div>
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label>Jumlah</label>
          <input type="number" id="quantity" min="1" value="1" required oninput="calculateTotal()">
        </div>
        <div class="form-group">
          <label>Harga Satuan</label>
          <input type="number" id="unitPrice" readonly>
        </div>
      </div>

      <div class="calculation-box">
        <div class="calc-row">
          <span>Produk yang dipilih:</span>
          <span id="selectedProduct">-</span>
        </div>
        <div class="calc-row">
          <span>Harga Satuan:</span>
          <span id="displayPrice">Rp 0</span>
        </div>
        <div class="calc-row">
          <span>Jumlah:</span>
          <span id="displayQty">0</span>
        </div>
        <div class="calc-row total">
          <span>Subtotal:</span>
          <span id="displayTotal">Rp 0</span>
        </div>
      </div>

      <div class="form-actions">
        <button type="submit" class="btn btn-primary">💾 Simpan Item</button>
        <button type="button" class="btn btn-secondary" onclick="closeModal()">❌ Batal</button>
      </div>
    </form>
  </div>
</div>

<script>
let selectedProductData = null;

// Modal Functions
function openModal(mode) {
  const modal = document.getElementById('detailModal');
  const modalTitle = document.getElementById('modalTitle');

  if (mode === 'add') {
    modalTitle.textContent = '➕ Tambah Item ke Order';
    document.getElementById('detailForm').reset();
    resetCalculation();
  }

  modal.style.display = 'block';
}

function closeModal() {
  document.getElementById('detailModal').style.display = 'none';
  resetCalculation();
}

function editDetail(detailId) {
  const modal = document.getElementById('detailModal');
  const modalTitle = document.getElementById('modalTitle');

  modalTitle.textContent = '✏️ Edit Detail Pesanan';

  // Load data (dummy)
  document.getElementById('orderId').value = 'ORD-001';
  document.getElementById('quantity').value = '1';

  modal.style.display = 'block';
}

window.onclick = function(event) {
  const modal = document.getElementById('detailModal');
  if (event.target == modal) {
    closeModal();
  }
}

// Product Selection
function selectProduct(productId, productName, price) {
  // Remove previous selection
  document.querySelectorAll('.product-option').forEach(opt => {
    opt.classList.remove('selected');
  });

  // Add selection to clicked option
  event.currentTarget.classList.add('selected');

  // Store selected product data
  selectedProductData = {
    id: productId,
    name: productName,
    price: price
  };

  // Update form
  document.getElementById('unitPrice').value = price;
  document.getElementById('selectedProduct').textContent = productName;
  document.getElementById('displayPrice').textContent = 'Rp ' + price.toLocaleString('id-ID');

  calculateTotal();
}

// Calculate Total
function calculateTotal() {
  if (!selectedProductData) return;

  const quantity = parseInt(document.getElementById('quantity').value) || 0;
  const unitPrice = selectedProductData.price;
  const total = quantity * unitPrice;

  document.getElementById('displayQty').textContent = quantity;
  document.getElementById('displayTotal').textContent = 'Rp ' + total.toLocaleString('id-ID');
}

function resetCalculation() {
  selectedProductData = null;
  document.getElementById('selectedProduct').textContent = '-';
  document.getElementById('displayPrice').textContent = 'Rp 0';
  document.getElementById('displayQty').textContent = '0';
  document.getElementById('displayTotal').textContent = 'Rp 0';
  document.getElementById('unitPrice').value = '';

  document.querySelectorAll('.product-option').forEach(opt => {
    opt.classList.remove('selected');
  });
}

// Form Submit
document.getElementById('detailForm').onsubmit = function(e) {
  e.preventDefault();

  if (!selectedProductData) {
    alert('Silakan pilih produk terlebih dahulu!');
    return;
  }

  const orderId = document.getElementById('orderId').value;
  const quantity = document.getElementById('quantity').value;
  const total = selectedProductData.price * quantity;

  alert(`Item berhasil ditambahkan ke ${orderId}!\n\nProduk: ${selectedProductData.name}\nJumlah: ${quantity}\nTotal: Rp ${total.toLocaleString('id-ID')}`);
  closeModal();
}

// Search Function
function searchTable() {
  const input = document.getElementById('searchInput').value.toLowerCase();
  const rows = document.getElementById('detailsTable').getElementsByTagName('tbody')[0].rows;

  for (let row of rows) {
    const text = row.textContent.toLowerCase();
    row.style.display = text.includes(input) ? '' : 'none';
  }
}

// Filter Functions
function filterByOrder() {
  const order = document.getElementById('orderFilter').value;
  const rows = document.getElementById('detailsTable').getElementsByTagName('tbody')[0].rows;

  for (let row of rows) {
    if (order === '') {
      row.style.display = '';
    } else {
      const orderCell = row.cells[1].textContent;
      row.style.display = orderCell.includes(order) ? '' : 'none';
    }
  }
}

function filterByProduct() {
  const product = document.getElementById('productFilter').value;
  const rows = document.getElementById('detailsTable').getElementsByTagName('tbody')[0].rows;

  for (let row of rows) {
    if (product === '') {
      row.style.display = '';
    } else {
      const productCell = row.cells[2].textContent;
      row.style.display = productCell.includes(product) ? '' : 'none';
    }
  }
}

function resetFilters() {
  document.getElementById('searchInput').value = '';
  document.getElementById('orderFilter').value = '';
  document.getElementById('productFilter').value = '';

  const rows = document.getElementById('detailsTable').getElementsByTagName('tbody')[0].rows;
  for (let row of rows) {
    row.style.display = '';
  }
}

// Delete Detail
function deleteDetail(detailId) {
  if (confirm('Apakah Anda yakin ingin menghapus item ini dari pesanan?')) {
    alert(`Detail item ID ${detailId} berhasil dihapus!`);
    // Di sini nanti kirim request ke backend
  }
}

// Go to Order
function goToOrder(orderId) {
  alert(`Navigasi ke halaman detail Order ${orderId}`);
  // location.href = 'admin_pesanan.html?id=' + orderId;
}

// Export Data
function exportData() {
  alert('Export data detail pesanan ke Excel/CSV akan segera tersedia!');
}

// Load Order Info
function loadOrderInfo() {
  const orderId = document.getElementById('orderId').value;
  if (orderId) {
    // Dummy: Show order info
    console.log('Loading order info for:', orderId);
  }
}
</script>

</body>
</html>
