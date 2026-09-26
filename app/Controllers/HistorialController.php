<?php

namespace App\Controllers;

use App\Models\HistorialModel;
use App\Models\PublicacionModel;

class HistorialController extends BaseController
{
    public function registrar($tipo, $id_publicacion)
    {
        $historialModel = new HistorialModel();
        $publicacionModel = new PublicacionModel();

        $publicaciones = $publicacionModel->obtener_publicaciones();
        $usuario = $publicaciones[$id_publicacion]['usuario'] ?? "Publicación #$id_publicacion";

        $historialModel->push($tipo, (int) $id_publicacion, $usuario);

        return $this->response->setJSON(['ok' => true]);
    }
}