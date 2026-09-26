<?php

namespace App\Controllers;

use App\Models\LikeModel;
use App\Models\PublicacionModel;

class Home extends BaseController
{
    public function index(): string
{
    $likeModel = new LikeModel();
    $publicacionModel = new PublicacionModel();
    $historialModel = new \App\Models\HistorialModel();

    $data['likes'] = $likeModel->obtener_likes();
    $data['publicaciones'] = $publicacionModel->obtener_publicaciones();
    $data['historial'] = $historialModel->obtener_historial();

    return view('Inicio', $data);
}
    public function login(): string
    {
        return view('login');
    }
    
}