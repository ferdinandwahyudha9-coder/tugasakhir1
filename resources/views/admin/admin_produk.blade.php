<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin - Produk</title>
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

/* Product Grid View */
.view-toggle {
  display: flex;
  gap: 0.5rem;
  background: white;
  padding: 0.3rem;
  border-radius: 8px;
  border: 1px solid #e5e7eb;
}

.view-btn {
  padding: 0.5rem 1rem;
  border: none;
  background: transparent;
  cursor: pointer;
  border-radius: 6px;
  transition: all 0.3s;
}

.view-btn.active {
  background: #3b82f6;
  color: white;
}

.products-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 1.5rem;
  margin-top: 1.5rem;
}

.product-card {
  background: white;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  transition: all 0.3s;
}

.product-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.product-image {
  width: 100%;
  height: 200px;
  object-fit: cover;
  background: #f3f4f6;
}

.product-info {
  padding: 1.2rem;
}

.product-title {
  font-size: 1.1rem;
  font-weight: 600;
  color: #1f2937;
  margin-bottom: 0.5rem;
}

.product-price {
  font-size: 1.3rem;
  font-weight: bold;
  color: #10b981;
  margin-bottom: 0.8rem;
}

.product-details {
  display: flex;
  gap: 1rem;
  margin-bottom: 1rem;
  font-size: 0.85rem;
  color: #6b7280;
}

.product-actions {
  display: flex;
  gap: 0.5rem;
}

/* Table View */
.table-container {
  background: white;
  padding: 1.5rem;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  overflow-x: auto;
  display: none;
}

