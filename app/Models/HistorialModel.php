<?php

namespace App\Models;

class HistorialModel
{
    private $session;

    public function __construct()
    {
        $this->session = session();

        if (!$this->session->has('pila_historial')) {
            $this->session->set('pila_historial', []);
        }
    }

    public function push($tipo, $id_publicacion, $usuario)
    {
        $pila = $this->session->get('pila_historial');

        $pila[] = [
            'tipo'    => $tipo,
            'id'      => $id_publicacion,
            'usuario' => $usuario,
            'hora'    => date('H:i'),
        ];

        $this->session->set('pila_historial', $pila);
    }

    public function obtener_historial()
    {
        $pila = $this->session->get('pila_historial');
        return array_reverse($pila);
    }
}