<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nand Second - Casual Football Culture</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #fff;
      color: #222;
      line-height: 1.6;
      overflow-x: hidden;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    /* Header */
    header {
      background: #fff;
      color: #111;
      padding: 20px 50px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      border-bottom: 1px solid #e0e0e0;
      z-index: 1000;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      transition: all 0.3s;
    }

    header.scrolled {
      padding: 15px 50px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    header h1 {
      font-size: 1.8rem;
      font-weight: 700;
      letter-spacing: 1px;
      cursor: pointer;
      transition: all 0.3s;
    }

    header h1:hover {
      color: #667eea;
    }

    nav {
      display: flex;
      align-items: center;
      gap: 25px;
      flex-wrap: wrap;
    }

    nav a {
      font-weight: 500;
      transition: 0.3s;
      position: relative;
      padding: 5px 0;
    }

    nav a::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      width: 0;
      height: 2px;
      background: #667eea;
      transition: all 0.3s;
      transform: translateX(-50%);
    }

    nav a:hover::after {
      width: 100%;
    }

    nav a:hover {
      color: #667eea;
    }

    /* Bagian kanan header */
    .nav-right {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    /* Search box */
    .search-box {
      position: relative;
      display: flex;
      align-items: center;
    }

    .search-box input {
      padding: 10px 40px 10px 15px;
      border: 2px solid #e0e0e0;
      border-radius: 25px;
      font-size: 0.9rem;
      transition: all 0.3s;
      width: 200px;
    }

    .search-box input:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
      width: 250px;
    }

    .search-box img {
      position: absolute;
      right: 15px;
      width: 18px;
      height: 18px;
      opacity: 0.6;
      pointer-events: none;
    }

    /* Icon keranjang */
    .icon-btn {
      background: transparent;
      border: none;
      cursor: pointer;
      display: flex;
      align-items: center;
      position: relative;
      padding: 8px;
      border-radius: 50%;
      transition: all 0.3s;
    }

    .icon-btn:hover {
      background: #f5f5f5;
    }

    .icon-btn img {
      width: 26px;
      height: 26px;
      transition: transform 0.3s ease;
    }

    .icon-btn:hover img {
      transform: scale(1.15);
    }

    .cart-badge {
      position: absolute;
      top: 0;
      right: 0;
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
      box-shadow: 0 2px 8px rgba(255, 59, 59, 0.4);
    }

    /* User web Menu */
    .user-menu {
      display: flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
      padding: 8px 15px;
      border-radius: 25px;
      transition: all 0.3s;
      border: 2px solid #e0e0e0;
    }

    .user-menu:hover {
      background: #f5f5f5;
      border-color: #667eea;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(102, 126, 234, 0.2);
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
      box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
    }

    .user-name {
      font-weight: 600;
      font-size: 0.95rem;
      color: #111;
    }

    .login-btn {
      padding: 10px 25px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border: none;
      border-radius: 25px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      font-size: 0.95rem;
      box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .login-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }

    /* Hero Section dengan background slideshow */
    .hero {
      position: relative;
      height: 85vh;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: #fff;
      overflow: hidden;
    }

    .hero-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3));
      z-index: 1;
    }

    .hero-content {
      position: relative;
      z-index: 2;
      max-width: 900px;
      padding: 0 20px;
      animation: fadeInUp 1s ease;
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

    .hero h2 {
      font-size: 3.5rem;
      margin-bottom: 25px;
      text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
      font-weight: 800;
      letter-spacing: 2px;
    }

    .hero p {
      font-size: 1.4rem;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
      margin-bottom: 30px;
      font-weight: 300;
    }

    .hero-cta {
      display: flex;
      gap: 20px;
      justify-content: center;
      margin-top: 40px;
    }

    .cta-btn {
      padding: 15px 40px;
      border-radius: 30px;
      font-weight: 600;
      font-size: 1rem;
      cursor: pointer;
      transition: all 0.3s;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .cta-primary {
      background: white;
      color: #111;
      border: none;
    }

    .cta-primary:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 30px rgba(255, 255, 255, 0.3);
    }

    .cta-secondary {
      background: transparent;
      color: white;
      border: 2px solid white;
    }

    .cta-secondary:hover {
      background: white;
      color: #111;
      transform: translateY(-5px);
    }

    /* Slideshow background */
    .hero::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-size: cover;
      background-position: center;
      animation: slideShow 18s infinite;
      z-index: 0;
    }

    @keyframes slideShow {

      0%,
      33% {
        background-image: url('/images/lctb.jpeg');
      }

      34%,
      66% {
        background-image: url('/images/lcb.jpeg');
      }

      67%,
      100% {
        background-image: url('/images/true.jpeg');
      }
    }

    /* Stats Section */
    .stats-section {
      background: #111;
      color: white;
      padding: 60px 50px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 40px;
      text-align: center;
    }

    .stat-item {
      padding: 20px;
    }

    .stat-number {
      font-size: 3rem;
      font-weight: 800;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 10px;
    }

    .stat-label {
      font-size: 1rem;
      color: #aaa;
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    /* Story Section */
    .story {
      max-width: 1200px;
      margin: 100px auto;
      padding: 0 50px;
    }

    .story h2 {
      text-align: center;
      font-size: 3rem;
      margin-bottom: 20px;
      font-weight: 800;
    }

    .story>p {
      text-align: center;
      color: #666;
      font-size: 1.1rem;
      margin-bottom: 60px;
      max-width: 700px;
      margin-left: auto;
      margin-right: auto;
    }

    .timeline {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 40px;
      margin-top: 60px;
    }

    .timeline-item {
      background: #fff;
      padding: 35px;
      border-radius: 15px;
      text-align: center;
      border: 2px solid #f0f0f0;
      transition: all 0.4s;
      position: relative;
      overflow: hidden;
    }

    .timeline-item::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
      transform: scaleX(0);
      transition: transform 0.4s;
    }

    .timeline-item:hover::before {
      transform: scaleX(1);
    }

    .timeline-item:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
      border-color: #667eea;
    }

    .timeline-item h3 {
      margin-bottom: 15px;
      color: #111;
      font-weight: 700;
      font-size: 1.5rem;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .timeline-item p {
      color: #555;
      font-size: 1rem;
      line-height: 1.8;
    }

    /* Featured Products */
    .featured {
      background: #f9f9f9;
      padding: 100px 50px;
    }

    .featured-inner {
      max-width: 1400px;
      margin: 0 auto;
    }

    .featured h2 {
      text-align: center;
      font-size: 3rem;
      margin-bottom: 20px;
      font-weight: 800;
    }

    .featured>p {
      text-align: center;
      color: #666;
      font-size: 1.1rem;
      margin-bottom: 60px;
    }

    .produk-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 35px;
    }

    .produk-card {
      position: relative;
      overflow: hidden;
      border-radius: 15px;
      cursor: pointer;
      background: #fff;
      border: 2px solid transparent;
      transition: all 0.4s;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .produk-card:hover {
      transform: translateY(-15px);
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
      border-color: #667eea;
    }

    .produk-card img {
      width: 100%;
      height: 400px;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .produk-card:hover img {
      transform: scale(1.15) rotate(2deg);
    }

    .produk-card .overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      background: rgba(255, 255, 255, 0.95);
      color: #111;
      padding: 20px;
      text-align: center;
      font-weight: 500;
      opacity: 0;
      transform: translateY(100%);
      transition: 0.4s;
      backdrop-filter: blur(10px);
    }

    .produk-card:hover .overlay {
      opacity: 1;
      transform: translateY(0);
    }

    .overlay p:first-child {
      font-weight: 700;
      font-size: 1.1rem;
      margin-bottom: 8px;
    }

    .overlay p:last-child {
      color: #10b981;
      font-size: 1.2rem;
      font-weight: 700;
    }

    /* Label pemanis produk */
    .produk-card .label {
      position: absolute;
      top: 15px;
      left: 15px;
      background: linear-gradient(135deg, #ff3b3b 0%, #ff6b6b 100%);
      color: #fff;
      padding: 8px 16px;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 700;
      z-index: 2;
      box-shadow: 0 4px 15px rgba(255, 59, 59, 0.4);
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    /* Profile Section */
    .profile {
      background: #fff;
      padding: 100px 50px;
      text-align: center;
    }

    .profile h2 {
      font-size: 3rem;
      margin-bottom: 30px;
      font-weight: 800;
    }

    .profile p {
      max-width: 900px;
      margin: 0 auto;
      color: #555;
      font-size: 1.15rem;
      line-height: 2;
    }

    /* Contact Section */
    .contact {
      background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
      color: white;
      padding: 100px 50px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .contact::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 70%);
      animation: rotate 20s linear infinite;
    }

    @keyframes rotate {
      from {
        transform: rotate(0deg);
      }

      to {
        transform: rotate(360deg);
      }
    }

    .contact-content {
      position: relative;
      z-index: 2;
    }

    .contact h2 {
      font-size: 3rem;
      margin-bottom: 20px;
      font-weight: 800;
    }

    .contact>p {
      font-size: 1.1rem;
      margin-bottom: 40px;
      opacity: 0.9;
    }

    .contact-info {
      display: flex;
      justify-content: center;
      gap: 40px;
      margin: 40px 0;
      flex-wrap: wrap;
    }

    .contact-info p {
      font-size: 1.1rem;
      margin: 8px 0;
    }

    .contact a {
      color: #fff;
      font-weight: 600;
      transition: all 0.3s;
    }

    .contact a:hover {
      color: #667eea;
      text-decoration: underline;
    }

    .contact form {
      max-width: 600px;
      margin: 50px auto;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .contact input,
    .contact textarea {
      padding: 15px 20px;
      border-radius: 10px;
      border: 2px solid rgba(255, 255, 255, 0.2);
      font-size: 1rem;
      background: rgba(255, 255, 255, 0.1);
      color: white;
      backdrop-filter: blur(10px);
    }

    .contact input::placeholder,
    .contact textarea::placeholder {
      color: rgba(255, 255, 255, 0.6);
    }

    .contact input:focus,
    .contact textarea:focus {
      outline: none;
      border-color: #667eea;
      background: rgba(255, 255, 255, 0.15);
    }

    .contact button {
      padding: 15px;
      background: white;
      color: #111;
      border: none;
      border-radius: 10px;
      font-weight: 700;
      cursor: pointer;
      font-size: 1rem;
      transition: all 0.3s;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .contact button:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 30px rgba(255, 255, 255, 0.3);
    }

    /* Footer */
    footer {
      background: #111;
      color: #aaa;
      text-align: center;
      padding: 40px 20px;
    }

    footer a {
      color: #fff;
      margin: 0 15px;
      font-weight: 500;
      transition: all 0.3s;
    }

    footer a:hover {
      color: #667eea;
    }

    /* Scroll to top button */
    .scroll-top {
      position: fixed;
      bottom: 30px;
      right: 30px;
      width: 50px;
      height: 50px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border: none;
      border-radius: 50%;
      cursor: pointer;
      display: none;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      z-index: 999;
      box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
      transition: all 0.3s;
    }

    .scroll-top:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
    }

    .scroll-top.show {
      display: flex;
    }

    /* Responsive */
    @media(max-width:768px) {
      header {
        flex-direction: column;
        align-items: flex-start;
        padding: 15px 20px;
      }

      nav {
        flex-wrap: wrap;
        justify-content: space-between;
        width: 100%;
        margin-top: 10px;
      }

      .nav-right {
        width: 100%;
        justify-content: space-between;
        margin-top: 10px;
      }

      .search-box {
        flex: 1;
      }

      .search-box input {
        width: 100%;
      }

      .hero {
        height: 70vh;
      }

      .hero h2 {
        font-size: 2.2rem;
      }

      .hero p {
        font-size: 1.1rem;
      }

      .hero-cta {
        flex-direction: column;
        gap: 15px;
      }

      .cta-btn {
        width: 100%;
      }

      .stats-section {
        padding: 40px 20px;
        gap: 30px;
      }

      .stat-number {
        font-size: 2.5rem;
      }

      .story,
      .featured,
      .profile,
      .contact {
        padding: 60px 20px;
      }

      .story h2,
      .featured h2,
      .profile h2,
      .contact h2 {
        font-size: 2rem;
      }

      .timeline {
        grid-template-columns: 1fr;
      }

      .produk-container {
        grid-template-columns: 1fr;
      }

      .produk-card img {
        height: 300px;
      }

      .contact-info {
        flex-direction: column;
        gap: 20px;
      }
    }
  </style>
</head>

<body>

  <header id="header">
    <h1 onclick="window.location.href='{{route('beranda')}}'">Nand Second</h1>
    <nav>
      <a href="{{route('produk')}}">Produk</a>
      <a href="#story">Sejarah</a>
      <a href="#contact">Kontak</a>

      <div class="nav-right">
        <div class="search-box">
          <input type="text" id="searchInput" placeholder="Cari produk...">
          <img src="/images/download.jpg" alt="Cari">
        </div>
        <button class="icon-btn" onclick="window.location.href='{{route('keranjang')}}'">
          <img src="/images/keranjang.jpg" alt="Keranjang">
          <span class="cart-badge" id="cartBadge" style="display:none;">0</span>
        </button>

        <!-- USER MENU -->
        @auth
          <div class="user-menu" onclick="window.location.href='{{route('profil')}}'" title="Profil Saya">
            <div class="user-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
            <span class="user-name">{{ explode(' ', Auth::user()->name)[0] }}</span>
          </div>
        @else
          <button class="login-btn" onclick="window.location.href='{{route('register')}}'">Login</button>
        @endauth
      </div>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <h2>FROM THE STREETS TO THE PITCH</h2>
      <p>Explore the culture of casual football through our exclusive collection</p>
      <div class="hero-cta">
        <button class="cta-btn cta-primary" onclick="window.location.href='{{route('produk')}}'">Shop Now</button>
        <button class="cta-btn cta-secondary" onclick="window.location.href='#story'">Our Story</button>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <!-- <section class="stats-section">
  <div class="stat-item">
    <div class="stat-number">500+</div>
    <div class="stat-label">Happy Customers</div>
  </div>
  <div class="stat-item">
    <div class="stat-number">50+</div>
    <div class="stat-label">Products</div>
  </div>
  <div class="stat-item">
    <div class="stat-number">100%</div>
    <div class="stat-label">Authentic</div>
  </div>
  <div class="stat-item">
    <div class="stat-number">5⭐</div>
    <div class="stat-label">Rating</div>
  </div> -->
  </section>

  <!-- Story Section -->
  <section class="story" id="story">
    <h2>The History of Casual Football</h2>
    <p>Perjalanan budaya sepak bola kasual dari jalanan Inggris hingga menjadi fenomena global</p>
    <div class="timeline">
      <div class="timeline-item">
        <h3>1960s–70s</h3>
        <p>Origin of casual football in the UK: street style meets football passion. Era dimana fashion menjadi
          identitas.</p>
      </div>
      <div class="timeline-item">
        <h3>1980s</h3>
        <p>Streetwear & football culture merge, creating iconic looks. Lahirnya style yang legendaris dan timeless.</p>
      </div>
      <div class="timeline-item">
        <h3>Modern Era</h3>
        <p>Global influence: casual football inspires fashion worldwide. Budaya yang terus hidup dan berkembang.</p>
      </div>
    </div>
  </section>

  <!-- Featured Products -->
  <section class="featured" id="produk">
    <div class="featured-inner">
      <h2>Featured Collection</h2>
      <p>Koleksi terpilih dengan design autentik dan kualitas premium</p>
      <div class="produk-container" id="produkContainer"></div>
    </div>
  </section>

  <!-- Profile Section -->
  <section class="profile" id="profile">
    <h2>Tentang Nand Second</h2>
    <p>
      Nand Second lahir dari kecintaan mendalam terhadap budaya sepak bola jalanan dan gaya kasual yang autentik.
      Kami percaya bahwa sepak bola bukan hanya tentang pertandingan, tetapi juga tentang identitas, ekspresi diri, dan
      kebersamaan.
      Setiap koleksi kami menghadirkan semangat itu dengan desain yang penuh karakter dan kualitas terbaik.
      Kami bukan sekadar menjual pakaian, tetapi menawarkan sebuah gaya hidup dan komunitas.
    </p>
  </section>

  <!-- Contact Section -->
  <section class="contact" id="contact">
    <div class="contact-content">
      <h2>Hubungi Kami</h2>
      <p>Punya pertanyaan? Kami siap membantu Anda!</p>

      <div class="contact-info">
        <p>📧 <a href="mailto:nandsecond@gmail.com">nandsecond@gmail.com</a></p>
        <p>📸 <a href="https://instagram.com/nandsecond" target="_blank">@nandsecond</a></p>
        <p>💬 <a href="https://wa.me/628123456789" target="_blank">+62 812-3456-789</a></p>
      </div>

      <form action="https://formspree.io/f/xpwogbqk" method="POST">
        <input type="text" name="name" placeholder="Nama Anda" required>
        <input type="email" name="email" placeholder="Email Anda" required>
        <textarea name="message" placeholder="Tulis pesan..." required rows="5"></textarea>
        <button type="submit">Kirim Pesan</button>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>© 2025 Nand Second. All rights reserved.</p>
    <p style="margin-top: 15px;">
      <!-- <a href="index.html">Home</a>
    <a href="produk.html">Produk</a>
    <a href="kontak.html">Kontak</a> -->
    </p>
  </footer>

  <!-- Scroll to Top Button -->
  <button class="scroll-top" id="scrollTop" onclick="scrollToTop()">↑</button>

  <script>


    // Update cart badge
    function updateCartBadge() {
      const cart = JSON.parse(localStorage.getItem('cart')) || [];
      const badge = document.getElementById('cartBadge');
      if (cart.length > 0) {
        badge.textContent = cart.length;
        badge.style.display = 'flex';
      } else {
        badge.style.display = 'none';
      }
    }

    // Check user login status
    function checkUserLogin() {
      // Check if user is authenticated (you can modify this based on your auth mechanism)
      const isAuthenticated = localStorage.getItem('userAuthenticated') === 'true';

      // You can use this to conditionally show/hide elements
      // For example: show login button if not authenticated
      console.log('User authenticated:', isAuthenticated);
    }

    // Produk list
    const produkList = [
      { id: 1, nama: "MP x LC TRUE BLOOD", hargaStr: "Rp 180.000", image: "/images/tb1.jpeg", label: "New" },
      { id: 2, nama: "Lads Club Moscow", hargaStr: "Rp 260.000", image: "/images/lc1.jpeg", label: "Best Seller" },
      { id: 3, nama: "FNF x PH", hargaStr: "Rp 330.000", image: "/images/bh1.jpeg", label: "Hot" },
      { id: 4, nama: "James Boogie", hargaStr: "Rp 450.000", image: "/images/jb1.jpeg", label: "New" }
    ];

    const container = document.getElementById('produkContainer');
    produkList.forEach(p => {
      const card = document.createElement('div');
      card.className = 'produk-card';
      card.innerHTML = `
    <div class="label">${p.label}</div>
    <a href="detail_produk?id=${p.id}">
      <img src="${p.image}" alt="${p.nama}">
      <div class="overlay">
        <p>${p.nama}</p>
        <p>${p.hargaStr}</p>
      </div>
    </a>
  `;
      container.appendChild(card);
    });

    // Search functionality
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('keypress', (e) => {
      if (e.key === 'Enter') {
        e.preventDefault();
        const keyword = searchInput.value.trim();
        if (keyword) {
          window.location.href = `produk.blade.php?search=${encodeURIComponent(keyword)}`;
        }
      }
    });

    // Header scroll effect
    window.addEventListener('scroll', () => {
      const header = document.getElementById('header');
      if (window.scrollY > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }

      // Scroll to top button
      const scrollTop = document.getElementById('scrollTop');
      if (window.scrollY > 300) {
        scrollTop.classList.add('show');
      } else {
        scrollTop.classList.remove('show');
      }
    });

    // Scroll to top
    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });

    // Initialize
    checkUserLogin();
    updateCartBadge();
  </script>

</body>

</html>