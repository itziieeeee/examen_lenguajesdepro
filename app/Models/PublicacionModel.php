<?php

namespace App\Models;

class PublicacionModel
{
    /**
     * Catálogo de publicaciones del feed.
     * En un proyecto real esto vendría de la BD, pero aquí
     * centralizamos los datos para no duplicarlos en la vista.
     */
    public function obtener_publicaciones(): array
    {
        return [
            1 => [
                'imagen'  => 'IMG/pot1.png',
                'avatar'  => 'IMG/p1.png',
                'usuario' => 'Selena Gomez',
                'caption' => '¡Me encantan mis nuevos accesorios!',
            ],
            2 => [
                'imagen'  => 'IMG/pot2.png',
                'avatar'  => 'IMG/p2.png',
                'usuario' => 'Britani Spears',
                'caption' => 'Usando insta en mi computadora nueva',
            ],
            3 => [
                'imagen'  => 'IMG/pot3.png',
                'avatar'  => 'IMG/p3.png',
                'usuario' => 'Adam Sandler',
                'caption' => 'Con el elenco de Rapidos y Furiosos',
            ],
            4 => [
                'imagen'  => 'IMG/pot4.png',
                'avatar'  => 'IMG/perfil2.png',
                'usuario' => 'The Rock',
                'caption' => 'Nuevo proyecto en el que estuve trabajando.',
            ],
            5 => [
                'imagen'  => 'IMG/pot5.png',
                'avatar'  => 'IMG/may.png',
                'usuario' => 'MAYBELLINE',
                'caption' => '¡Miren qué lindo quedó todo hoy!',
            ],
            6 => [
                'imagen'  => 'IMG/pot6.png',
                'avatar'  => 'IMG/logopepsi.png',
                'usuario' => 'Pepsi',
                'caption' => 'Sin palabras.',
            ],
            7 => [
                'imagen'  => 'IMG/pot7.png',
                'avatar'  => 'IMG/chicaspesadas.png',
                'usuario' => 'Regina',
                'caption' => 'Sesión de fotos en el estudio con las Mean Girls.',
            ],
            8 => [
                'imagen'  => 'IMG/p5.png',
                'avatar'  => 'IMG/preocupadap3.png',
                'usuario' => 'Aime',
                'caption' => 'Preocupada p3',
            ],
            9 => [
                'imagen'  => 'IMG/pot7.png',
                'avatar'  => 'IMG/p9.png',
                'usuario' => 'Warner',
                'caption' => 'Nuevo meme',
            ],
            10 => [
                'imagen'  => 'IMG/publi10.png',
                'avatar'  => 'IMG/logo10.png',
                'usuario' => 'Coca Cola',
                'caption' => '¡Una tarde perfecta con Coca Cola!',
            ],
        ];
    }
}