<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin - Dashboard</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

.header-actions {
  display: flex;
  gap: 1rem;
}

.btn {
  padding: 0.7rem 1.5rem;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-size: 0.9rem;
  transition: all 0.3s;
  font-weight: 500;
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

.btn-secondary {
  background: white;
  color: #1f2937;
  border: 1px solid #e5e7eb;
}

.btn-secondary:hover {
  background: #f9fafb;
}

/* Stats Cards */
.stats-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 1.5rem;
  margin-bottom: 2rem;
}

.stat-card {
  background: white;
  padding: 1.5rem;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  border-left: 4px solid;
  transition: all 0.3s;
}

.stat-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.12);
}

.stat-card.blue { border-left-color: #3b82f6; }
.stat-card.green { border-left-color: #10b981; }
.stat-card.orange { border-left-color: #f59e0b; }
.stat-card.purple { border-left-color: #8b5cf6; }

.stat-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1rem;
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

.stat-card.blue .stat-icon { background: #dbeafe; }
.stat-card.green .stat-icon { background: #d1fae5; }
.stat-card.orange .stat-icon { background: #fef3c7; }
.stat-card.purple .stat-icon { background: #ede9fe; }

.stat-title {
  color: #6b7280;
  font-size: 0.9rem;
  font-weight: 500;
}

.stat-value {
  font-size: 2rem;
  font-weight: bold;
  color: #1f2937;
  margin-bottom: 0.5rem;
}

.stat-change {
  font-size: 0.85rem;
  display: flex;
  align-items: center;
  gap: 0.3rem;
}

.stat-change.positive { color: #10b981; }
.stat-change.negative { color: #ef4444; }

/* Charts Section */
.charts-section {
  display: grid;
  grid-template-columns: 2fr 1fr;
  gap: 1.5rem;
  margin-bottom: 2rem;
}

.chart-card {
  background: white;
  padding: 1.5rem;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.chart-card h3 {
  margin-bottom: 1rem;
  color: #1f2937;
  font-size: 1.1rem;
}

/* Tables */
.table-section {
  background: white;
  padding: 1.5rem;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  margin-bottom: 2rem;
}

.table-section h3 {
  margin-bottom: 1rem;
  color: #1f2937;
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
}

td {
  padding: 1rem;
  border-top: 1px solid #f3f4f6;
  color: #1f2937;
}

.status {
  padding: 0.4rem 0.8rem;
  border-radius: 20px;
  font-size: 0.8rem;
  font-weight: 500;
}

.status.success {
  background: #d1fae5;
  color: #065f46;
}

.status.pending {
  background: #fef3c7;
  color: #92400e;
}

.status.cancelled {
  background: #fee2e2;
  color: #991b1b;
}

/* Activity Section */
.activity-section {
  background: white;
  padding: 1.5rem;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.activity-section h3 {
  margin-bottom: 1.5rem;
  color: #1f2937;
}

.activity-item {
  display: flex;
  gap: 1rem;
  padding: 1rem 0;
  border-bottom: 1px solid #f3f4f6;
}

.activity-item:last-child {
  border-bottom: none;
}

.activity-icon {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  flex-shrink: 0;
}

.activity-icon.blue { background: #dbeafe; }
.activity-icon.green { background: #d1fae5; }
.activity-icon.orange { background: #fef3c7; }

.activity-content h4 {
  color: #1f2937;
  margin-bottom: 0.3rem;
  font-size: 0.95rem;
}

.activity-content p {
  color: #6b7280;
  font-size: 0.85rem;
}

.activity-time {
  color: #9ca3af;
  font-size: 0.8rem;
  margin-left: auto;
  white-space: nowrap;
}

@media (max-width: 1024px) {
  .charts-section {
    grid-template-columns: 1fr;
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

  .stats-grid {
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
    <li class="active" onclick="location.href='{{ route('admin.index') }}'">Dashboard</li>
    <li onclick="location.href='{{ route('admin.users') }}'">Users</li>
    <li onclick="location.href='{{ route('admin.produk') }}'">Produk</li>
    <li onclick="location.href='{{ route('admin.pesanan') }}'">Pesanan</li>
    <li onclick="location.href='{{ route('admin.pesanan.detail', $recent_orders->first()->id ?? 1) }}'">Detail Pesanan</li>
  </ul>
</div>

<div class="content">
  <div class="header">
    <div>
      <h1>Dashboard</h1>
      <p style="color: #6b7280; margin-top: 0.5rem;">Selamat datang kembali! Berikut ringkasan bisnis Anda hari ini.</p>
    </div>
    <div class="header-actions">
      <button class="btn btn-secondary">📊 Export Data</button>
      <button class="btn btn-primary">➕ Tambah Produk</button>
    </div>
  </div>

  <!-- Stats Cards -->
  <div class="stats-grid">
    <div class="stat-card blue">
      <div class="stat-header">
        <div class="stat-icon">👥</div>
      </div>
      <div class="stat-title">Total Users</div>
      <div class="stat-value">{{ $stats['total_users'] }}</div>
      <div class="stat-change positive">
        <span style="color: #6b7280;">Pengguna Terdaftar</span>
      </div>
    </div>

    <div class="stat-card green">
      <div class="stat-header">
        <div class="stat-icon">📦</div>
      </div>
      <div class="stat-title">Total Produk</div>
      <div class="stat-value">{{ $stats['total_products'] }}</div>
      <div class="stat-change positive">
        <span style="color: #6b7280;">Produk Aktif</span>
      </div>
    </div>

    <div class="stat-card orange">
      <div class="stat-header">
        <div class="stat-icon">🛒</div>
      </div>
      <div class="stat-title">Total Pesanan</div>
      <div class="stat-value">{{ $stats['total_orders'] }}</div>
      <div class="stat-change positive">
        <span style="color: #6b7280;">Pesanan Selesai</span>
      </div>
    </div>

    <div class="stat-card purple">
      <div class="stat-header">
        <div class="stat-icon">💰</div>
      </div>
      <div class="stat-title">Revenue</div>
      <div class="stat-value">Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}</div>
      <div class="stat-change positive">
        <span style="color: #6b7280;">Total Penjualan</span>
      </div>
    </div>
  </div>

  <!-- Charts Section -->
  <div class="charts-section">
    <div class="chart-card">
      <h3>📈 Statistik Penjualan (7 Hari Terakhir)</h3>
      <canvas id="salesChart"></canvas>
    </div>

    <div class="chart-card">
      <h3>🎯 Kategori Produk</h3>
      <canvas id="categoryChart"></canvas>
    </div>
  </div>

  <!-- Recent Orders Table -->
  <div class="table-section">
    <h3>🕒 Pesanan Terbaru</h3>
    <table>
      <thead>
        <tr>
          <th>ID Pesanan</th>
          <th>Customer</th>
          <th>Total</th>
          <th>Status</th>
          <th>Tanggal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($recent_orders as $order)
        <tr>
          <td><strong>#{{ $order->order_number }}</strong></td>
          <td>{{ $order->user->name ?? 'Guest' }}</td>
          <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
          <td>
            @switch($order->status)
              @case('delivered')
                <span class="status success">Terkirim</span>
              @break
              @case('shipped')
                <span class="status pending">Dikirim</span>
              @break
              @case('processing')
                <span class="status pending">Diproses</span>
              @break
              @case('cancelled')
                <span class="status cancelled">Dibatalkan</span>
              @break
              @default
                <span class="status pending">{{ ucfirst($order->status) }}</span>
            @endswitch
          </td>
          <td>{{ $order->created_at->format('d M Y') }}</td>
          <td>
            <a href="{{ route('admin.pesanan.detail', $order->id) }}" style="color: #3b82f6; text-decoration: none; font-weight: 500;">Lihat</a>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" style="text-align: center; color: #9ca3af;">Tidak ada pesanan</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Activity Feed -->
  <div class="activity-section">
    <h3>🔔 Aktivitas Terbaru</h3>

    <div class="activity-item">
      <div class="activity-icon blue">👤</div>
      <div class="activity-content">
        <h4>User baru terdaftar</h4>
        <p>Ahmad Hidayat bergabung sebagai member baru</p>
      </div>
      <div class="activity-time">2 jam lalu</div>
    </div>

    <div class="activity-item">
      <div class="activity-icon green">✅</div>
      <div class="activity-content">
        <h4>Pesanan berhasil diproses</h4>
        <p>Pesanan #ORD-001 telah selesai</p>
      </div>
      <div class="activity-time">4 jam lalu</div>
    </div>

    <div class="activity-item">
      <div class="activity-icon orange">📦</div>
      <div class="activity-content">
        <h4>Produk baru ditambahkan</h4>
        <p>Jersey Third Kit ditambahkan ke katalog</p>
      </div>
      <div class="activity-time">1 hari lalu</div>
    </div>

    <div class="activity-item">
      <div class="activity-icon blue">💬</div>
      <div class="activity-content">
        <h4>Review baru</h4>
        <p>Siti Nurhaliza memberikan review 5 bintang</p>
      </div>
      <div class="activity-time">2 hari lalu</div>
    </div>
  </div>
</div>

<script>
// Sales Chart
const salesCtx = document.getElementById('salesChart').getContext('2d');
new Chart(salesCtx, {
  type: 'line',
  data: {
    labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
    datasets: [{
      label: 'Penjualan (Rp)',
      data: [350000, 420000, 280000, 510000, 450000, 620000, 540000],
      borderColor: '#3b82f6',
      backgroundColor: 'rgba(59, 130, 246, 0.1)',
      tension: 0.4,
      fill: true,
      pointRadius: 5,
      pointHoverRadius: 7,
      pointBackgroundColor: '#3b82f6'
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: true,
    plugins: {
      legend: {
        display: false
      }
    },
    scales: {
      y: {
        beginAtZero: true,
        ticks: {
          callback: function(value) {
            return 'Rp ' + (value/1000) + 'k';
          }
        }
      }
    }
  }
});

// Category Chart
const categoryCtx = document.getElementById('categoryChart').getContext('2d');
new Chart(categoryCtx, {
  type: 'doughnut',
  data: {
    labels: ['Home Kit', 'Away Kit', 'Third Kit', 'Training'],
    datasets: [{
      data: [35, 30, 20, 15],
      backgroundColor: [
        '#3b82f6',
        '#10b981',
        '#f59e0b',
        '#8b5cf6'
      ],
      borderWidth: 0
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: true,
    plugins: {
      legend: {
        position: 'bottom',
        labels: {
          padding: 15,
          usePointStyle: true
        }
      }
    }
  }
});
</script>

</body>
</html>
