<?php

namespace App\Models;

class EstrellaModel
{
    private $session;

    public function __construct()
    {
        $this->session = session();

        if (!$this->session->has('pila_favoritos_estrella')) {
            $this->session->set('pila_favoritos_estrella', []);
        }
    }

    public function push($id_publicacion)
    {
        $pila = $this->session->get('pila_favoritos_estrella');

        if (!in_array($id_publicacion, $pila)) {
            $pila[] = $id_publicacion;
        }

        $this->session->set('pila_favoritos_estrella', $pila);
    }

    public function pop($id_publicacion)
    {
        $pila = $this->session->get('pila_favoritos_estrella');
        $posicion = array_search($id_publicacion, $pila);

        if ($posicion !== false) {
            array_splice($pila, $posicion, 1);
        }

        $this->session->set('pila_favoritos_estrella', $pila);
    }

    public function obtener_estrellas()
    {
        return $this->session->get('pila_favoritos_estrella');
    }
}