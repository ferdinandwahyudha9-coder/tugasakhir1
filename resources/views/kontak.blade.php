<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kontak - Nand Market</title>
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
    }

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
    }

    .logo {
      font-size: 1.8rem;
      font-weight: 700;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    nav a {
      text-decoration: none;
      color: #222;
      margin: 0 20px;
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

    nav a:hover::after,
    nav a.active::after {
      width: 100%;
    }

    nav a:hover,
    nav a.active {
      color: #667eea;
    }

    .content {
      max-width: 800px;
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

    .content h1 {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 20px;
      color: #111;
      position: relative;
      padding-bottom: 15px;
    }

    .content h1::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 80px;
      height: 4px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border-radius: 2px;
    }

    .content p {
      color: #555;
      margin-bottom: 30px;
      line-height: 1.7;
    }

    .kontak-form {
      display: flex;
      flex-direction: column;
      gap: 20px;
      margin-bottom: 30px;
    }

    .kontak-form label {
      font-weight: 500;
      color: #333;
      margin-bottom: -10px;
    }

    .kontak-form input,
    .kontak-form textarea {
      width: 100%;
      padding: 14px 16px;
      border-radius: 10px;
      border: 2px solid #e0e0e0;
      font-size: 1rem;
      font-family: 'Poppins', sans-serif;
      transition: all 0.3s ease;
      background: #f9f9f9;
    }

    .kontak-form input:focus,
    .kontak-form textarea:focus {
      outline: none;
      border-color: #667eea;
      background: #fff;
      box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    .kontak-form textarea {
      resize: vertical;
      min-height: 150px;
    }

    .kontak-form button {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: #fff;
      padding: 16px 30px;
      border-radius: 12px;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      border: none;
      box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    .kontak-form button:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 30px rgba(102, 126, 234, 0.4);
    }

    .info {
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      padding: 25px;
      border-radius: 15px;
      margin-top: 30px;
    }

    .info p {
      margin-bottom: 12px;
      color: #333;
    }

    .info p:last-child {
      margin-bottom: 0;
    }

    footer {
      text-align: center;
      padding: 30px;
      color: rgba(255, 255, 255, 0.8);
      font-size: 0.9rem;
    }

    @media (max-width: 768px) {
      header {
        padding: 15px 20px;
        flex-direction: column;
        gap: 15px;
      }

      .content {
        margin: 30px 20px;
        padding: 25px 20px;
      }

      .content h1 {
        font-size: 1.5rem;
      }
    }
  </style>
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
