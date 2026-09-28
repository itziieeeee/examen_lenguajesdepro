<?php

namespace App\Controllers;

use App\Models\LikeModel;
use App\Models\PublicacionModel;
use App\Models\FavoritoModel;
use App\Models\EstrellaModel;
use App\Models\HistorialModel;

class Home extends BaseController
{
    public function index(): string
    {
        $likeModel        = new LikeModel();
        $publicacionModel = new PublicacionModel();
        $historialModel   = new HistorialModel();
        $favoritoModel    = new FavoritoModel();
        $estrellaModel    = new EstrellaModel();

        $data['likes']         = $likeModel->obtener_likes();
        $data['tope']          = $likeModel->peek();               
        $data['publicaciones'] = $publicacionModel->obtener_publicaciones();
        $data['historial']     = $historialModel->obtener_historial();
        $data['favoritos']     = $favoritoModel->obtener_favoritos();
        $data['estrellas']     = $estrellaModel->obtener_estrellas();

        return view('Inicio', $data);
    }
}