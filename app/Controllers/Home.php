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

        $data['likes'] = $likeModel->obtener_likes();
        $data['publicaciones'] = $publicacionModel->obtener_publicaciones();

        return view('Inicio', $data);
    }

    public function login(): string
    {
        return view('login');
    }
}