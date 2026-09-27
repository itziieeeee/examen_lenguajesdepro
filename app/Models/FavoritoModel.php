<?php

namespace App\Models;

class FavoritoModel
{
    private $session;

    public function __construct()
    {
        $this->session = session();
        
        if (!$this->session->has('pila_favoritos')) {
            $this->session->set('pila_favoritos', []);
        }
    }

    public function push($id_publicacion)
    {
        $pila = $this->session->get('pila_favoritos');
        if (!in_array($id_publicacion, $pila)) {
            $pila[] = $id_publicacion;
        }
        $this->session->set('pila_favoritos', $pila);
    }

    public function pop($id_publicacion)
    {
        $pila = $this->session->get('pila_favoritos');
        $posicion = array_search($id_publicacion, $pila);

        if ($posicion !== false) {
            array_splice($pila, $posicion, 1);
        }
        $this->session->set('pila_favoritos', $pila);
    }

    public function obtener_favoritos()
    {
        return $this->session->get('pila_favoritos');
    }
}