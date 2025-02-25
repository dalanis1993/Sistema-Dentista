<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class IconSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Casa', 'tag' => 'fa-home'],
            ['name' => 'Usuario', 'tag' => 'fa-user'],
            ['name' => 'Configuración', 'tag' => 'fa-cog'],
            ['name' => 'Teléfono', 'tag' => 'fa-phone'],
            ['name' => 'Correo', 'tag' => 'fa-envelope'],
            ['name' => 'Carrito de compras', 'tag' => 'fa-shopping-cart'],
            ['name' => 'Corazón', 'tag' => 'fa-heart'],
            ['name' => 'Estrella', 'tag' => 'fa-star'],
            ['name' => 'Calendario', 'tag' => 'fa-calendar'],
            ['name' => 'Cámara', 'tag' => 'fa-camera'],
            ['name' => 'Bloquear', 'tag' => 'fa-lock'],
            ['name' => 'Desbloquear', 'tag' => 'fa-unlock'],
            ['name' => 'Descargar', 'tag' => 'fa-download'],
            ['name' => 'Subir', 'tag' => 'fa-upload'],
            ['name' => 'Lápiz', 'tag' => 'fa-pencil-alt'],
            ['name' => 'Papelera', 'tag' => 'fa-trash'],
            ['name' => 'Mapa', 'tag' => 'fa-map'],
            ['name' => 'Búsqueda', 'tag' => 'fa-search'],
            ['name' => 'Música', 'tag' => 'fa-music'],
            ['name' => 'Video', 'tag' => 'fa-video'],
        ];

        $this->db->table('icons')->insertBatch($data);
    }
}
