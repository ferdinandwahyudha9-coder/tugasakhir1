<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kontak - Nand Market</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <header>
    <div class="logo">Nand Market</div>
    <nav>
      <a href="{{route('beranda')}}">Beranda</a>
      <a href="{{route('profil')}}">Profil</a>
      <a href="contact" class="active">Kontak</a>
    </nav>
  </header>

  <section class="content">
    <h1>Hubungi Kami</h1>
    <p>Untuk informasi lebih lanjut atau pemesanan, silakan hubungi kami melalui form berikut:</p>

    <form class="kontak-form">
      <label>Nama:</label>
      <input type="text" placeholder="Masukkan nama Anda" required>

      <label>Email:</label>
      <input type="email" placeholder="Masukkan email Anda" required>

      <label>Pesan:</label>
      <textarea placeholder="Tulis pesan Anda di sini..." required></textarea>

      <button type="submit">Kirim</button>
    </form>

    <div class="info">
      <p><strong>Email:</strong> info@nandmarket.com</p>
      <p><strong>Telepon:</strong> +62 812 3456 7890</p>
      <p><strong>Alamat:</strong> Jl. Raya Fashion No. 123, Jakarta</p>
    </div>
  </section>

  <footer>
    <p>&copy; 2025 Nand Market | Semua hak dilindungi.</p>
  </footer>
</body>
</html>
