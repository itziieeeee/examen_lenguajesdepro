<?php

namespace App\Controllers;

use App\Models\LikeModel;
use App\Models\PublicacionModel;
use App\Models\FavoritoModel; // <- Añadir esto

class Home extends BaseController
{
    public function index(): string
    {
        $likeModel = new LikeModel();
        $publicacionModel = new PublicacionModel();
        $historialModel = new \App\Models\HistorialModel();
        $favoritoModel = new FavoritoModel(); // <- Añadir esto

        $data['likes'] = $likeModel->obtener_likes();
        $data['publicaciones'] = $publicacionModel->obtener_publicaciones();
        $data['historial'] = $historialModel->obtener_historial();
        $data['favoritos'] = $favoritoModel->obtener_favoritos(); // <- Añadir esto

        return view('Inicio', $data);
    }
    
}