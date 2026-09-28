<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\EstrellaModel;
use App\Models\HistorialModel;
use App\Models\PublicacionModel;

class EstrellaController extends Controller
{
    public function agregar($id_publicacion)
    {
        $estrellaModel = new EstrellaModel();
        $estrellaModel->push((int) $id_publicacion);

        $this->registrar('FAVORITO', (int) $id_publicacion);

        return redirect()->to(base_url('index.php/'));
    }

    public function quitar($id_publicacion)
    {
        $estrellaModel = new EstrellaModel();
        $estrellaModel->pop((int) $id_publicacion);

        $this->registrar('QUITAR_FAVORITO', (int) $id_publicacion);

        return redirect()->to(base_url('index.php/'));
    }

    private function registrar($tipo, $id_publicacion)
    {
        $historialModel   = new HistorialModel();
        $publicacionModel = new PublicacionModel();

        $publicaciones = $publicacionModel->obtener_publicaciones();
        $usuario = $publicaciones[$id_publicacion]['usuario'] ?? "Publicación #$id_publicacion";

        $historialModel->push($tipo, $id_publicacion, $usuario);
    }
}