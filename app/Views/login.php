<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PQX VP · Login</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
  /* ---------- RESET ---------- */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Trebuchet MS', 'Segoe UI', sans-serif;
  }

  body {
    background: #1a1a5e;
    background-image:
      radial-gradient(circle at 20% 20%, #2b2b8a 0%, transparent 40%),
      radial-gradient(circle at 80% 80%, #3a1f7a 0%, transparent 40%),
      url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 60 60'%3E%3Cpath d='M30 5 L55 30 L30 55 L5 30 Z' fill='none' stroke='%23444' stroke-width='0.5' opacity='0.15'/%3E%3C/svg%3E");
    min-height: 100vh;
    padding: 20px 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    color: #000;
  }

  /* =========================================================
     HEADER CON LOGO PERSONALIZADO
     ========================================================= */
  .header {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 4px 10px;
    margin-bottom: 25px;
  }

  .logo {
    display: flex;
    align-items: center;
    gap: 12px;
    position: relative;
  }

  /* Contenedor de la imagen del logo */
  .logo-img-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .logo-img {
    height: 90px;
    width: auto;
    display: block;
    /* Si tu PNG tiene fondo transparente, perfecto.
       Si tiene fondo azul, agrega un mix-blend-mode */
    filter: drop-shadow(3px 3px 0 rgba(0, 0, 0, 0.6));
  }

  /* Placeholder visual mientras no tengas la imagen */
  .logo-placeholder {
    width: 160px;
    height: 90px;
    background:
      radial-gradient(circle at 50% 50%, #ffdd00 0%, #ffaa00 45%, #cc6600 100%);
    clip-path: polygon(
      50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%,
      50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%
    );
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Impact', sans-serif;
    font-size: 22px;
    color: #fff;
    text-shadow: 2px 2px 0 #cc3300, 3px 3px 0 #000;
    letter-spacing: 1px;
    filter: drop-shadow(3px 3px 0 rgba(0, 0, 0, 0.5));
  }

  /* Texto alternativo si no quieres usar imagen */
  .logo-text-block {
    display: flex;
    flex-direction: column;
    line-height: 1;
  }

  .logo-text-main {
    font-family: 'Impact', 'Arial Black', sans-serif;
    font-size: 46px;
    letter-spacing: 2px;
    color: #ffffff;
    text-shadow:
      3px 3px 0 #cc3300,
      5px 5px 0 #000;
    background: linear-gradient(to bottom, #ffdd00 0%, #ff9900 60%, #cc6600 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    filter: drop-shadow(2px 2px 0 #000);
  }

  .logo-text-sub {
    font-family: 'Impact', sans-serif;
    font-size: 16px;
    letter-spacing: 4px;
    color: #ffffff;
    text-shadow: 2px 2px 0 #cc3300, 3px 3px 0 #000;
    text-align: center;
    margin-top: -2px;
  }

  .logo-since {
    position: absolute;
    bottom: -10px;
    right: 0;
    font-family: 'Trebuchet MS', sans-serif;
    font-style: italic;
    font-size: 9px;
    color: #ffdd00;
    text-shadow: 1px 1px 0 #000;
    letter-spacing: 1px;
  }

  /* =========================================================
     TARJETA LOGIN
     ========================================================= */
  .auth-wrapper {
    display: flex;
    justify-content: center;
    max-width: 420px;
    width: 100%;
  }

  .auth-card {
    background: #ffffff;
    border: 2px solid #000;
    border-radius: 12px;
    box-shadow: 0 5px 0 #000;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    position: relative;
    width: 100%;
  }

  .auth-card-header {
    background: #1a3a8f;
    color: #fff;
    font-family: 'Impact', sans-serif;
    font-size: 16px;
    letter-spacing: 2px;
    padding: 8px 15px;
    text-align: center;
    border-bottom: 2px solid #000;
    text-shadow: 2px 2px 0 #000;
  }

  .auth-card-body {
    padding: 20px;
    background: linear-gradient(to bottom, #cce0ff, #99c0ff);
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  .field {
    display: flex;
    flex-direction: column;
    gap: 4px;
  }

  .field label {
    font-family: 'Impact', sans-serif;
    font-size: 11px;
    letter-spacing: 1px;
    color: #1a3a8f;
    text-shadow: 1px 1px 0 #fff;
  }

  .field input {
    background: #ffffff;
    border: 2px solid #000;
    border-radius: 6px;
    padding: 8px 10px;
    font-size: 12px;
    outline: none;
    box-shadow: inset 2px 2px 0 rgba(0,0,0,0.08);
    transition: box-shadow 0.15s;
  }

  .field input:focus {
    box-shadow: 0 0 0 3px #ffdd00, inset 2px 2px 0 rgba(0,0,0,0.08);
  }

  .btn-submit {
    margin-top: 8px;
    background: #ffdd00;
    border: 2px solid #000;
    border-radius: 25px;
    padding: 10px 20px;
    font-family: 'Impact', sans-serif;
    font-size: 16px;
    letter-spacing: 1px;
    color: #000;
    box-shadow: 0 3px 0 #000;
    cursor: pointer;
    transition: transform 0.1s, box-shadow 0.1s;
  }

  .btn-submit:hover { background: #ffe74d; }
  .btn-submit:active { transform: translateY(3px); box-shadow: 0 0 0 #000; }

  .check-row {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 10px;
    color: #222;
    font-weight: bold;
  }

  .check-row input[type="checkbox"] {
    width: 14px;
    height: 14px;
    accent-color: #cc0000;
    border: 1px solid #000;
  }

  .check-row a { color: #1a3a8f; text-decoration: underline; }

  .switch-text {
    text-align: center;
    font-size: 10px;
    color: #333;
    margin-top: 8px;
  }

  .switch-text a {
    color: #cc0000;
    font-weight: bold;
    text-decoration: underline;
    cursor: pointer;
  }

  .divider {
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 4px 0;
    color: #1a3a8f;
    font-family: 'Impact', sans-serif;
    font-size: 10px;
    letter-spacing: 1px;
  }

  .divider::before,
  .divider::after {
    content: '';
    flex: 1;
    height: 2px;
    background: #000;
  }

  .sticker {
    position: absolute;
    font-size: 28px;
    color: #ffdd00;
    text-shadow: 2px 2px 0 #000;
    pointer-events: none;
  }

  .sticker.star-1 { top: -12px; right: -12px; transform: rotate(15deg); }

  /* =========================================================
     MODAL REGISTRO
     ========================================================= */
  .modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(10, 10, 40, 0.75);
    backdrop-filter: blur(2px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.25s ease, visibility 0.25s ease;
    z-index: 1000;
  }

  .modal-overlay:target {
    opacity: 1;
    visibility: visible;
  }

  .modal-overlay:target .modal-card {
    transform: scale(1) translateY(0);
  }

  .modal-card {
    background: #ffffff;
    border: 3px solid #000;
    border-radius: 14px;
    box-shadow: 0 8px 0 #000, 0 20px 60px rgba(0,0,0,0.5);
    overflow: hidden;
    width: 100%;
    max-width: 480px;
    max-height: 90vh;
    display: flex;
    flex-direction: column;
    position: relative;
    transform: scale(0.85) translateY(20px);
    transition: transform 0.25s ease;
  }

  .modal-header {
    background: #cc0000;
    color: #fff;
    font-family: 'Impact', sans-serif;
    font-size: 18px;
    letter-spacing: 2px;
    padding: 10px 45px 10px 15px;
    text-align: center;
    border-bottom: 2px solid #000;
    text-shadow: 2px 2px 0 #000;
    position: relative;
  }

  .modal-close {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    width: 28px;
    height: 28px;
    background: #ffdd00;
    border: 2px solid #000;
    border-radius: 50%;
    color: #000;
    font-size: 14px;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    box-shadow: 0 2px 0 #000;
    transition: transform 0.1s;
  }

  .modal-close:hover { background: #ffe74d; }
  .modal-close:active { transform: translateY(-50%) scale(0.9); }

  .modal-body {
    padding: 18px 20px;
    background: linear-gradient(to bottom, #ffe0e0, #ffb8b8);
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .modal-body::-webkit-scrollbar { width: 8px; }
  .modal-body::-webkit-scrollbar-track { background: #ffd0d0; }
  .modal-body::-webkit-scrollbar-thumb { background: #cc0000; border-radius: 4px; }

  .modal-body .field label { color: #cc0000; }

  .avatar-picker {
    display: flex;
    flex-direction: column;
    gap: 4px;
    align-items: center;
    margin-bottom: 4px;
  }

  .avatar-picker .img-placeholder {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    border: 3px solid #000;
    background: repeating-linear-gradient(
      45deg,
      #d0d0d0,
      #d0d0d0 6px,
      #e8e8e8 6px,
      #e8e8e8 12px
    );
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 9px;
    font-weight: bold;
    color: #666;
    text-align: center;
    cursor: pointer;
  }

  .avatar-hint {
    font-size: 9px;
    color: #444;
    font-style: italic;
  }

  .modal-body .btn-submit {
    background: #cc0000;
    color: #ffdd00;
    text-shadow: 1px 1px 0 #000;
  }

  .modal-body .btn-submit:hover { background: #e00000; }

  .footer-note {
    margin-top: 25px;
    font-size: 10px;
    color: #ffdd00;
    text-align: center;
    text-shadow: 1px 1px 0 #000;
    font-style: italic;
  }

  .footer-note i { color: #ffdd00; }
</style>
</head>
<body>

  <header class="header">
    <div class="logo">

      <img src="logo.png" alt="P i X U P" class="logo.png"
           onerror="this.style.display='none'; document.getElementById('fallback').style.display='flex';">

      <div id="fallback" style="display:none; align-items:center; gap:10px; position:relative;">
        <span style="font-size:70px; background:linear-gradient(to bottom,#ffdd00,#ff9900,#cc6600); -webkit-background-clip:text; -webkit-text-fill-color:transparent; filter:drop-shadow(3px 3px 0 #000);">★</span>
        <div class="logo-text-block">
          <span class="logo-text-main">P I X</span>
          <br>
          <span class="logo-text-sub">U P</span>
        </div>
      </div>
    </div>
  </header>

  <!-- TARJETA LOGIN -->
  <div class="auth-wrapper">
    <section class="auth-card">
      <div class="auth-card-header">INICIAR SESIÓN</div>
      <div class="auth-card-body">

        <div class="field">
          <label>USUARIO O EMAIL</label>
          <input type="text" placeholder="tu@email.com">
        </div>

        <div class="field">
          <label>CONTRASEÑA</label>
          <input type="password" placeholder="••••••••">
        </div>

        <div class="check-row">
          <input type="checkbox" id="remember">
          <label for="remember" style="font-family:inherit; font-size:10px; letter-spacing:0; color:#222; text-shadow:none;">
            Recordarme 
          </label>
        </div>

        <button class="btn-submit">ENTRAR ›</button>

        <div class="divider">O</div>

        <div class="switch-text">
          ¿No tienes cuenta? <a href="#register">Regístrate aquí</a>
        </div>

        <div class="switch-text">
          <a href="#">Olvidé mi contraseña</a>
        </div>

      </div>
      <i class="fa-solid fa-star sticker star-1"></i>
    </section>
  </div>

  <!-- MODAL REGISTRO -->
  <div class="modal-overlay" id="register">
    <section class="modal-card">

      <div class="modal-header">
        CREAR CUENTA
        <a href="#" class="modal-close">✕</a>
      </div>

      <div class="modal-body">

        <div class="avatar-picker">
          <div class="img-placeholder">SUBIR<br>AVATAR</div>
          <span class="avatar-hint">Sube tu foto de perfil</span>
        </div>

        <div class="field">
          <label>NOMBRE COMPLETO</label>
          <input type="text" placeholder="Ej. Tori Vega">
        </div>

        <div class="field">
          <label>NOMBRE DE USUARIO</label>
          <input type="text" placeholder="tori_v">
        </div>

        <div class="field">
          <label>EMAIL</label>
          <input type="email" placeholder="tu@email.com">
        </div>

        <div class="field">
          <label>CONTRASEÑA</label>
          <input type="password" placeholder="Mínimo 6 caracteres">
        </div>

        <div class="field">
          <label>FECHA DE NACIMIENTO</label>
          <input type="date">
        </div>

       

        <button class="btn-submit">REGISTRARME ›</button>

        <div class="switch-text">
          ¿Ya tienes cuenta? <a href="#">Inicia sesión</a>
        </div>

      </div>

      <i class="fa-solid fa-star sticker star-2"></i>

    </section>
  </div>

</body>
</html>