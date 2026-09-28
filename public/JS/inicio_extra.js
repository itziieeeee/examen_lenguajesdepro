/* ---- bloque 1 ---- */
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

  document.getElementById('navReporte')?.addEventListener('click', function (e) {
    e.preventDefault();
    document.getElementById('modalReporte').classList.add('open');
  });
  
  document.querySelectorAll('[data-cerrar-modal]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      document.getElementById('modalReporte').classList.remove('open');
    });
  });

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

/* ---- bloque 2: COMENTARIOS (se guardan en sessionStorage para que no se borren al recargar) ---- */
const comentarios = [
    "¡Me encorazona! ❤️",
    "¡+1000 de aura! 🔥",
    "-1000 de aura 🤢",
    "Me enrisa 😂",
    "👏"
];

const CLAVE_COMENTARIOS = 'pixup_comentarios';

function leerComentarios() {
    try {
        return JSON.parse(sessionStorage.getItem(CLAVE_COMENTARIOS)) || {};
    } catch (e) {
        return {};
    }
}

function guardarComentario(idPost, texto) {
    const todos = leerComentarios();
    if (!todos[idPost]) todos[idPost] = [];
    todos[idPost].push(texto);
    try {
        sessionStorage.setItem(CLAVE_COMENTARIOS, JSON.stringify(todos));
    } catch (e) {}
}

function pintarComentario(post, texto) {
    const nuevo = document.createElement("p");
    nuevo.className = "comentario-publicado";
    nuevo.innerHTML = "<b>Tú:</b> " + texto;
    post.appendChild(nuevo);
}

// Al cargar la página, vuelve a pintar los comentarios guardados
(function restaurarComentarios() {
    const todos = leerComentarios();
    Object.keys(todos).forEach(function (idPost) {
        const post = document.querySelector('article.post[data-post-id="' + idPost + '"]');
        if (!post) return;
        todos[idPost].forEach(function (texto) { pintarComentario(post, texto); });
    });
})();

document.querySelectorAll(".act-comment").forEach(boton => {
    boton.onclick = function() {
        let post = boton.closest(".post");
        let menuExistente = post.querySelector(".menu-comentarios");

        if (menuExistente) {
            menuExistente.remove();
            return;
        }

        let lista = document.createElement("div");
        lista.className = "menu-comentarios";

        let titulo = document.createElement("div");
        titulo.className = "titulo-comentarios";
        titulo.innerHTML = "Selecciona un comentario";
        lista.appendChild(titulo);

        comentarios.forEach(comentario => {
            let opcion = document.createElement("div");
            opcion.className = "opcion-comentario";
            opcion.innerHTML = comentario;

            opcion.onclick = function() {
                const idPost = post.dataset.postId;
                pintarComentario(post, comentario);
                guardarComentario(idPost, comentario);

                fetch(window.BASE_URL + 'HistorialController/registrar/COMENTARIO/' + idPost);
                lista.remove();
            };
            lista.appendChild(opcion);
        });
        post.appendChild(lista);
    };
});

/* ---- bloque 3: clic en los paneles (FAVORITOS, LIKES, GUARDADAS) -> ir a la publicación ---- */
document.querySelectorAll('#favoritosPanel .favs-item, .stack-card[data-post-id], .fav-card[data-post-id]').forEach(function (item) {
  item.style.cursor = 'pointer';
  item.addEventListener('click', function () {
    var art = document.querySelector('article.post[data-post-id="' + item.getAttribute('data-post-id') + '"]');
    if (!art) return;
    art.scrollIntoView({ behavior: 'smooth', block: 'center' });
    art.style.transition = 'box-shadow 0.3s';
    art.style.boxShadow = '0 0 0 4px var(--yellow), 0 5px 0 #000';
    setTimeout(function () { art.style.boxShadow = ''; }, 1200);
  });
});

/* ---- bloque 4: al dar LIKE / GUARDAR / ESTRELLA la página se queda en el mismo lugar ---- */
(function () {
  document.querySelectorAll('.post-actions a').forEach(function (a) {
    a.addEventListener('click', function () {
      try { sessionStorage.setItem('pixup_scroll', String(window.scrollY)); } catch (e) {}
    });
  });

  function restaurarScroll() {
    var y = null;
    try { y = sessionStorage.getItem('pixup_scroll'); sessionStorage.removeItem('pixup_scroll'); } catch (e) {}
    if (y !== null) window.scrollTo(0, parseInt(y, 10) || 0);
  }
  restaurarScroll();
})();