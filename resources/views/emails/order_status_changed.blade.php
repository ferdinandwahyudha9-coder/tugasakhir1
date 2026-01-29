<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Status Pesanan</title>
</head>

<body>
    <h2>Update Status Pesanan: {{ $order->order_number }}</h2>
    <p>Halo {{ $order->user?->name ?? 'Customer' }},</p>
    <p>Status pesanan Anda telah diubah:</p>
    <ul>
        <li>Nomor Pesanan: <strong>{{ $order->order_number }}</strong></li>
        <li>Status Sebelumnya: <strong>{{ ucfirst($oldStatus) }}</strong></li>
        <li>Status Sekarang: <strong>{{ ucfirst($newStatus) }}</strong></li>
        <li>Total: Rp {{ number_format($order->total_harga, 0, ',', '.') }}</li>
    </ul>
    <p>Jika Anda memiliki pertanyaan, balas email ini atau hubungi toko.</p>
    <p>Terima kasih,<br />Nand Second</p>
</body>

</html>