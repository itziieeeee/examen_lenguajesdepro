<?php

namespace App\Models;
/**
 * PILA DE LIKES (LIFO)
 * El último like que entra es el TOPE de la pila.
 */
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

    /** PUSH: mete un like en el tope de la pila . */
    public function push($id_publicacion)
    {
        $id   = (int) $id_publicacion;
        $pila = $this->session->get('pila_likes');

        if (in_array($id, $pila)) {
            return false;
        }

        $pila[] = $id;
        $this->session->set('pila_likes', $pila);
        return true;
    }
    public function pop($id_publicacion)
    {
        $id         = (int) $id_publicacion;
        $pila       = $this->session->get('pila_likes');
        $auxiliar   = [];
        $encontrado = false;

        while (!empty($pila)) {
            $elemento = array_pop($pila);

            if ((int) $elemento === $id) {
                $encontrado = true;
                break;
            }
            array_push($auxiliar, $elemento);
        }

        while (!empty($auxiliar)) {
            array_push($pila, array_pop($auxiliar));
        }

        $this->session->set('pila_likes', $pila);
        return $encontrado;
    }

    /** PEEK: consulta el tope  */
    public function peek()
    {
        $pila = $this->session->get('pila_likes');

        if (empty($pila)) {
            return null;
        }

        return (int) end($pila);
    }

    public function obtener_likes()
    {
        return $this->session->get('pila_likes');
    }
}