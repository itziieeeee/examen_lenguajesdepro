
console.log("FAVORITOS.JS SE CARGÓ");

document.querySelectorAll(".act-save").forEach(boton => {

    boton.addEventListener("click", async function () {

        const post = this.closest(".post");
        const postId = post.dataset.postId;

        console.log("Guardando publicación:", postId);

        try {

            const respuesta = await fetch(
                "http://127.0.0.1:5000/favorito/agregar",
                {
                    method: "POST",

                    headers: {
                        "Content-Type": "application/json"
                    },

                    body: JSON.stringify({
                        post_id: Number(postId)
                    })
                }
            );

            const datos = await respuesta.json();

            console.log("Respuesta de Python:", datos);

            // Mostrar los favoritos en Inicio.php
            mostrarFavoritos(datos.favoritos);

        } catch (error) {

            console.error("Error al conectar con Flask:", error);

        }

    });

});


function mostrarFavoritos(favoritos) {

    const lista = document.getElementById("favoritosList");

    if (!lista) {
        console.error("No se encontró favoritosList");
        return;
    }

    // Limpiar la lista
    lista.innerHTML = "";

    // Si no hay favoritos
    if (favoritos.length === 0) {

        lista.innerHTML = `
            <div class="empty-box saved-empty">
                <i class="fa-solid fa-bookmark"></i>
                <p>Aún no tienes guardadas</p>
                <span>toca "guardar" en una publicación</span>
            </div>
        `;

        return;
    }

    // Mostrar cada publicación guardada
    favoritos.slice().reverse().forEach(postId => {

        lista.innerHTML += `
            <div class="saved-item">
                <i class="fa-solid fa-bookmark"></i>
                <span>Publicación #${postId}</span>
            </div>
        `;

    });
    async function cargarFavoritos() {

    try {

        const respuesta = await fetch(
            "http://127.0.0.1:5000/favoritos"
        );

        const datos = await respuesta.json();

        console.log("Favoritos cargados:", datos);

        mostrarFavoritos(datos.favoritos);

    } catch (error) {

        console.error("Error al cargar favoritos:", error);

    }

}
}
cargarFavoritos();