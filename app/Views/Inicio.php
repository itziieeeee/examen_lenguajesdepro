<!DOCTYPE html>
<html lang="es">
<head>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/brython@3/brython.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/brython@3/brython_stdlib.js"></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PixUp</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="<?= base_url('CSS/iniciocss.css'); ?>">
</head>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Trebuchet MS', 'Segoe UI', sans-serif;
  }

  :root {
    --blue-bg: #1a1a5e;
    --blue-bg-2: #2b2b8a;
    --blue-bg-3: #3a1f7a;
    --navy: #1a3a8f;
    --navy-dark: #0d1f5c;
    --sky-1: #cce0ff;
    --sky-2: #99c0ff;
    --orange-1: #ff8800;
    --orange-2: #cc4400;
    --yellow: #ffdd00;
    --yellow-2: #ffe680;
    --red: #cc0000;
    --red-dark: #880000;
    --pink-1: #d946a8;
    --pink-2: #a83b9c;
    --green: #22c55e;
    --ink: #000;
  }

  body {
    background: var(--blue-bg);
    background-image:
      radial-gradient(circle at 20% 20%, var(--blue-bg-2) 0%, transparent 40%),
      radial-gradient(circle at 80% 80%, var(--blue-bg-3) 0%, transparent 40%),
      url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 60 60'%3E%3Cpath d='M30 5 L55 30 L30 55 L5 30 Z' fill='none' stroke='%23444' stroke-width='0.5' opacity='0.15'/%3E%3C/svg%3E");
    padding: 10px;
    min-height: 100vh;
    color: #000;
  }

  a { text-decoration: none; color: inherit; }
  button { font-family: inherit; cursor: pointer; }
  img { display: block; max-width: 100%; }

  .wrap {
    max-width: 1280px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

  /* HEADER */
  .topbar {
    background: linear-gradient(to bottom, var(--orange-1), var(--orange-2));
    border: 2px solid #000;
    border-radius: 20px;
    box-shadow: 0 4px 0 #000;
    padding: 8px 14px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    position: relative;
    overflow: hidden;
  }

  .topbar::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -10%;
    width: 60px;
    height: 200%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.35), transparent);
    transform: rotate(20deg);
    pointer-events: none;
  }

  .brand { display: flex; align-items: center; gap: 10px; }

  .brand-mark {
    width: 46px;
    height: 46px;
    border-radius: 12px;
    background: linear-gradient(to bottom, var(--yellow), #ffaa00);
    border: 2px solid #000;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    color: #000;
    box-shadow: 2px 3px 0 #000;
    transform: rotate(-6deg);
  }

  .brand-name {
    font-family: 'Impact', 'Arial Black', sans-serif;
    font-size: 30px;
    letter-spacing: 1px;
    color: #ffffff;
    text-shadow: 3px 3px 0 #cc3300, 4px 4px 0 #000;
    line-height: 1;
  }

  .brand-tag {
    font-size: 10px;
    color: #fff;
    font-style: italic;
    text-shadow: 1px 1px 0 #000;
    margin-top: 2px;
  }

  .search-pill {
    flex: 1;
    max-width: 360px;
    display: flex;
    align-items: center;
    gap: 6px;
    background: #ffffff;
    border: 2px solid #000;
    border-radius: 30px;
    padding: 4px 4px 4px 14px;
    box-shadow: 0 3px 0 #000, inset 2px 2px 0 rgba(0,0,0,0.08);
  }

  .search-pill input {
    border: none;
    outline: none;
    font-size: 12px;
    flex: 1;
    background: transparent;
    color: #000;
  }

  .search-pill button {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: var(--red);
    border: 2px solid #000;
    color: #ffffff;
    font-size: 11px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 0 #000;
    transition: transform 0.1s;
  }

  .search-pill button:active { transform: translateY(2px); box-shadow: 0 0 0 #000; }

  .head-actions { display: flex; align-items: center; gap: 8px; }

  .icon-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #ffffff;
    border: 2px solid #000;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--red);
    font-size: 15px;
    position: relative;
    box-shadow: 0 3px 0 #000;
    transition: transform 0.1s;
  }

  .icon-btn:active { transform: translateY(3px); box-shadow: 0 0 0 #000; }

  .icon-btn .dot {
    position: absolute;
    top: -5px;
    right: -5px;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background: var(--yellow);
    border: 2px solid #000;
    font-size: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #000;
    font-weight: bold;
  }

  .btn-login {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--yellow);
    color: #000;
    border: 2px solid #000;
    border-radius: 25px;
    padding: 10px 22px;
    font-family: 'Impact', sans-serif;
    font-size: 14px;
    letter-spacing: 1px;
    box-shadow: 0 4px 0 #000;
    transition: transform 0.1s, box-shadow 0.1s, background 0.15s;
  }

  .btn-login i { color: var(--red); font-size: 15px; }
  .btn-login:hover { background: #ffe74d; }
  .btn-login:active { transform: translateY(4px); box-shadow: 0 0 0 #000; }

  /* NAVBAR */
  .navpills {
    background: linear-gradient(to bottom, var(--navy), var(--navy-dark));
    border: 2px solid #000;
    border-radius: 20px;
    box-shadow: 0 4px 0 #000;
    padding: 6px 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    flex-wrap: wrap;
  }

  .navpills a {
    font-family: 'Impact', sans-serif;
    color: #ffffff;
    font-size: 12px;
    letter-spacing: 1px;
    padding: 7px 16px;
    border-radius: 20px;
    border: 2px solid transparent;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    text-shadow: 1px 1px 0 #000;
    transition: background 0.15s, color 0.15s;
  }

  .navpills a.active {
    background: var(--yellow);
    color: #000;
    border-color: #000;
    box-shadow: 0 3px 0 #000;
    text-shadow: none;
  }

  .navpills a:not(.active):hover {
    background: rgba(255, 255, 255, 0.15);
  }

  /* LAYOUT */
  .layout {
    display: grid;
    grid-template-columns: 250px 1fr 270px;
    gap: 8px;
    align-items: start;
  }

  .stack {
    display: flex;
    flex-direction: column;
    gap: 8px;
    position: sticky;
    top: 10px;
  }

  /* PANEL */
  .panel {
    background: #ffffff;
    border: 2px solid #000;
    border-radius: 12px;
    box-shadow: 0 4px 0 #000;
    overflow: hidden;
  }

  .panel-head {
    font-family: 'Impact', sans-serif;
    font-size: 13px;
    letter-spacing: 1.5px;
    color: #ffffff;
    padding: 6px 12px;
    display: flex;
    align-items: center;
    gap: 8px;
    border-bottom: 2px solid #000;
    text-shadow: 1px 1px 0 #000;
  }

  .panel-head i { color: var(--yellow); }

  .ph-pink   { background: linear-gradient(to bottom, var(--orange-1), var(--orange-2)); }
  .ph-blue   { background: linear-gradient(to bottom, var(--navy), var(--navy-dark)); }
  .ph-purple { background: linear-gradient(to bottom, var(--pink-1), var(--pink-2)); }
  .ph-cyan   { background: linear-gradient(to bottom, var(--orange-1), var(--orange-2)); }
  .ph-green  { background: linear-gradient(to bottom, var(--green), #128a3e); }

  /* CONTACTOS */
  .contacts-wrap {
    background: linear-gradient(to bottom, var(--sky-1), var(--sky-2));
    padding: 8px;
    max-height: 300px;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    gap: 6px;
  }

  .contacts-wrap::-webkit-scrollbar { width: 6px; }
  .contacts-wrap::-webkit-scrollbar-track { background: #b8d0f0; border-radius: 10px; }
  .contacts-wrap::-webkit-scrollbar-thumb { background: var(--navy); border-radius: 10px; }

  .contact-row {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #ffffff;
    border: 2px solid #000;
    border-radius: 8px;
    padding: 5px 6px;
    box-shadow: 0 3px 0 #000;
    transition: transform 0.15s;
  }

  .contact-row:hover { transform: translateX(3px); }

  .contact-row img {
    width: 36px;
    height: 36px;
    border-radius: 6px;
    object-fit: cover;
    border: 2px solid #000;
    flex-shrink: 0;
  }

  .contact-row .cname {
    font-family: 'Impact', sans-serif;
    font-size: 11px;
    color: var(--navy);
    letter-spacing: 0.3px;
  }

  .contact-row .cstat {
    font-size: 8px;
    color: #666;
    display: flex;
    align-items: center;
    gap: 3px;
    margin-top: 1px;
  }

  .contact-row .cstat i { color: var(--green); font-size: 6px; }

  .contact-row button {
    margin-left: auto;
    background: var(--yellow);
    border: 2px solid #000;
    border-radius: 20px;
    padding: 4px 10px;
    font-family: 'Impact', sans-serif;
    font-size: 11px;
    color: #000;
    box-shadow: 0 2px 0 #000;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.1s, background 0.15s;
  }

  .contact-row button:hover { background: #ffe74d; }
  .contact-row button:active { transform: translateY(2px); box-shadow: 0 0 0 #000; }

  /* EMPTY BOX */
  .empty-box {
    background: linear-gradient(to bottom, #fff7cc, var(--yellow-2));
    padding: 24px 14px;
    text-align: center;
  }

  .empty-box i {
    font-size: 28px;
    color: var(--orange-2);
    margin-bottom: 8px;
    display: block;
    text-shadow: 1px 1px 0 #fff;
  }

  .empty-box p {
    font-family: 'Impact', sans-serif;
    font-size: 12px;
    color: #7a5200;
    letter-spacing: 0.5px;
    line-height: 1.4;
  }

  .empty-box span {
    font-size: 9px;
    color: #a37a2d;
    display: block;
    margin-top: 4px;
    font-style: italic;
  }

  .notif-empty { background: linear-gradient(to bottom, #ffe0e0, #ffb8b8); }
  .notif-empty i { color: var(--red); }
  .notif-empty p { color: var(--red); }
  .notif-empty span { color: #a03030; }

  .saved-empty { background: linear-gradient(to bottom, #fff7cc, var(--yellow-2)); }

  /* MI MURO */
  .wall-card {
    background: linear-gradient(to bottom, var(--navy), var(--navy-dark));
    color: #ffffff;
    border: 2px solid #000;
    border-radius: 12px;
    box-shadow: 0 4px 0 #000;
    overflow: hidden;
  }

  .wall-hero {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 16px 12px 12px;
  }

  .avatar-ring {
    width: 82px;
    height: 82px;
    border-radius: 50%;
    background: conic-gradient(var(--yellow), var(--orange-1), var(--pink-1), var(--yellow));
    padding: 4px;
    margin-bottom: 8px;
    box-shadow: 0 3px 0 #000;
  }

  .avatar-ring img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #000;
  }

  .wall-hero .uname {
    font-family: 'Impact', sans-serif;
    font-size: 18px;
    color: var(--yellow);
    text-shadow: 2px 2px 0 #000;
    letter-spacing: 1.5px;
  }

  .wall-hero .uhandle {
    font-size: 10px;
    color: #c9d4ff;
    margin-top: 2px;
    font-style: italic;
  }

  .mood-row {
    background: #ffffff;
    color: #000;
    margin: 0 12px 12px;
    border-radius: 6px;
    border: 2px solid #000;
    padding: 6px 10px;
    font-size: 10px;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 3px 0 #000;
  }

  .mood-row .flame {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: var(--yellow);
    border: 2px solid #000;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ff6600;
    font-size: 13px;
  }

  .stat-grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 6px;
    padding: 0 12px 14px;
  }

  .stat-cell {
    background: rgba(255, 255, 255, 0.08);
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 8px;
    text-align: center;
    padding: 6px 2px;
  }

  .stat-cell b {
    display: block;
    font-family: 'Impact', sans-serif;
    font-size: 15px;
    color: var(--yellow);
    letter-spacing: 0.5px;
    text-shadow: 1px 1px 0 #000;
  }

  .stat-cell span {
    font-size: 8px;
    color: #cfd8ff;
    letter-spacing: 0.5px;
  }

  /* CENTRO */
  .center-col { display: flex; flex-direction: column; gap: 10px; }

  .feature-card {
    background: linear-gradient(135deg, var(--pink-1), var(--pink-2));
    border: 2px solid #000;
    border-radius: 14px;
    box-shadow: 0 5px 0 #000;
    padding: 10px;
    display: grid;
    grid-template-columns: 1.3fr 1fr;
    gap: 12px;
    align-items: center;
    position: relative;
    overflow: hidden;
  }

  .feature-card::after {
    content: '✦';
    position: absolute;
    top: 8px;
    right: 14px;
    font-size: 26px;
    color: rgba(255, 255, 255, 0.4);
    pointer-events: none;
  }

  .feature-media {
    border-radius: 8px;
    border: 2px solid #000;
    overflow: hidden;
    box-shadow: 0 3px 0 #000;
    aspect-ratio: 16 / 10;
    background: #000;
    position: relative;
  }

  .feature-media video {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
    background: #000;
  }

  .feature-copy { color: #ffffff; }

  .feature-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: var(--yellow);
    color: #000;
    font-family: 'Impact', sans-serif;
    font-size: 10px;
    letter-spacing: 1.5px;
    padding: 4px 12px;
    border-radius: 20px;
    border: 2px solid #000;
    margin-bottom: 8px;
    box-shadow: 0 2px 0 #000;
  }

  .feature-eyebrow i { color: var(--red); }

  .feature-copy h2 {
    font-family: 'Impact', sans-serif;
    font-size: 20px;
    line-height: 1.15;
    letter-spacing: 0.5px;
    text-shadow: 2px 2px 0 #000;
    margin-bottom: 6px;
  }

  .feature-copy p {
    font-size: 11px;
    line-height: 1.5;
    color: #ffe6f5;
    margin-bottom: 10px;
  }

  .feature-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--yellow);
    color: #000;
    border: 2px solid #000;
    border-radius: 20px;
    padding: 7px 16px;
    font-family: 'Impact', sans-serif;
    font-size: 11px;
    letter-spacing: 1px;
    box-shadow: 0 3px 0 #000;
    transition: transform 0.1s, background 0.15s;
  }

  .feature-btn i { color: var(--red); }
  .feature-btn:hover { background: #ffe74d; }
  .feature-btn:active { transform: translateY(3px); box-shadow: 0 0 0 #000; }

  /* ---------- SECCIÓN COMENTARIOS EN FEATURE CARD ---------- */
  .feature-comments {
    grid-column: 1 / -1;
    margin-top: 4px;
    background: rgba(0, 0, 0, 0.25);
    border: 2px solid #000;
    border-radius: 10px;
    box-shadow: 0 3px 0 #000;
    overflow: hidden;
  }

  .feature-comments-head {
    display: flex;
    align-items: center;
    gap: 6px;
    background: linear-gradient(to bottom, var(--navy), var(--navy-dark));
    color: #fff;
    font-family: 'Impact', sans-serif;
    font-size: 11px;
    letter-spacing: 1.5px;
    padding: 5px 10px;
    text-shadow: 1px 1px 0 #000;
    border-bottom: 2px solid #000;
  }

  .feature-comments-head i { color: var(--yellow); }

  .feature-comments-head .count {
    margin-left: auto;
    background: var(--yellow);
    color: #000;
    border: 2px solid #000;
    border-radius: 20px;
    padding: 1px 8px;
    font-size: 10px;
    text-shadow: none;
  }

  .feature-comments-list {
    max-height: 150px;
    overflow-y: auto;
    padding: 8px 10px;
    display: flex;
    flex-direction: column;
    gap: 6px;
    background: rgba(255, 255, 255, 0.06);
  }

  .feature-comments-list::-webkit-scrollbar { width: 6px; }
  .feature-comments-list::-webkit-scrollbar-track { background: rgba(255,255,255,0.1); border-radius: 10px; }
  .feature-comments-list::-webkit-scrollbar-thumb { background: var(--yellow); border-radius: 10px; }

  .fc-item {
    display: flex;
    gap: 7px;
    align-items: flex-start;
    background: #ffffff;
    border: 2px solid #000;
    border-radius: 8px;
    padding: 5px 7px;
    box-shadow: 0 2px 0 #000;
  }

  .fc-item img {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    border: 2px solid #000;
    object-fit: cover;
    flex-shrink: 0;
  }

  .fc-item .fc-body { flex: 1; min-width: 0; }

  .fc-item .fc-name {
    font-family: 'Impact', sans-serif;
    font-size: 10.5px;
    color: var(--navy);
    letter-spacing: 0.4px;
    display: flex;
    align-items: center;
    gap: 5px;
  }

  .fc-item .fc-name .fc-time {
    font-family: 'Trebuchet MS', sans-serif;
    font-size: 8px;
    color: #888;
    font-weight: normal;
    letter-spacing: 0;
  }

  .fc-item .fc-text {
    font-size: 10.5px;
    color: #222;
    line-height: 1.35;
    margin-top: 1px;
    word-wrap: break-word;
  }

  .feature-comments-form {
    display: flex;
    gap: 6px;
    padding: 7px 8px;
    background: linear-gradient(to bottom, var(--pink-1), var(--pink-2));
    border-top: 2px solid #000;
  }

  .feature-comments-form input {
    flex: 1;
    border: 2px solid #000;
    border-radius: 20px;
    padding: 6px 12px;
    font-size: 11px;
    outline: none;
    background: #fff;
    box-shadow: inset 2px 2px 0 rgba(0,0,0,0.08);
  }

  .feature-comments-form input:focus {
    box-shadow: 0 0 0 3px var(--yellow), inset 2px 2px 0 rgba(0,0,0,0.08);
  }

  .feature-comments-form button {
    background: var(--yellow);
    border: 2px solid #000;
    border-radius: 20px;
    padding: 6px 14px;
    font-family: 'Impact', sans-serif;
    font-size: 10px;
    letter-spacing: 1px;
    color: #000;
    box-shadow: 0 3px 0 #000;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: transform 0.1s, background 0.15s;
  }

  .feature-comments-form button i { color: var(--red); }
  .feature-comments-form button:hover { background: #ffe74d; }
  .feature-comments-form button:active { transform: translateY(3px); box-shadow: 0 0 0 #000; }

  /* COMPOSER */
  .composer {
    background: #ffffff;
    border: 2px solid #000;
    border-radius: 14px;
    box-shadow: 0 5px 0 #000;
    padding: 10px 12px;
    display: flex;
    gap: 10px;
    align-items: center;
  }

  .composer .cav {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    border: 2px solid #000;
    overflow: hidden;
    flex-shrink: 0;
    box-shadow: 0 3px 0 #000;
  }

  .composer .cav img { width: 100%; height: 100%; object-fit: cover; }

  .composer input {
    flex: 1;
    border: 2px solid #000;
    border-radius: 22px;
    padding: 10px 16px;
    font-size: 12px;
    outline: none;
    background: #ffffff;
    box-shadow: inset 2px 2px 0 rgba(0, 0, 0, 0.08);
  }

  .composer input:focus { box-shadow: 0 0 0 3px var(--yellow), inset 2px 2px 0 rgba(0, 0, 0, 0.08); }

  .composer button {
    background: var(--yellow);
    border: 2px solid #000;
    border-radius: 22px;
    padding: 10px 16px;
    font-family: 'Impact', sans-serif;
    font-size: 11px;
    letter-spacing: 1px;
    color: #000;
    box-shadow: 0 3px 0 #000;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: transform 0.1s, background 0.15s;
  }

  .composer button i { color: var(--red); }
  .composer button:hover { background: #ffe74d; }
  .composer button:active { transform: translateY(3px); box-shadow: 0 0 0 #000; }

  .feed-title {
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: #ffffff;
    font-family: 'Impact', sans-serif;
    font-size: 15px;
    letter-spacing: 1.5px;
    padding: 2px 4px;
    text-shadow: 2px 2px 0 #000;
  }

  .feed-title .sort {
    background: var(--navy);
    border: 2px solid #000;
    border-radius: 20px;
    padding: 5px 12px;
    font-size: 10px;
    color: #ffffff;
    display: flex;
    gap: 6px;
    align-items: center;
    box-shadow: 0 3px 0 #000;
    letter-spacing: 1px;
  }

  .feed-title .sort i { color: var(--yellow); }

  /* POST */
  .post {
    background: #ffffff;
    border: 2px solid #000;
    border-radius: 14px;
    box-shadow: 0 5px 0 #000;
    overflow: hidden;
    transition: transform 0.15s;
  }

  .post:hover { transform: translateY(-3px); }

  .post-top {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 6px 10px;
    background: linear-gradient(to bottom, var(--navy), var(--navy-dark));
  }

  .post-avatar {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    border: 2px solid var(--yellow);
    overflow: hidden;
    flex-shrink: 0;
    background: #cbd5e1;
  }

  .post-avatar img { width: 100%; height: 100%; object-fit: cover; }

  .post-uname {
    font-family: 'Impact', sans-serif;
    font-size: 12px;
    letter-spacing: 0.4px;
    color: #ffffff;
    display: flex;
    align-items: center;
    gap: 4px;
    text-shadow: 1px 1px 0 #000;
  }

  .post-uname i { color: var(--yellow); font-size: 10px; }

  .post-time { font-size: 8.5px; color: #b9c6ff; margin-top: 1px; }

  .post-more { margin-left: auto; color: #cfd8ff; font-size: 13px; }

  .post-label {
    background: var(--yellow);
    color: #000;
    font-family: 'Impact', sans-serif;
    font-size: 10px;
    letter-spacing: 1.5px;
    padding: 3px 12px;
    border-bottom: 2px solid #000;
  }

  .post-label:empty {
    padding: 0;
    border-bottom: none;
  }

  .post-media {
    position: relative;
    background: #eee;
    border-bottom: 2px solid #000;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
  }

  .post-media img {
    width: auto;
    max-width: 100%;
    height: auto;
    max-height: 620px;
    object-fit: contain;
    display: block;
  }

  .post-media .tape {
    position: absolute;
    top: -6px;
    left: 20px;
    width: 55px;
    height: 20px;
    background: repeating-linear-gradient(45deg, rgba(255,255,255,0.9), rgba(255,255,255,0.9) 4px, rgba(255,255,255,0.6) 4px, rgba(255,255,255,0.6) 8px);
    border: 1px solid rgba(0, 0, 0, 0.15);
    transform: rotate(-4deg);
    opacity: 0.9;
    z-index: 2;
  }

  .post-caption {
    padding: 10px 12px 4px;
    font-size: 11.5px;
    line-height: 1.4;
    color: #222;
  }

  .post-caption b {
    color: var(--red);
    font-family: 'Impact', sans-serif;
    letter-spacing: 0.3px;
    font-weight: normal;
  }

  .post-actions {
    display: flex;
    gap: 4px;
    padding: 8px 10px 10px;
  }

  .pact {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    background: #ffffff;
    border: 2px solid #000;
    border-radius: 20px;
    padding: 7px 4px;
    font-family: 'Impact', sans-serif;
    font-size: 10px;
    letter-spacing: 0.5px;
    color: var(--navy);
    box-shadow: 0 3px 0 #000;
    cursor: pointer;
    transition: transform 0.1s, background 0.15s, color 0.15s;
  }

  .pact i { font-size: 12px; }

  .pact:hover { background: var(--yellow); color: #000; }
  .pact:hover i { color: var(--red); }
  .pact:active { transform: translateY(3px); box-shadow: 0 0 0 #000; }

  /* ====== ESTADOS DE INTERACCIÓN (pilas) ====== */
  .pact.liked   { background: var(--red); color: #fff; }
  .pact.liked i { color: #fff !important; }
  .pact.saved   { background: var(--yellow); color: #000; }

  /* selector de comentarios predeterminados */
  .comment-picker {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    padding: 0 10px 10px;
  }
  .comment-picker button {
    background: #fff;
    border: 2px solid #000;
    border-radius: 14px;
    padding: 5px 10px;
    font-size: 10.5px;
    box-shadow: 0 2px 0 #000;
    transition: transform .1s, background .15s;
  }
  .comment-picker button:hover { background: var(--yellow); }
  .comment-picker button:active { transform: translateY(2px); box-shadow: 0 0 0 #000; }

  .post-comments { padding: 0 12px 10px; display: flex; flex-direction: column; gap: 4px; }
  .pc-item { font-size: 10.5px; background: #f1f1f1; border: 1px solid #000; border-radius: 10px; padding: 5px 8px; }
  .pc-item b { color: var(--navy); }

  /* pila de likes (visual) */
  .stack-chip {
    display: flex; align-items: center; gap: 6px;
    background: #fff; border: 2px solid #000; border-radius: 12px;
    padding: 6px 10px; font-size: 11px; font-family: 'Impact', sans-serif;
    box-shadow: 0 2px 0 #000;
  }
  .stack-chip.tope { background: var(--green); color: #fff; }
  .stack-list { display: flex; flex-direction: column; gap: 5px; padding: 10px; }
  .stack-panel-actions { padding: 0 10px 10px; }
  .btn-block {
    width: 100%; background: var(--red); color: #fff; border: 2px solid #000;
    border-radius: 14px; padding: 8px; font-family: 'Impact', sans-serif;
    font-size: 11px; letter-spacing: .5px; box-shadow: 0 3px 0 #000;
  }
  .btn-block:active { transform: translateY(3px); box-shadow: 0 0 0 #000; }

  .fav-item { display: flex; align-items: center; gap: 8px; padding: 8px 10px; border-bottom: 1px solid #eee; font-size: 11px; }
  .fav-item img { width: 34px; height: 34px; border-radius: 8px; object-fit: cover; }

  /* modal de reporte */
  .modal-overlay {
    display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.6);
    z-index: 999; align-items: center; justify-content: center; padding: 20px;
  }
  .modal-overlay.open { display: flex; }
  .modal-box {
    background: #fff; border: 2px solid #000; border-radius: 16px;
    box-shadow: 0 6px 0 #000; max-width: 520px; width: 100%;
    max-height: 80vh; overflow-y: auto;
  }
  .modal-head {
    display: flex; align-items: center; justify-content: space-between;
    background: linear-gradient(to bottom, var(--navy), var(--navy-dark));
    color: #fff; padding: 12px 16px; font-family: 'Impact', sans-serif;
    letter-spacing: .5px; position: sticky; top: 0;
  }
  .modal-head button { background: none; border: none; color: #fff; font-size: 16px; }
  .modal-section { padding: 12px 16px; }
  .modal-section h4 { font-family: 'Impact', sans-serif; color: var(--navy); font-size: 12px; margin-bottom: 8px; }

  .reporte-item {
    display: flex; flex-wrap: wrap; align-items: center; gap: 8px;
    padding: 8px; border: 1px solid #ddd; border-radius: 10px; margin-bottom: 6px; font-size: 10.5px;
  }
  .reporte-item.ultima { border-color: var(--green); background: #f0fff4; }
  .reporte-tag {
    font-family: 'Impact', sans-serif; font-size: 9px; color: #fff;
    padding: 2px 8px; border-radius: 10px; background: var(--navy);
  }
  .tag-LIKE { background: var(--red); }
  .tag-UNLIKE { background: #777; }
  .tag-COMENTARIO { background: var(--orange-1); }
  .tag-GUARDAR { background: var(--green); }
  .tag-QUITAR_GUARDADO { background: #999; }
  .reporte-hora { margin-left: auto; color: #888; }

  /* RESPONSIVE */
  @media (max-width: 1100px) {
    .layout { grid-template-columns: 1fr; }
    .stack { position: static; }
    .feature-card { grid-template-columns: 1fr; }
  }

  @media (max-width: 640px) {
    .search-pill { display: none; }
    .navpills { justify-content: flex-start; overflow-x: auto; }
    .composer { flex-wrap: wrap; }
    .post-actions { flex-wrap: wrap; }
    .pact { flex: 1 1 40%; }
    .brand-name { font-size: 22px; }
    .post-media img { max-height: 480px; }
    .feature-comments-form { flex-wrap: wrap; }
    .feature-comments-form button { flex: 1; justify-content: center; }
  }
</style>
<body onload="brython()">
<div class="wrap">

  <!-- HEADER -->
  <header class="topbar">
    <div class="brand">
      <div class="brand-mark"><i class="fa-solid fa-camera-retro"></i></div>
      <div>
        <div class="brand-name">PixUp</div>
        <div class="brand-tag">Y2K!!</div>
      </div>
    </div>
    <div class="search-pill">
      <i class="fa-solid fa-magnifying-glass" style="font-size:11px;color:#999;"></i>
      <input type="text" placeholder="buscar personas, fotos...">
      <button><i class="fa-solid fa-sliders"></i></button>
    </div>
    <div class="head-actions">
      <div class="icon-btn"><i class="fa-solid fa-bell"></i><span class="dot">0</span></div>
      <div class="icon-btn"><i class="fa-regular fa-comment-dots"></i></div>
      <a href="#" class="btn-login"><i class="fa-solid fa-right-to-bracket"></i> ENTRAR</a>
    </div>
  </header>

  <!-- NAV -->
  <nav class="navpills">
    <a href="#" class="active"><i class="fa-solid fa-house"></i> Inicio</a>
    <a href="#"><i class="fa-solid fa-users"></i> Perfiles</a>
    <a href="#"><i class="fa-solid fa-clapperboard"></i> Clips</a>
    <a href="#"><i class="fa-solid fa-bookmark"></i> Guardado</a>
    <a href="#"><i class="fa-solid fa-music"></i> Tunes</a>
    <a href="#"><i class="fa-solid fa-gamepad"></i> Juegos</a>
    <a href="#" id="navReporte"><i class="fa-solid fa-layer-group"></i> Reporte</a>
  </nav>

  <div class="layout">

    <!-- IZQUIERDA -->
    <aside class="stack">

      <div class="panel">
        <div class="panel-head ph-blue"><i class="fa-solid fa-users"></i> CONTACTOS</div>
        <div class="contacts-wrap">
          <div class="contact-row"><img src="<?= base_url('IMG/p1.png') ?>"><div><div class="cname">Selena Gomez</div><div class="cstat"><i class="fa-solid fa-circle"></i> En línea</div></div><button>+</button></div>
          <div class="contact-row"><img src="<?= base_url('IMG/p2.png') ?>"><div><div class="cname">Britani Spears</div><div class="cstat"><i class="fa-solid fa-circle"></i> En línea</div></div><button>+</button></div>
          <div class="contact-row"><img src="<?= base_url('IMG/p3.png') ?>"><div><div class="cname">Adam Sandler</div><div class="cstat"><i class="fa-solid fa-circle"></i> En línea</div></div><button>+</button></div>
          <div class="contact-row"><img src="<?= base_url('IMG/p4.png') ?>"><div><div class="cname">Tom Hoollad</div><div class="cstat"><i class="fa-solid fa-circle"></i> En línea</div></div><button>+</button></div>
          <div class="contact-row"><img src="<?= base_url('IMG/p5.png') ?>"><div><div class="cname">Aime</div><div class="cstat"><i class="fa-solid fa-circle"></i> En línea</div></div><button>+</button></div>
        </div>
      </div>

      <div class="panel">
        <div class="panel-head ph-pink"><i class="fa-solid fa-bell"></i> NOTIFICACIONES</div>
        <div class="empty-box notif-empty">
          <i class="fa-solid fa-inbox"></i>
          <p>Aún no hay notificaciones</p>
          <span>aquí aparecerán tus acciones</span>
        </div>
      </div>

    </aside>

    <!-- CENTRO -->
    <main class="center-col">

      <!-- VIDEO + COMENTARIOS -->
      <div class="feature-card">
        <div class="feature-media">
          <video controls autoplay muted loop playsinline preload="auto">
            <source src="<?= base_url('IMG/publi.mp4') ?>" type="video/mp4">
          </video>
        </div>
        <div class="feature-copy">
          <span class="feature-eyebrow"><i class="fa-solid fa-bolt"></i> NUEVO</span>
          <h2>Sabritas presenta su nueva edición</h2>
          <p>Mira el anuncio y cuéntanos qué te pareció en los comentarios de la comunidad.</p>
          <a href="#" class="feature-btn"><i class="fa-solid fa-play"></i> Ver ahora</a>
        </div>

        <!-- SECCIÓN DE COMENTARIOS -->
        <div class="feature-comments">
          <div class="feature-comments-head">
            <i class="fa-solid fa-comments"></i> COMENTARIOS
            <span class="count" id="fcCount">3</span>
          </div>

          <div class="feature-comments-list" id="fcList">
            <div class="fc-item">
              <img src="<?= base_url('IMG/p1.png') ?>" alt="">
              <div class="fc-body">
                <div class="fc-name">Selena Gomez <span class="fc-time">hace 2 min</span></div>
                <div class="fc-text">¡Me encantó el anuncio! 🔥</div>
              </div>
            </div>

            <div class="fc-item">
              <img src="<?= base_url('IMG/p3.png') ?>" alt="">
              <div class="fc-body">
                <div class="fc-name">Adam Sandler <span class="fc-time">hace 5 min</span></div>
                <div class="fc-text">Jajaja qué buena edición, ya quiero probarlas.</div>
              </div>
            </div>

            <div class="fc-item">
              <img src="<?= base_url('IMG/p2.png') ?>" alt="">
              <div class="fc-body">
                <div class="fc-name">Britani Spears <span class="fc-time">hace 8 min</span></div>
                <div class="fc-text">Se ve increíble 💖</div>
              </div>
            </div>
          </div>

          <form class="feature-comments-form" id="fcForm">
            <input type="text" id="fcInput" placeholder="Escribe un comentario..." maxlength="200">
            <button type="submit"><i class="fa-solid fa-paper-plane"></i> ENVIAR</button>
          </form>
        </div>
      </div>

      <!-- COMPOSER -->
      <div class="composer">
        <div class="cav"><img src="<?= base_url('IMG/perfil1.png') ?>"></div>
        <input type="text" placeholder="¿Qué quieres compartir hoy?">
        <button><i class="fa-solid fa-image"></i> Publicar</button>
      </div>

      <div class="feed-title">
        <span>Publicaciones</span>
        <div class="sort"><i class="fa-solid fa-arrow-down-wide-short"></i> Recientes</div>
      </div>

      <!-- PUBLICACIÓN 1 -->
      <article class="post" data-post-id="1">
        <div class="post-top">
          <div class="post-avatar"><img src="<?= base_url('IMG/p1.png') ?>"></div>
          <div><div class="post-uname">Selena Gomez <i class="fa-solid fa-circle-check"></i></div><div class="post-time">hace 5 min</div></div>
          <i class="fa-solid fa-ellipsis post-more"></i>
        </div>
        <div class="post-label"></div>
        <div class="post-media"><div class="tape"></div><img src="<?= base_url('IMG/pot1.png') ?>"></div>
        <div class="post-caption"><b>Selena:</b> ¡Me encantan mis nuevos accesorios!</div>
        <div class="post-actions">
          <?php $tieneLike = in_array(1, $likes ?? []); ?>
        <a href="<?= $tieneLike ? base_url('like_controller/quitar') : base_url('like_controller/agregar/1') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
          <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
        </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <div class="pact act-save"><i class="fa-regular fa-bookmark"></i> GUARDAR</div>
        </div>
      </article>

      <!-- PUBLICACIÓN 2 -->
      <article class="post" data-post-id="2">
        <div class="post-top">
          <div class="post-avatar"><img src="<?= base_url('IMG/p2.png') ?>"></div>
          <div><div class="post-uname">Britani Spears</div><div class="post-time">hace 22 min</div></div>
          <i class="fa-solid fa-ellipsis post-more"></i>
        </div>
        <div class="post-label"></div>
        <div class="post-media"><img src="<?= base_url('IMG/pot2.png') ?>"></div>
        <div class="post-caption"><b>Britani Spears:</b> Usando insta en mi computadora nueva</div>
        <div class="post-actions">
          <?php $tieneLike = in_array(2, $likes ?? []); ?>
        <a href="<?= $tieneLike ? base_url('like_controller/quitar') : base_url('like_controller/agregar/2') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
          <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
        </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <div class="pact act-save"><i class="fa-regular fa-bookmark"></i> GUARDAR</div>
        </div>
      </article>

      <!-- PUBLICACIÓN 3 -->
      <article class="post" data-post-id="3">
        <div class="post-top">
          <div class="post-avatar"><img src="<?= base_url('IMG/p3.png') ?>"></div>
          <div><div class="post-uname">Adam Sandler</div><div class="post-time">hace 1 h</div></div>
          <i class="fa-solid fa-ellipsis post-more"></i>
        </div>
        <div class="post-label"></div>
        <div class="post-media"><div class="tape"></div><img src="<?= base_url('IMG/pot3.png') ?>"></div>
        <div class="post-caption"><b>Adam Sandler:</b> Con el elenco de Rapidos y Furiosos</div>
        <div class="post-actions">
          <?php $tieneLike = in_array(3, $likes ?? []); ?>
        <a href="<?= $tieneLike ? base_url('like_controller/quitar') : base_url('like_controller/agregar/3') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
          <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
        </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <div class="pact act-save"><i class="fa-regular fa-bookmark"></i> GUARDAR</div>
        </div>
      </article>

      <!-- PUBLICACIÓN 4 -->
      <article class="post" data-post-id="4">
        <div class="post-top">
          <div class="post-avatar"><img src="<?= base_url('IMG/perfil2.png') ?>"></div>
          <div><div class="post-uname">The Rock</div><div class="post-time">hace 2 h</div></div>
          <i class="fa-solid fa-ellipsis post-more"></i>
        </div>
        <div class="post-label"></div>
        <div class="post-media"><img src="<?= base_url('IMG/pot4.png') ?>"></div>
        <div class="post-caption"><b>The Rock:</b> Nuevo proyecto en el que estuve trabajando.</div>
        <div class="post-actions">
          <?php $tieneLike = in_array(4, $likes ?? []); ?>
        <a href="<?= $tieneLike ? base_url('like_controller/quitar') : base_url('like_controller/agregar/4') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
          <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
        </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <div class="pact act-save"><i class="fa-regular fa-bookmark"></i> GUARDAR</div>
        </div>
      </article>

      <!-- PUBLICACIÓN 5 -->
      <article class="post" data-post-id="5">
        <div class="post-top">
          <div class="post-avatar"><img src="<?= base_url('IMG/may.png') ?>"></div>
          <div><div class="post-uname">MAYBELLINE <i class="fa-solid fa-circle-check"></i></div><div class="post-time">hace 3 h</div></div>
          <i class="fa-solid fa-ellipsis post-more"></i>
        </div>
        <div class="post-label"></div>
        <div class="post-media"><div class="tape"></div><img src="<?= base_url('IMG/pot5.png') ?>"></div>
        <div class="post-caption"><b>MAYBELLINE:</b> ¡Miren qué lindo quedó todo hoy!</div>
        <div class="post-actions">
          <?php $tieneLike = in_array(5, $likes ?? []); ?>
        <a href="<?= $tieneLike ? base_url('like_controller/quitar') : base_url('like_controller/agregar/5') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
          <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
        </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <div class="pact act-save"><i class="fa-regular fa-bookmark"></i> GUARDAR</div>
        </div>
      </article>

      <!-- PUBLICACIÓN 6 -->
      <article class="post" data-post-id="6">
        <div class="post-top">
          <div class="post-avatar"><img src="<?= base_url('IMG/logopepsi.png') ?>"></div>
          <div><div class="post-uname">Pepsi</div><div class="post-time">hace 4 h</div></div>
          <i class="fa-solid fa-ellipsis post-more"></i>
        </div>
        <div class="post-label"></div>
        <div class="post-media"><img src="<?= base_url('IMG/pot6.png') ?>"></div>
        <div class="post-caption"><b>Pepsi:</b> Sin palabras.</div>
        <div class="post-actions">
          <?php $tieneLike = in_array(6, $likes ?? []); ?>
        <a href="<?= $tieneLike ? base_url('like_controller/quitar') : base_url('like_controller/agregar/6') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
          <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
        </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <div class="pact act-save"><i class="fa-regular fa-bookmark"></i> GUARDAR</div>
        </div>
      </article>

      <!-- PUBLICACIÓN 7 -->
      <article class="post" data-post-id="7">
        <div class="post-top">
          <div class="post-avatar"><img src="<?= base_url('IMG/chicaspesadas.png') ?>"></div>
          <div><div class="post-uname">Regina</div><div class="post-time">hace 6 h</div></div>
          <i class="fa-solid fa-ellipsis post-more"></i>
        </div>
        <div class="post-label"></div>
        <div class="post-media"><div class="tape"></div><img src="<?= base_url('IMG/pot7.png') ?>"></div>
        <div class="post-caption"><b>Regina:</b> Sesión de fotos en el estudio con las Mean Girls.</div>
        <div class="post-actions">
          <?php $tieneLike = in_array(7, $likes ?? []); ?>
        <a href="<?= $tieneLike ? base_url('like_controller/quitar') : base_url('like_controller/agregar/7') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
          <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
        </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <div class="pact act-save"><i class="fa-regular fa-bookmark"></i> GUARDAR</div>
        </div>
      </article>

      <!-- PUBLICACIÓN 8 -->
      <article class="post" data-post-id="8">
        <div class="post-top">
          <div class="post-avatar"><img src="https://picsum.photos/seed/siko/80"></div>
          <div><div class="post-uname">Sikowitz</div><div class="post-time">hace 8 h</div></div>
          <i class="fa-solid fa-ellipsis post-more"></i>
        </div>
        <div class="post-label"></div>
        <div class="post-media"><img src="https://picsum.photos/seed/post8/700/560"></div>
        <div class="post-caption"><b>Sikowitz:</b> ¡La creatividad no tiene límites!</div>
        <div class="post-actions">
          <?php $tieneLike = in_array(8, $likes ?? []); ?>
        <a href="<?= $tieneLike ? base_url('like_controller/quitar') : base_url('like_controller/agregar/8') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
          <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
        </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <div class="pact act-save"><i class="fa-regular fa-bookmark"></i> GUARDAR</div>
        </div>
      </article>

      <!-- PUBLICACIÓN 9 -->
      <article class="post" data-post-id="9">
        <div class="post-top">
          <div class="post-avatar"><img src="https://picsum.photos/seed/tori/80"></div>
          <div><div class="post-uname">Tori Vega</div><div class="post-time">hace 12 h</div></div>
          <i class="fa-solid fa-ellipsis post-more"></i>
        </div>
        <div class="post-label"></div>
        <div class="post-media"><div class="tape"></div><img src="https://picsum.photos/seed/post9/700/560"></div>
        <div class="post-caption"><b>Tori Vega:</b> Recuerdos de la gira</div>
        <div class="post-actions">
          <?php $tieneLike = in_array(9, $likes ?? []); ?>
        <a href="<?= $tieneLike ? base_url('like_controller/quitar') : base_url('like_controller/agregar/9') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
          <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
        </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <div class="pact act-save"><i class="fa-regular fa-bookmark"></i> GUARDAR</div>
        </div>
      </article>

      <!-- PUBLICACIÓN 10 -->
      <article class="post" data-post-id="10">
        <div class="post-top">
          <div class="post-avatar"><img src="https://picsum.photos/seed/cat/80"></div>
          <div><div class="post-uname">Cat Valentine</div><div class="post-time">hace 1 día</div></div>
          <i class="fa-solid fa-ellipsis post-more"></i>
        </div>
        <div class="post-label"></div>
        <div class="post-media"><img src="https://picsum.photos/seed/post10/700/560"></div>
        <div class="post-caption"><b>Cat Valentine:</b> ¡Una tarde perfecta!</div>
        <div class="post-actions">
          <?php $tieneLike = in_array(10, $likes ?? []); ?>
        <a href="<?= $tieneLike ? base_url('like_controller/quitar') : base_url('like_controller/agregar/10') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
          <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
        </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <div class="pact act-save"><i class="fa-regular fa-bookmark"></i> GUARDAR</div>
        </div>
      </article>

    </main>

    <!-- DERECHA -->
    <aside class="stack">

      <div class="panel wall-card">
        <div class="wall-hero">
          <div class="avatar-ring"><img src="https://picsum.photos/seed/maxpixup/150"></div>
          <div class="uname">Mi Muro</div>
          <div class="uhandle">@max.pixup</div>
        </div>
        <div class="mood-row">
          <span>Estado: inspirado hoy</span>
          <div class="flame"><i class="fa-solid fa-fire"></i></div>
        </div>
        <div class="stat-grid">
          <div class="stat-cell"><b>128</b><span>POSTS</span></div>
          <div class="stat-cell"><b>3.4k</b><span>AMIGOS</span></div>
          <div class="stat-cell"><b>892</b><span>LIKES</span></div>
        </div>
      </div>

      <div class="panel">
        <div class="panel-head ph-green"><i class="fa-solid fa-layer-group"></i> PILA DE LIKES (LIFO)</div>
        <div class="stack-list" id="likesStackList">
          <?php if (empty($likes)): ?>
            <div class="empty-box"><i class="fa-solid fa-heart-crack"></i><p>Aún no das like a nada</p></div>
          <?php else: ?>
            <?php foreach (array_reverse($likes) as $i => $postId): ?>
              <div class="stack-item<?= $i === 0 ? ' stack-item-top' : '' ?>">
                <i class="fa-solid fa-heart"></i> Publicación #<?= $postId ?>
                <?php if ($i === 0): ?><span class="tope-tag">TOPE</span><?php endif; ?>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <div class="stack-panel-actions">
          <a href="<?= base_url('like_controller/quitar') ?>" class="btn-block" id="btnQuitarUltimoLike"><i class="fa-solid fa-rotate-left"></i> Retirar último like</a>
        </div>
      </div>

      <div class="panel">
        <div class="panel-head ph-cyan"><i class="fa-solid fa-bookmark"></i> PUBLICACIONES GUARDADAS</div>
        <div id="favoritosList">
          <div class="empty-box saved-empty">
            <i class="fa-solid fa-bookmark"></i>
            <p>Aún no tienes guardadas</p>
            <span>toca "guardar" en una publicación</span>
          </div>
        </div>
      </div>

    </aside>

  </div>

</div>

<!-- MODAL: REPORTE DE ACTIVIDAD (pila de historial) -->
<div class="modal-overlay" id="modalReporte">
  <div class="modal-box">
    <div class="modal-head">
      <span><i class="fa-solid fa-layer-group"></i> Reporte de actividad</span>
      <button type="button" data-cerrar-modal><i class="fa-solid fa-xmark"></i></button>
    </div>
    <div class="modal-section">
      <h4>Pila de Historial (tope = acción más reciente)</h4>
      <div id="reporteList"></div>
    </div>
  </div>
</div>

<script>
  // BASE_URL global para que TODOS los módulos JS (likes.js, favoritos.js,
  // comentarios.js, historial/reporte.js, etc.) sepan a qué controlador
  // de CodeIgniter deben hacer fetch(), sin importar en qué carpeta
  // termine viviendo el proyecto.
  window.BASE_URL = "<?= base_url() ?>";
</script>
<script src="<?= base_url('JS/pila.js') ?>"></script>
<script src="<?= base_url('JS/historial.js') ?>"></script>
<!-- likes.js ya NO se usa: el like/quitar like ahora se resuelve solo con PHP (Like_controller) -->
<script src="<?= base_url('JS/comentarios.js') ?>"></script>
<script src="<?= base_url('JS/favoritos.js') ?>"></script>
<script src="<?= base_url('JS/reporte.js') ?>"></script>
<script src="<?= base_url('JS/main.js') ?>"></script>

<script>
  // Autoplay forzado del video
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('video[autoplay]').forEach(function (v) {
      v.muted = true;
      v.setAttribute('muted', '');
      var p = v.play();
      if (p !== undefined) {
        p.catch(function () {
          document.addEventListener('click', function once() {
            v.play();
            document.removeEventListener('click', once);
          }, { once: true });
        });
      }
    });

    // Comentarios en la card del video
    const form = document.getElementById('fcForm');
    const input = document.getElementById('fcInput');
    const list = document.getElementById('fcList');
    const count = document.getElementById('fcCount');
    if (!form) return;

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      const texto = input.value.trim();
      if (!texto) return;

      const item = document.createElement('div');
      item.className = 'fc-item';
      item.innerHTML = `
        <img src="https://picsum.photos/seed/maxpixup/60" alt="">
        <div class="fc-body">
          <div class="fc-name">Tú <span class="fc-time">ahora</span></div>
          <div class="fc-text"></div>
        </div>
      `;
      item.querySelector('.fc-text').textContent = texto;
      list.appendChild(item);

      count.textContent = parseInt(count.textContent, 10) + 1;
      input.value = '';
      list.scrollTop = list.scrollHeight;
    });
  });
</script>
</html>