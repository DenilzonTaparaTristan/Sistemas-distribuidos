<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Roles extends Seeder
{
    public function run()
    {
        $data = [
            ['nombre' => 'admin'],
            ['nombre' => 'editor'],
            ['nombre' => 'viewer'],
        ];

        $this->db->table('roles')->insertBatch($data);
    }
}
