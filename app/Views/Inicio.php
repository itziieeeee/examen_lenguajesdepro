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
  <link rel="stylesheet" href="<?= base_url('CSS/inicio_estilos.css'); ?>">
</head>

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
          <div class="contact-row"><img src="<?= base_url('IMG/p5.png') ?>"><div><div class="cname">Aime</div><div class="cstat"><i class="fa-solid fa-circle"></i> En línea</div></div><button>+</button></div>
        </div>
      </div>

      <div class="panel">
        <div class="panel-head ph-gold"><i class="fa-solid fa-star"></i> FAVORITOS</div>
        <div id="favoritosPanel">
          <?php if (empty($estrellas)): ?>
            <div class="empty-box favs-empty">
              <i class="fa-solid fa-star"></i>
              <p>Aún no tienes favoritos</p>
              <span>toca la estrella en una publicación</span>
            </div>
          <?php else: ?>
            <div class="favs-panel-list">
              <?php foreach (array_reverse($estrellas) as $postId): ?>
                <?php $pub = $publicaciones[$postId] ?? null; ?>
                <?php if ($pub): ?>
                  <div class="favs-item" data-post-id="<?= $postId ?>">
                    <img src="<?= base_url($pub['imagen']) ?>" alt="">
                    <div class="favs-info">
                      <div class="favs-user"><?= esc($pub['usuario']) ?></div>
                      <div class="favs-caption"><?= esc($pub['caption']) ?></div>
                    </div>
                    <i class="fa-solid fa-star favs-star"></i>
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
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
          <a href="<?= $tieneLike ? base_url('index.php/LikeController/quitar/1') : base_url('index.php/LikeController/agregar/1') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
            <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
          </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <?php $tieneFav = in_array(1, $favoritos ?? []); ?>
          <a href="<?= $tieneFav ? base_url('index.php/FavoritoController/quitar/1') : base_url('index.php/FavoritoController/agregar/1') ?>" class="pact act-save<?= $tieneFav ? ' saved' : '' ?>">
            <i class="fa-<?= $tieneFav ? 'solid' : 'regular' ?> fa-bookmark"></i> GUARDAR
          </a>
          <?php $tieneStar = in_array(1, $estrellas ?? []); ?>
          <a href="<?= $tieneStar ? base_url('index.php/EstrellaController/quitar/1') : base_url('index.php/EstrellaController/agregar/1') ?>" class="pact act-fav<?= $tieneStar ? ' faved' : '' ?>">
            <i class="fa-<?= $tieneStar ? 'solid' : 'regular' ?> fa-star"></i> FAVORITO
          </a>
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
          <?php $tieneLike = in_array(2,$likes ?? []); ?>
          <a href="<?= $tieneLike ? base_url('index.php/LikeController/quitar/2') : base_url('index.php/LikeController/agregar/2') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
            <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
          </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <?php $tieneFav = in_array(2,$favoritos ?? []); ?>
          <a href="<?= $tieneFav ? base_url('index.php/FavoritoController/quitar/2') : base_url('index.php/FavoritoController/agregar/2') ?>" class="pact act-save<?= $tieneFav ? ' saved' : '' ?>">
            <i class="fa-<?= $tieneFav ? 'solid' : 'regular' ?> fa-bookmark"></i> GUARDAR
          </a>
          <?php $tieneStar = in_array(2, $estrellas ?? []); ?>
          <a href="<?= $tieneStar ? base_url('index.php/EstrellaController/quitar/2') : base_url('index.php/EstrellaController/agregar/2') ?>" class="pact act-fav<?= $tieneStar ? ' faved' : '' ?>">
            <i class="fa-<?= $tieneStar ? 'solid' : 'regular' ?> fa-star"></i> FAVORITO
          </a>
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
          <?php $tieneLike = in_array(3,$likes ?? []); ?>
          <a href="<?= $tieneLike ? base_url('index.php/LikeController/quitar/3') : base_url('index.php/LikeController/agregar/3') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
            <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
          </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <?php $tieneFav = in_array(3,$favoritos ?? []); ?>
          <a href="<?= $tieneFav ? base_url('index.php/FavoritoController/quitar/3') : base_url('index.php/FavoritoController/agregar/3') ?>" class="pact act-save<?= $tieneFav ? ' saved' : '' ?>">
            <i class="fa-<?= $tieneFav ? 'solid' : 'regular' ?> fa-bookmark"></i> GUARDAR
          </a>
          <?php $tieneStar = in_array(3, $estrellas ?? []); ?>
          <a href="<?= $tieneStar ? base_url('index.php/EstrellaController/quitar/3') : base_url('index.php/EstrellaController/agregar/3') ?>" class="pact act-fav<?= $tieneStar ? ' faved' : '' ?>">
            <i class="fa-<?= $tieneStar ? 'solid' : 'regular' ?> fa-star"></i> FAVORITO
          </a>
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
          <?php $tieneLike = in_array(4,$likes ?? []); ?>
          <a href="<?= $tieneLike ? base_url('index.php/LikeController/quitar/4') : base_url('index.php/LikeController/agregar/4') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
            <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
          </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <?php $tieneFav = in_array(4,$favoritos ?? []); ?>
          <a href="<?= $tieneFav ? base_url('index.php/FavoritoController/quitar/4') : base_url('index.php/FavoritoController/agregar/4') ?>" class="pact act-save<?= $tieneFav ? ' saved' : '' ?>">
            <i class="fa-<?= $tieneFav ? 'solid' : 'regular' ?> fa-bookmark"></i> GUARDAR
          </a>
          <?php $tieneStar = in_array(4, $estrellas ?? []); ?>
          <a href="<?= $tieneStar ? base_url('index.php/EstrellaController/quitar/4') : base_url('index.php/EstrellaController/agregar/4') ?>" class="pact act-fav<?= $tieneStar ? ' faved' : '' ?>">
            <i class="fa-<?= $tieneStar ? 'solid' : 'regular' ?> fa-star"></i> FAVORITO
          </a>
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
          <?php $tieneLike = in_array(5,$likes ?? []); ?>
          <a href="<?= $tieneLike ? base_url('index.php/LikeController/quitar/5') : base_url('index.php/LikeController/agregar/5') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
            <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
          </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <?php $tieneFav = in_array(5,$favoritos ?? []); ?>
          <a href="<?= $tieneFav ? base_url('index.php/FavoritoController/quitar/5') : base_url('index.php/FavoritoController/agregar/5') ?>" class="pact act-save<?= $tieneFav ? ' saved' : '' ?>">
            <i class="fa-<?= $tieneFav ? 'solid' : 'regular' ?> fa-bookmark"></i> GUARDAR
          </a>
          <?php $tieneStar = in_array(5, $estrellas ?? []); ?>
          <a href="<?= $tieneStar ? base_url('index.php/EstrellaController/quitar/5') : base_url('index.php/EstrellaController/agregar/5') ?>" class="pact act-fav<?= $tieneStar ? ' faved' : '' ?>">
            <i class="fa-<?= $tieneStar ? 'solid' : 'regular' ?> fa-star"></i> FAVORITO
          </a>
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
          <?php $tieneLike = in_array(6,$likes ?? []); ?>
          <a href="<?= $tieneLike ? base_url('index.php/LikeController/quitar/6') : base_url('index.php/LikeController/agregar/6') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
            <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
          </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <?php $tieneFav = in_array(6,$favoritos ?? []); ?>
          <a href="<?= $tieneFav ? base_url('index.php/FavoritoController/quitar/6') : base_url('index.php/FavoritoController/agregar/6') ?>" class="pact act-save<?= $tieneFav ? ' saved' : '' ?>">
            <i class="fa-<?= $tieneFav ? 'solid' : 'regular' ?> fa-bookmark"></i> GUARDAR
          </a>
          <?php $tieneStar = in_array(6, $estrellas ?? []); ?>
          <a href="<?= $tieneStar ? base_url('index.php/EstrellaController/quitar/6') : base_url('index.php/EstrellaController/agregar/6') ?>" class="pact act-fav<?= $tieneStar ? ' faved' : '' ?>">
            <i class="fa-<?= $tieneStar ? 'solid' : 'regular' ?> fa-star"></i> FAVORITO
          </a>
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
          <?php $tieneLike = in_array(7,$likes ?? []); ?>
          <a href="<?= $tieneLike ? base_url('index.php/LikeController/quitar/7') : base_url('index.php/LikeController/agregar/7') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
            <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
          </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <?php $tieneFav = in_array(7,$favoritos ?? []); ?>
          <a href="<?= $tieneFav ? base_url('index.php/FavoritoController/quitar/7') : base_url('index.php/FavoritoController/agregar/7') ?>" class="pact act-save<?= $tieneFav ? ' saved' : '' ?>">
            <i class="fa-<?= $tieneFav ? 'solid' : 'regular' ?> fa-bookmark"></i> GUARDAR
          </a>
          <?php $tieneStar = in_array(7, $estrellas ?? []); ?>
          <a href="<?= $tieneStar ? base_url('index.php/EstrellaController/quitar/7') : base_url('index.php/EstrellaController/agregar/7') ?>" class="pact act-fav<?= $tieneStar ? ' faved' : '' ?>">
            <i class="fa-<?= $tieneStar ? 'solid' : 'regular' ?> fa-star"></i> FAVORITO
          </a>
        </div>
      </article>

      <!-- PUBLICACIÓN 8 -->
      <article class="post" data-post-id="8">
        <div class="post-top">
          <div class="post-avatar"><img src="<?= base_url('IMG/p5.png') ?>"></div>
          <div><div class="post-uname">Aime</div><div class="post-time">hace 8 h</div></div>
          <i class="fa-solid fa-ellipsis post-more"></i>
        </div>
        <div class="post-label"></div>
        <div class="post-media"><img src="<?= base_url('IMG/preocupadap3.png') ?>"></div>
        <div class="post-caption"><b>Aime:</b> Preocupada p3</div>
        <div class="post-actions">
          <?php $tieneLike = in_array(8,$likes ?? []); ?>
          <a href="<?= $tieneLike ? base_url('index.php/LikeController/quitar/8') : base_url('index.php/LikeController/agregar/8') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
            <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
          </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <?php $tieneFav = in_array(8,$favoritos ?? []); ?>
          <a href="<?= $tieneFav ? base_url('index.php/FavoritoController/quitar/8') : base_url('index.php/FavoritoController/agregar/8') ?>" class="pact act-save<?= $tieneFav ? ' saved' : '' ?>">
            <i class="fa-<?= $tieneFav ? 'solid' : 'regular' ?> fa-bookmark"></i> GUARDAR
          </a>
          <?php $tieneStar = in_array(8, $estrellas ?? []); ?>
          <a href="<?= $tieneStar ? base_url('index.php/EstrellaController/quitar/8') : base_url('index.php/EstrellaController/agregar/8') ?>" class="pact act-fav<?= $tieneStar ? ' faved' : '' ?>">
            <i class="fa-<?= $tieneStar ? 'solid' : 'regular' ?> fa-star"></i> FAVORITO
          </a>
        </div>
      </article>

      <!-- PUBLICACIÓN 9 -->
      <article class="post" data-post-id="9">
        <div class="post-top">
          <div class="post-avatar"><img src="<?= base_url('IMG/p9.png') ?>"></div>
          <div><div class="post-uname">Warner</div><div class="post-time">hace 12 h</div></div>
          <i class="fa-solid fa-ellipsis post-more"></i>
        </div>
        <div class="post-label"></div>
        <div class="post-media"><div class="tape"></div><img src="<?= base_url('IMG/caricaturas.png') ?>"></div>
        <div class="post-caption"><b>Warner:</b> Nuevo meme</div>
        <div class="post-actions">
          <?php $tieneLike = in_array(9,$likes ?? []); ?>
          <a href="<?= $tieneLike ? base_url('index.php/LikeController/quitar/9') : base_url('index.php/LikeController/agregar/9') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
            <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
          </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <?php $tieneFav = in_array(9,$favoritos ?? []); ?>
          <a href="<?= $tieneFav ? base_url('index.php/FavoritoController/quitar/9') : base_url('index.php/FavoritoController/agregar/9') ?>" class="pact act-save<?= $tieneFav ? ' saved' : '' ?>">
            <i class="fa-<?= $tieneFav ? 'solid' : 'regular' ?> fa-bookmark"></i> GUARDAR
          </a>
          <?php $tieneStar = in_array(9, $estrellas ?? []); ?>
          <a href="<?= $tieneStar ? base_url('index.php/EstrellaController/quitar/9') : base_url('index.php/EstrellaController/agregar/9') ?>" class="pact act-fav<?= $tieneStar ? ' faved' : '' ?>">
            <i class="fa-<?= $tieneStar ? 'solid' : 'regular' ?> fa-star"></i> FAVORITO
          </a>
        </div>
      </article>

      <!-- PUBLICACIÓN 10 -->
      <article class="post" data-post-id="10">
        <div class="post-top">
          <div class="post-avatar"><img src="<?= base_url('IMG/logo10.png') ?>"></div>
          <div><div class="post-uname">COCA COLA</div><div class="post-time">hace 1 día</div></div>
          <i class="fa-solid fa-ellipsis post-more"></i>
        </div>
        <div class="post-label"></div>
        <div class="post-media"><img src="<?= base_url('IMG/publi10.png') ?>"></div>
        <div class="post-caption"><b>Coca Cola:</b> ¡Una tarde perfecta con Coca Cola!</div>
        <div class="post-actions">
          <?php $tieneLike = in_array(10,$likes ?? []); ?>
          <a href="<?= $tieneLike ? base_url('index.php/LikeController/quitar/10') : base_url('index.php/LikeController/agregar/10') ?>" class="pact act-like<?= $tieneLike ? ' liked' : '' ?>">
            <i class="fa-<?= $tieneLike ? 'solid' : 'regular' ?> fa-heart"></i> LIKE
          </a>
          <div class="pact act-comment"><i class="fa-regular fa-comment"></i> COMENTAR</div>
          <?php $tieneFav = in_array(10,$favoritos ?? []); ?>
          <a href="<?= $tieneFav ? base_url('index.php/FavoritoController/quitar/10') : base_url('index.php/FavoritoController/agregar/10') ?>" class="pact act-save<?= $tieneFav ? ' saved' : '' ?>">
            <i class="fa-<?= $tieneFav ? 'solid' : 'regular' ?> fa-bookmark"></i> GUARDAR
          </a>
          <?php $tieneStar = in_array(10, $estrellas ?? []); ?>
          <a href="<?= $tieneStar ? base_url('index.php/EstrellaController/quitar/10') : base_url('index.php/EstrellaController/agregar/10') ?>" class="pact act-fav<?= $tieneStar ? ' faved' : '' ?>">
            <i class="fa-<?= $tieneStar ? 'solid' : 'regular' ?> fa-star"></i> FAVORITO
          </a>
        </div>
      </article>

    </main>

    <!-- DERECHA -->
    <aside class="stack">

      <div class="panel wall-card">
        <div class="wall-hero">
          <div class="avatar-ring"><img src="<?= base_url('IMG/perfil1.png') ?>"></div>
          <div class="uname">Mi Muro</div>
          <div class="uhandle">@max.pixup</div>
        </div>
        <div class="mood-row">
          <span>Estado: triste hoy</span>
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
            <div class="stack-empty">
              <i class="fa-solid fa-heart-crack"></i>
              <p>Aún no das like a nada</p>
            </div>
          <?php else: ?>
            <?php
              // array_reverse para que el último like quede ARRIBA (tope de la pila)
              $pilaInvertida = array_reverse($likes);
            ?>
            <?php foreach ($pilaInvertida as $i =>$postId): ?>
              <?php
                $pub = $publicaciones[$postId] ?? null;
                $esTope = ((int) $postId === (int) ($tope ?? -1)); // peek() del LikeModel
              ?>
              <?php if ($pub): ?>
                <div class="stack-card<?= $esTope ? ' tope' : '' ?>" data-post-id="<?= $postId ?>">
                  <img class="stack-thumb" src="<?= base_url($pub['imagen']) ?>" alt="">
                  <img class="stack-avatar" src="<?= base_url($pub['avatar']) ?>" alt="">
                  <div class="stack-info">
                    <div class="stack-user"><?= esc($pub['usuario']) ?></div>
                    <div class="stack-caption"><?= esc($pub['caption']) ?></div>
                  </div>
                  <i class="fa-solid fa-heart stack-icon"></i>
                </div>
              <?php else: ?>
                <div class="stack-card<?= $esTope ? ' tope' : '' ?>" data-post-id="<?= $postId ?>">
                  <div class="stack-thumb" style="display:flex;align-items:center;justify-content:center;">
                    <i class="fa-solid fa-image" style="color:#888;"></i>
                  </div>
                  <div class="stack-info">
                    <div class="stack-user">Publicación #<?= $postId ?></div>
                    <div class="stack-caption">(sin datos)</div>
                  </div>
                  <i class="fa-solid fa-heart stack-icon"></i>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>

      <div class="panel">
        <div class="panel-head ph-cyan"><i class="fa-solid fa-bookmark"></i> PUBLICACIONES GUARDADAS</div>
        <div id="favoritosList">
          <?php if (empty($favoritos)): ?>
            <div class="empty-box saved-empty">
              <i class="fa-solid fa-bookmark"></i>
              <p>Aún no tienes guardadas</p>
              <span>toca "guardar" en una publicación</span>
            </div>
          <?php else: ?>
            <?php foreach (array_reverse($favoritos) as$postId): ?>
              <?php $pub = $publicaciones[$postId] ?? null; ?>
              <?php if ($pub): ?>
                <div class="fav-card" data-post-id="<?= $postId ?>">
                  <img class="stack-thumb" src="<?= base_url($pub['imagen']) ?>" alt="">
                  <div class="stack-info">
                    <div class="stack-user"><?= esc($pub['usuario']) ?></div>
                    <div class="stack-caption"><?= esc($pub['caption']) ?></div>
                  </div>
                  <i class="fa-solid fa-bookmark stack-icon"></i>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif; ?>
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
      <div id="reporteList">
        <?php if (empty($historial)): ?>
          <div class="empty-box">
            <i class="fa-solid fa-clock-rotate-left"></i>
            <p>Aún no hay actividad</p>
            <span>tus acciones aparecerán aquí</span>
          </div>
        <?php else: ?>
          <?php foreach ($historial as $i =>$accion): ?>
            <div class="reporte-item<?= $i === 0 ? ' ultima' : '' ?>">
              <span class="reporte-tag tag-<?= $accion['tipo'] ?>">
                <i class="fa-solid fa-heart"></i> <?= $accion['tipo'] ?>
              </span>
              <span><?= esc($accion['usuario']) ?></span>
              <span class="reporte-hora"><?= $accion['hora'] ?></span>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<script>
  window.BASE_URL = "<?= base_url('index.php/') ?>";
</script>
<script src="<?= base_url('JS/pila.js') ?>"></script>
<script src="<?= base_url('JS/historial.js') ?>"></script>
<script src="<?= base_url('JS/comentarios.js') ?>"></script>
<script src="<?= base_url('JS/favoritos.js') ?>"></script>
<script src="<?= base_url('JS/reporte.js') ?>"></script>
<script src="<?= base_url('JS/main.js') ?>"></script>
<script src="<?= base_url('JS/inicio_extra.js') ?>"></script>


</body>
</html>