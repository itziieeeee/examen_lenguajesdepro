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
                'imagen'  => 'https://picsum.photos/seed/post8/700/560',
                'avatar'  => 'https://picsum.photos/seed/siko/80',
                'usuario' => 'Sikowitz',
                'caption' => '¡La creatividad no tiene límites!',
            ],
            9 => [
                'imagen'  => 'https://picsum.photos/seed/post9/700/560',
                'avatar'  => 'https://picsum.photos/seed/tori/80',
                'usuario' => 'Tori Vega',
                'caption' => 'Recuerdos de la gira',
            ],
            10 => [
                'imagen'  => 'https://picsum.photos/seed/post10/700/560',
                'avatar'  => 'https://picsum.photos/seed/cat/80',
                'usuario' => 'Cat Valentine',
                'caption' => '¡Una tarde perfecta!',
            ],
        ];
    }
}