<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FavoritoModel;
use App\Models\HistorialModel;
use App\Models\PublicacionModel;

class FavoritoController extends Controller
{
    public function agregar($id_publicacion)
    {
        $favoritoModel = new FavoritoModel();
        $favoritoModel->push($id_publicacion);

        $this->registrar('GUARDAR', $id_publicacion);

        // Se corrigió la redirección para mantener la sesión viva en XAMPP
        return redirect()->to(base_url('index.php/'));
    }

    public function quitar($id_publicacion)
    {
        $favoritoModel = new FavoritoModel();
        $favoritoModel->pop($id_publicacion);

        $this->registrar('QUITAR_GUARDADO', $id_publicacion);

        // Se corrigió la redirección para mantener la sesión viva en XAMPP
        return redirect()->to(base_url('index.php/'));
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