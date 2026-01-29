<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login & Register</title>

<style>
*{
  box-sizing:border-box;
  font-family:'Segoe UI',sans-serif;
}

body{
  margin:0;
  height:100vh;
  background:linear-gradient(135deg,#141e30,#243b55);
  display:flex;
  align-items:center;
  justify-content:center;
  overflow:hidden;
}

.bubble{
  position:absolute;
  width:120px;
  height:120px;
  background:rgba(255,255,255,0.15);
  border-radius:50%;
  animation:float 6s infinite ease-in-out;
}
.bubble:nth-child(1){top:10%;left:15%;}
.bubble:nth-child(2){bottom:20%;right:10%;animation-delay:2s;}
.bubble:nth-child(3){top:50%;right:30%;animation-delay:4s;}

@keyframes float{
  0%{transform:translateY(0);}
  50%{transform:translateY(-30px);}
  100%{transform:translateY(0);}
}

.container{
  width:760px;
  height:420px;
  background:#fff;
  border-radius:15px;
  box-shadow:0 20px 40px rgba(0,0,0,0.3);
  position:relative;
  overflow:hidden;
  display:flex;
}

.form{
  position:absolute;
  width:50%;
  height:100%;
  display:flex;
  flex-direction:column;
  align-items:center;
  justify-content:center;
  padding:40px;
  transition:0.6s ease;
}

.form h2{
  text-align:center;
  color:#333;
  margin-bottom:30px;
}

.form input{
  width:100%;
  padding:12px;
  margin:10px 0;
  border:1px solid #ddd;
  border-radius:8px;
  font-size:0.95rem;
}

.form input:focus{
  outline:none;
  border-color:#667eea;
  box-shadow:0 0 0 3px rgba(102,126,234,0.1);
}

.form button{
  width:100%;
  padding:12px;
  margin-top:20px;
  background:linear-gradient(135deg,#667eea,#764ba2);
  color:white;
  border:none;
  border-radius:8px;
  font-weight:600;
  cursor:pointer;
  transition:0.3s;
}

.form button:hover{
  transform:translateY(-2px);
  box-shadow:0 8px 20px rgba(102,126,234,0.4);
}

.login{
  left:0;
  z-index:2;
}

.register{
  left:0;
  opacity:0;
  z-index:1;
}

.container.active .login{
  transform:translateX(100%);
  opacity:0;
}

.container.active .register{
  transform:translateX(100%);
  opacity:1;
  z-index:2;
}

.overlay{
  position:absolute;
  width:50%;
  height:100%;
  right:0;
  background:linear-gradient(135deg,#141e30,#243b55);
  color:white;
  display:flex;
  align-items:center;
  justify-content:center;
  text-align:center;
  padding:40px;
  transition:0.6s ease;
}

.container.active .overlay{
  transform:translateX(-100%);
}

.overlay button{
  margin-top:15px;
  padding:10px 25px;
  border-radius:20px;
  background:transparent;
  border:2px solid white;
  color:white;
  cursor:pointer;
  transition:0.3s;
}

.overlay button:hover{
  background:white;
  color:#333;
}

.error-msg{
  color:#ef4444;
  font-size:0.85rem;
  margin-top:8px;
  text-align:center;
  background:#fee2e2;
  padding:8px;
  border-radius:4px;
}

.success-msg{
  color:#10b981;
  font-size:0.85rem;
  margin-top:8px;
  text-align:center;
  background:#d1fae5;
  padding:8px;
  border-radius:4px;
}
</style>
</head>

<body>

<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>

<div class="container" id="container">

  <!-- LOGIN -->
  <div class="form login">
    <h2>Login</h2>
    @if($errors->any())
      <div class="error-msg">{{ $errors->first() }}</div>
    @endif
    <form action="{{ route('auth.login') }}" method="POST">
      @csrf
      <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
      <input type="password" name="password" placeholder="Password" required>
      @if($errors->has('email') || $errors->has('password'))
        <div class="error-msg">Email atau password salah!</div>
      @endif
      <button type="submit">Login</button>
    </form>
  </div>

  <!-- REGISTER -->
  <div class="form register">
    <h2>Register</h2>
    @if($errors->any())
      <div class="error-msg">
        @foreach($errors->all() as $error)
          <div>{{ $error }}</div>
        @endforeach
      </div>
    @endif
    <form action="{{ route('auth.register') }}" method="POST" style="width: 100%;">
      @csrf
      <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
      <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
      <button type="submit">Daftar</button>
    </form>
  </div>

  <!-- OVERLAY -->
  <div class="overlay">
    <div id="overlayText">
      <h2>Halo, Teman!</h2>
      <p>Belum punya akun?</p>
      <button onclick="toggle()">Register</button>
    </div>
  </div>

</div>

<script>
const container = document.getElementById("container");
const overlayText = document.getElementById("overlayText");

function toggle(){
  container.classList.toggle("active");

  if(container.classList.contains("active")){
    overlayText.innerHTML = `
      <h2>Selamat Datang!</h2>
      <p>Sudah punya akun?</p>
      <button type="button" onclick="toggle()">Login</button>
    `;
  }else{
    overlayText.innerHTML = `
      <h2>Halo, Teman!</h2>
      <p>Belum punya akun?</p>
      <button type="button" onclick="toggle()">Register</button>
    `;
  }
}

// Show register form jika ada error saat register
document.addEventListener('DOMContentLoaded', function() {
  // Cek apakah ada error di register field
  const registerErrors = document.querySelectorAll('.register .error-msg');
  if(registerErrors.length > 0) {
    container.classList.add('active');
  }
});
</script>

</body>
</html>
