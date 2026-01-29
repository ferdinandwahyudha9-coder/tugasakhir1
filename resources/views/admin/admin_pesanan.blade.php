<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Pesanan</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
      box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
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
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
      display: flex;
      align-items: center;
      gap: 1rem;
      transition: all 0.3s;
    }

    .stat-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.12);
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

    .stat-icon.blue {
      background: #dbeafe;
    }

    .stat-icon.green {
      background: #d1fae5;
    }

    .stat-icon.orange {
      background: #fef3c7;
    }

    .stat-icon.purple {
      background: #ede9fe;
    }

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
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
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
    }

    .btn-view {
      background: #8b5cf6;
      color: white;
      padding: 0.5rem 1rem;
      font-size: 0.85rem;
    }

    .btn-view:hover {
      background: #7c3aed;
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
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
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
    }

    .customer-info {
      display: flex;
      align-items: center;
      gap: 0.8rem;
    }

    .customer-avatar {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: bold;
      font-size: 0.9rem;
    }

    .status-badge {
      padding: 0.4rem 0.8rem;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 500;
      display: inline-block;
      text-align: center;
      min-width: 80px;
    }

    .status-badge.pending {
      background: #fef3c7;
      color: #92400e;
    }

    .status-badge.processing {
      background: #dbeafe;
      color: #1e40af;
    }

    .status-badge.shipped {
      background: #e0e7ff;
      color: #3730a3;
    }

    .status-badge.delivered {
      background: #d1fae5;
      color: #065f46;
    }

    .status-badge.cancelled {
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
      background-color: rgba(0, 0, 0, 0.5);
      overflow-y: auto;
    }

    .modal-content {
      background-color: white;
      margin: 2% auto;
      padding: 2rem;
      border-radius: 12px;
      width: 90%;
      max-width: 600px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
      padding-bottom: 1rem;
      border-bottom: 2px solid #e5e7eb;
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

    .form-group select,
    .form-group textarea {
      width: 100%;
      padding: 0.8rem;
      border: 1px solid #e5e7eb;
      border-radius: 8px;
      font-size: 0.95rem;
    }

    .form-actions {
      display: flex;
      gap: 1rem;
      margin-top: 1.5rem;
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
      <li class="active" onclick="location.href='{{ route('admin.pesanan') }}'">Pesanan</li>
      <!-- <li onclick="location.href='{{route('admin.pesanan.detail', 1)}}'">Detail Pesanan</li> -->
    </ul>
  </div>

  <div class="content">
    <div class="header">
      <div>
        <h1>🛒 Order Management</h1>
        <p>Kelola semua pesanan pelanggan Anda</p>
      </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-icon orange">⏳</div>
        <div class="stat-info">
          <h3>Pending</h3>
          <p>{{ $orders->where('status', 'pending')->count() }}</p>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon blue">📦</div>
        <div class="stat-info">
          <h3>Processing</h3>
          <p>{{ $orders->where('status', 'processing')->count() }}</p>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon purple">🚚</div>
        <div class="stat-info">
          <h3>Shipped</h3>
          <p>{{ $orders->where('status', 'shipped')->count() }}</p>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon green">✅</div>
        <div class="stat-info">
          <h3>Delivered</h3>
          <p>{{ $orders->where('status', 'delivered')->count() }}</p>
        </div>
      </div>
    </div>

    <!-- Filter Section -->
    <div class="filter-section">
      <div class="filter-row">
        <div class="search-box">
          <input type="text" id="searchInput" placeholder="Cari order number, nama customer..." onkeyup="searchTable()">
        </div>
        <select class="filter-select" id="statusFilter" onchange="filterByStatus()">
          <option value="">Semua Status</option>
          <option value="pending">Pending</option>
          <option value="processing">Processing</option>
          <option value="shipped">Shipped</option>
          <option value="delivered">Delivered</option>
          <option value="cancelled">Cancelled</option>
        </select>
        <button class="btn btn-secondary" onclick="resetFilters()">🔄 Reset</button>
      </div>
    </div>

    <!-- Table -->
    <div class="table-container">
      <table id="ordersTable">
        <thead>
          <tr>
            <th>Order Number</th>
            <th>Customer</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($orders as $order)
            <tr>
              <td><span class="order-id">{{ $order->order_number }}</span></td>
              <td>
                <div class="customer-info">
                  <div class="customer-avatar">{{ $order->user ? substr($order->user->name, 0, 1) : '?' }}</div>
                  <div>
                    <div style="font-weight: 600;">{{ $order->user->name ?? 'Guest' }}</div>
                    <div style="font-size: 0.8rem; color: #6b7280;">{{ $order->user->email ?? '-' }}</div>
                  </div>
                </div>
              </td>
              <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
              <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
              <td><span class="status-badge {{ $order->status }}">{{ ucfirst($order->status) }}</span></td>
              <td>
                <button class="btn btn-view" onclick="viewOrder({{ $order->id }})">👁️ View</button>
                <button class="btn btn-edit" onclick="editOrder({{ $order->id }})">✏️</button>
                <button class="btn btn-delete" onclick="deleteOrder({{ $order->id }})">🗑️</button>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" style="text-align: center; padding: 2rem;">
                <p style="color: #6b7280;">Belum ada pesanan</p>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>

      <!-- Pagination -->
      <div style="margin-top: 1.5rem; display: flex; justify-content: center;">
        {{ $orders->links() }}
      </div>
    </div>
  </div>

  <!-- Edit Order Modal -->
  <div id="editOrderModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h2>✏️ Edit Status Pesanan</h2>
        <span class="close" onclick="closeEditModal()">&times;</span>
      </div>
      <form id="orderForm">
        <input type="hidden" id="orderId">

        <div class="form-group">
          <label>Status Pesanan</label>
          <select id="orderStatus" required>
            <option value="pending">Pending</option>
            <option value="processing">Processing</option>
            <option value="shipped">Shipped</option>
            <option value="delivered">Delivered</option>
            <option value="cancelled">Cancelled</option>
          </select>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
          <button type="button" class="btn btn-secondary" onclick="closeEditModal()">❌ Batal</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    // View Order
    function viewOrder(orderId) {
      window.location.href = `/admin/pesanan/${orderId}`;
    }

    // Delete Order
    function deleteOrder(orderId) {
      if (!confirm('Apakah Anda yakin ingin menghapus pesanan ini?')) {
        return;
      }

      fetch(`/admin/pesanan/${orderId}`, {
        method: 'DELETE',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert('✅ Pesanan berhasil dihapus');
            location.reload();
          } else {
            alert('❌ ' + data.message);
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('❌ Terjadi kesalahan: ' + error.message);
        });
    }

    // Edit Order
    function editOrder(orderId) {
      document.getElementById('orderId').value = orderId;
      document.getElementById('editOrderModal').style.display = 'block';
    }

    function closeEditModal() {
      document.getElementById('editOrderModal').style.display = 'none';
    }

    // Close modal when clicking outside
    window.onclick = function (event) {
      const editModal = document.getElementById('editOrderModal');
      if (event.target == editModal) {
        closeEditModal();
      }
    }

    // Form Submit
    document.getElementById('orderForm').onsubmit = async function (e) {
      e.preventDefault();

      const orderId = document.getElementById('orderId').value;
      const status = document.getElementById('orderStatus').value;

      try {
        const response = await fetch(`/admin/pesanan/${orderId}/status`, {
          method: 'PUT',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          },
          body: JSON.stringify({ status: status })
        });

        const result = await response.json();

        if (result.success) {
          alert('✅ Status pesanan berhasil diubah!');
          location.reload();
        } else {
          alert('❌ Gagal: ' + result.message);
        }
      } catch (error) {
        console.error('Error:', error);
        alert('❌ Terjadi kesalahan');
      }
    }

    // Search Function
    function searchTable() {
      const input = document.getElementById('searchInput').value.toLowerCase();
      const rows = document.getElementById('ordersTable').getElementsByTagName('tbody')[0].rows;

      for (let row of rows) {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(input) ? '' : 'none';
      }
    }

    // Filter Functions
    function filterByStatus() {
      const status = document.getElementById('statusFilter').value.toLowerCase();
      const rows = document.getElementById('ordersTable').getElementsByTagName('tbody')[0].rows;

      for (let row of rows) {
        if (status === '') {
          row.style.display = '';
        } else {
          const statusCell = row.cells[4].textContent.toLowerCase();
          row.style.display = statusCell.includes(status) ? '' : 'none';
        }
      }
    }

    function resetFilters() {
      document.getElementById('searchInput').value = '';
      document.getElementById('statusFilter').value = '';

      const rows = document.getElementById('ordersTable').getElementsByTagName('tbody')[0].rows;
      for (let row of rows) {
        row.style.display = '';
      }
    }
  </script>

</body>

</html>