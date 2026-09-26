<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LikeModel;

class LikeController extends Controller
{
    public function agregar($id_publicacion)
    {
        $likeModel = new LikeModel();

        $likeModel->push($id_publicacion);

        return redirect()->to('/');
    }

    public function quitar($id_publicacion)
    {
        $likeModel = new LikeModel();

        $likeModel->pop($id_publicacion);

        return redirect()->to('/');
    }
}