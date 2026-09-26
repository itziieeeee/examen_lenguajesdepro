<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LikeModel;
use App\Models\HistorialModel;
use App\Models\PublicacionModel;

class LikeController extends Controller
{
    public function agregar($id_publicacion)
    {
        $likeModel = new LikeModel();
        $likeModel->push($id_publicacion);

        $this->registrar('LIKE', $id_publicacion);

        return redirect()->to('/');
    }

    public function quitar($id_publicacion)
    {
        $likeModel = new LikeModel();
        $likeModel->pop($id_publicacion);

        $this->registrar('UNLIKE', $id_publicacion);

        return redirect()->to('/');
    }

    private function registrar($tipo, $id_publicacion)
    {
        $historialModel = new HistorialModel();
        $publicacionModel = new PublicacionModel();

        $publicaciones = $publicacionModel->obtener_publicaciones();
        $usuario = $publicaciones[$id_publicacion]['usuario'] ?? "Publicación #$id_publicacion";

        $historialModel->push($tipo, $id_publicacion, $usuario);
    }
}