.table-container.active {
  display: block;
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

.product-thumb {
  width: 60px;
  height: 60px;
  object-fit: cover;
  border-radius: 8px;
}

.stock-badge {
  padding: 0.4rem 0.8rem;
  border-radius: 20px;
  font-size: 0.8rem;
  font-weight: 500;
  display: inline-block;
}

.stock-badge.high {
  background: #d1fae5;
  color: #065f46;
}

.stock-badge.medium {
  background: #fef3c7;
  color: #92400e;
}

.stock-badge.low {
  background: #fee2e2;
  color: #991b1b;
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

.form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1rem;
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
.form-group select,
.form-group textarea {
  width: 100%;
  padding: 0.8rem;
  border: 1px solid #e5e7eb;
  border-radius: 8px;
  font-size: 0.95rem;
  font-family: inherit;
}

.form-group textarea {
  resize: vertical;
  min-height: 100px;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
  outline: none;
  border-color: #3b82f6;
  box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.image-upload {
  border: 2px dashed #e5e7eb;
  border-radius: 8px;
  padding: 2rem;
  text-align: center;
  cursor: pointer;
  transition: all 0.3s;
}

.image-upload:hover {
  border-color: #3b82f6;
  background: #f9fafb;
}

.image-upload input {
  display: none;
}

.image-preview {
  max-width: 100%;
  max-height: 200px;
  margin-top: 1rem;
  border-radius: 8px;
}

.form-actions {
  display: flex;
  gap: 1rem;
  margin-top: 1.5rem;
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

  .products-grid {
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
    <li onclick="location.href='{{route('admin.index')}}'">Dashboard</li>
    <li onclick="location.href='{{route('admin.users')}}'" >Users</li>
    <li class="active" onclick="location.href='{{route('admin.produk')}}'" >Produk</li>
    <li onclick="location.href='{{route('admin.pesanan')}}'" >Pesanan</li>
    <!-- <li onclick="location.href='{{route('admin.pesanan.detail', 1)}}'" >Detail Pesanan</li> -->
  </ul>
</div>

<div class="content">
  <div class="header">
    <div>
      <h1>📦 Product Management</h1>
      <p>Kelola semua produk di katalog Anda</p>
    </div>
    <button class="btn btn-success" onclick="openModal('add')">➕ Tambah Produk Baru</button>
  </div>

  <!-- Stats Cards -->
<div class="stats-row">
  <div class="stat-card">
    <div class="stat-icon blue">📦</div>
    <div class="stat-info">
      <h3>Total Produk</h3>
      <p>{{ $products->total() }}</p>
    </div>
  </div>
  <div class="stat-card">
    <div class="stat-icon green">✅</div>
    <div class="stat-info">
      <h3>Stok Tersedia</h3>
      <p>{{ $products->sum('stok') }}</p>
    </div>
  </div>
  <div class="stat-card">
    <div class="stat-icon orange">⚠️</div>
    <div class="stat-info">
      <h3>Stok Menipis</h3>
      <p>{{ $products->where('stok', '<', 10)->count() }}</p>
    </div>
  </div>
  <!-- <div class="stat-card">
    <div class="stat-icon purple">💰</div>
    <div class="stat-info">
      <h3>Total Value</h3>
      <p>Rp {{ number_format($products->sum(function($p) { return $p->harga * $p->stok; }), 0, ',', '.') }}</p>
    </div>
  </div> -->
</div>

  <!-- Filter Section -->
  <div class="filter-section">
    <div class="filter-row">
      <div class="search-box">
        <input type="text" id="searchInput" placeholder="Cari nama produk atau ID..." onkeyup="searchProducts()">
      </div>
      <select class="filter-select" id="categoryFilter" onchange="filterByCategory()">
        <option value="">Semua Kategori</option>
        <option value="Kaos">Kaos</option>
        <option value="Jaket">Jaket</option>
        <option value="Aksesoris">Aksesoris</option>
      </select>
      <select class="filter-select" id="stockFilter" onchange="filterByStock()">
        <option value="">Semua Stok</option>
        <option value="high">Stok Tinggi (>20)</option>
        <option value="medium">Stok Sedang (10-20)</option>
        <option value="low">Stok Rendah (<10)</option>
      </select>
      <div class="view-toggle">
        <button class="view-btn active" onclick="toggleView('grid')">🔲 Grid</button>
        <button class="view-btn" onclick="toggleView('table')">📋 Table</button>
      </div>
      <button class="btn btn-secondary" onclick="resetFilters()">🔄 Reset</button>
    </div>
  </div>

  <!-- Grid View -->
<div class="products-grid" id="gridView">
  @forelse($products as $product)
  <div class="product-card">
    <img src="{{ $product->image ? asset('storage/'.$product->image) : 'https://via.placeholder.com/400' }}" alt="{{ $product->nama }}" class="product-image">
    <div class="product-info">
      <div class="product-title">{{ $product->nama }}</div>
      <div class="product-price">Rp {{ number_format($product->harga, 0, ',', '.') }}</div>
      <div class="product-details">
        <span>📦 Stok: {{ $product->stok }}</span>
        <span>🏷️ {{ $product->label ?? 'N/A' }}</span>
      </div>
      <div class="product-actions">
        <button class="btn btn-edit" onclick="openModal('edit', {{ $product->id }})">✏️ Edit</button>
        <button class="btn btn-delete" onclick="deleteProduct({{ $product->id }})">🗑️</button>
      </div>
    </div>
  </div>
  @empty
  <div style="grid-column: 1/-1; text-align: center; padding: 3rem;">
    <p style="color: #6b7280; font-size: 1.1rem;">Belum ada produk. Klik "Tambah Produk Baru" untuk menambah.</p>
  </div>
  @endforelse
</div>

<!-- Table View -->
<div class="table-container" id="tableView">
  <table id="productsTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>Foto</th>
        <th>Nama Produk</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Label</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($products as $product)
      <tr>
        <td>#{{ $product->id }}</td>
        <td><img src="{{ $product->image ? asset('storage/'.$product->image) : 'https://via.placeholder.com/100' }}" class="product-thumb" alt="{{ $product->nama }}"></td>
        <td>{{ $product->nama }}</td>
        <td>
          <span class="stock-badge {{ $product->stok > 20 ? 'high' : ($product->stok > 10 ? 'medium' : 'low') }}">
            {{ $product->stok }} pcs
          </span>
        </td>
        <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
        <td>{{ $product->label ?? '-' }}</td>
        <td>
          <button class="btn btn-edit" onclick="openModal('edit', {{ $product->id }})">✏️</button>
          <button class="btn btn-delete" onclick="deleteProduct({{ $product->id }})">🗑️</button>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="7" style="text-align: center; padding: 2rem;">
          <p style="color: #6b7280;">Belum ada produk</p>
        </td>
      </tr>
      @endforelse
    </tbody>
  </table>
  
  <!-- Pagination -->
  <div style="margin-top: 1.5rem; display: flex; justify-content: center;">
    {{ $products->links() }}
  </div>
</div>

<!-- Modal -->
<div id="productModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <h2 id="modalTitle">➕ Tambah Produk Baru</h2>
      <span class="close" onclick="closeModal()">&times;</span>
    </div>
    <form id="productForm">
      <div class="form-group">
        <label>Upload Foto Produk</label>
        <div class="image-upload" onclick="document.getElementById('imageInput').click()">
          <input type="file" id="imageInput" accept="image/*" onchange="previewImage(event)">
          <div>📷 Klik untuk upload gambar</div>
          <img id="imagePreview" class="image-preview" style="display:none;">
        </div>
      </div>

      <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" id="productName" placeholder="Masukkan nama produk" required>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label>Kategori</label>
          <select id="productCategory" required>
            <option value="">Pilih Kategori</option>
            <option value="Kaos">Kaos</option>
            <option value="Jaket">Jaket</option>
            <option value="Celana">Celana</option>
            <option value="Aksesoris">Aksesoris</option>
          </select>
        </div>

        <div class="form-group">
          <label>Ukuran</label>
          <select id="productSize" required>
            <option value="">Pilih Ukuran</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="All">All Size</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label>Harga</label>
          <input type="number" id="productPrice" placeholder="100000" required>
        </div>

        <div class="form-group">
          <label>Stok</label>
          <input type="number" id="productStock" placeholder="20" required>
        </div>
      </div>

      <div class="form-group">
        <label>Deskripsi Produk</label>
        <textarea id="productDescription" placeholder="Masukkan deskripsi produk..."></textarea>
      </div>

      <div class="form-group">
  <label>Label Produk</label>
  <select id="productLabel">
    <option value="">Tanpa Label</option>
    <option value="new">New</option>
    <option value="hot">Hot</option>
    <option value="sale">Sale</option>
    <option value="best">Best Seller</option>
  </select>
</div>

<div class="form-actions">
  <button type="submit" class="btn btn-primary">💾 Simpan Produk</button>
  <button type="button" class="btn btn-secondary" onclick="closeModal()">❌ Batal</button>
</div>
<script>
let currentProductId = null;
let currentMode = null;

// View Toggle
function toggleView(view) {
  const gridView = document.getElementById('gridView');
  const tableView = document.getElementById('tableView');
  const buttons = document.querySelectorAll('.view-btn');

  buttons.forEach(btn => btn.classList.remove('active'));

  if (view === 'grid') {
    gridView.style.display = 'grid';
    tableView.classList.remove('active');
    buttons[0].classList.add('active');
  } else {
    gridView.style.display = 'none';
    tableView.classList.add('active');
    buttons[1].classList.add('active');
  }
}

// Modal Functions
function openModal(mode, productId = null) {
  const modal = document.getElementById('productModal');
  const modalTitle = document.getElementById('modalTitle');
  const form = document.getElementById('productForm');

  currentMode = mode;
  currentProductId = productId;

  if (mode === 'add') {
    modalTitle.textContent = '➕ Tambah Produk Baru';
    form.reset();
    document.getElementById('imagePreview').style.display = 'none';
  } else if (mode === 'edit' && productId) {
    modalTitle.textContent = '✏️ Edit Produk';
    
    // Load product data from server
    fetch(`/admin/produk/${productId}`, {
      headers: {
        'Accept': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
    })
    .then(response => response.json())
    .then(product => {
      document.getElementById('productName').value = product.nama || '';
      document.getElementById('productPrice').value = product.harga || '';
      document.getElementById('productStock').value = product.stok || '';
      document.getElementById('productDescription').value = product.deskripsi || '';
      document.getElementById('productLabel').value = product.label || '';
      
      if (product.image) {
        const preview = document.getElementById('imagePreview');
        preview.src = `/storage/${product.image}`;
        preview.style.display = 'block';
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Gagal memuat data produk');
    });
  }

  modal.style.display = 'block';
}

function closeModal() {
  document.getElementById('productModal').style.display = 'none';
  currentProductId = null;
  currentMode = null;
}

window.onclick = function(event) {
  const modal = document.getElementById('productModal');
  if (event.target == modal) {
    closeModal();
  }
}

// Image Preview
function previewImage(event) {
  const preview = document.getElementById('imagePreview');
  const file = event.target.files[0];

  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      preview.src = e.target.result;
      preview.style.display = 'block';
    }
    reader.readAsDataURL(file);
  }
}

// Form Submit
document.getElementById('productForm').onsubmit = function(e) {
  e.preventDefault();
  
  const formData = new FormData();
  formData.append('nama', document.getElementById('productName').value);
  formData.append('harga', document.getElementById('productPrice').value);
  formData.append('stok', document.getElementById('productStock').value);
  formData.append('deskripsi', document.getElementById('productDescription').value || '');
  formData.append('label', document.getElementById('productLabel')?.value || '');
  
  const imageInput = document.getElementById('imageInput');
  if (imageInput.files[0]) {
    formData.append('image', imageInput.files[0]);
  }

  if (currentMode === 'add') {
    fetch('/admin/produk', {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Accept': 'application/json'
      },
      body: formData
    })
    .then(response => response.json())
    .then(result => {
      alert(result.success ? '✅ Produk berhasil ditambahkan!' : '❌ Gagal: ' + result.message);
      if (result.success) {
        closeModal();
        location.reload();
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('❌ Terjadi kesalahan');
    });

  } else if (currentMode === 'edit' && currentProductId) {
    formData.append('_method', 'PUT');
    
    fetch(`/admin/produk/${currentProductId}`, {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Accept': 'application/json'
      },
      body: formData
    })
    .then(response => response.json())
    .then(result => {
      alert(result.success ? '✅ Produk berhasil diupdate!' : '❌ Gagal: ' + result.message);
      if (result.success) {
        closeModal();
        location.reload();
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('❌ Terjadi kesalahan');
    });
  }
}

// Delete Product
function deleteProduct(productId) {
  if (!confirm('⚠️ Hapus produk ini?')) return;
  
  fetch(`/admin/produk/${productId}`, {
    method: 'DELETE',
    headers: {
      'X-CSRF-TOKEN': '{{ csrf_token() }}',
      'Accept': 'application/json'
    }
  })
  .then(response => response.json())
  .then(result => {
    alert(result.success ? '✅ Produk dihapus!' : '❌ Gagal: ' + result.message);
    if (result.success) location.reload();
  })
  .catch(error => {
    console.error('Error:', error);
    alert('❌ Terjadi kesalahan');
  });
}

// Search, Filter
function searchProducts() {
  const input = document.getElementById('searchInput').value.toLowerCase();
  document.querySelectorAll('.product-card').forEach(card => {
    card.style.display = card.textContent.toLowerCase().includes(input) ? '' : 'none';
  });
  
  const rows = document.getElementById('productsTable')?.getElementsByTagName('tbody')[0]?.rows;
  if (rows) {
    for (let row of rows) {
      row.style.display = row.textContent.toLowerCase().includes(input) ? '' : 'none';
    }
  }
}

function filterByCategory() { console.log('Filter category'); }
function filterByStock() { console.log('Filter stock'); }
function resetFilters() {
  document.getElementById('searchInput').value = '';
  document.getElementById('categoryFilter').value = '';
  document.getElementById('stockFilter').value = '';
  searchProducts();
}
</script>

</body>
</html>
