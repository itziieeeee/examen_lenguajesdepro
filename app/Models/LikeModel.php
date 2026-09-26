<?php

namespace App\Models;

class LikeModel
{
    private $session;

    public function __construct()
    {
        $this->session = session();
        
        if (!$this->session->has('pila_likes')) {
            $this->session->set('pila_likes', []);
        }
    }

    public function push($id_publicacion)
    {
        $pila = $this->session->get('pila_likes');

        $pila[] = $id_publicacion;

        $this->session->set('pila_likes', $pila);
    }

    public function pop($id_publicacion)
    {
        $pila = $this->session->get('pila_likes');

        $posicion = array_search($id_publicacion, $pila);

        if ($posicion !== false) {
            array_splice($pila, $posicion, 1);
        }

        $this->session->set('pila_likes', $pila);
    }

    public function peek()
    {
        $pila = $this->session->get('pila_likes');

        if (empty($pila)) {
            return null;
        }

        return end($pila);
    }

    public function obtener_likes()
    {
        return $this->session->get('pila_likes');
    }
}