<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Permisos extends Seeder
{
    public function run()
    {
        $data = [
            ['nombre' => 'crear'],
            ['nombre' => 'editar'],
            ['nombre' => 'eliminar'],
            ['nombre' => 'ver'],
        ];

        $this->db->table('permisos')->insertBatch($data);
    }
}
