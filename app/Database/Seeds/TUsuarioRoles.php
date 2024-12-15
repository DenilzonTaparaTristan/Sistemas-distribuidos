<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TUsuarioRoles extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // Obtener las IDs de los usuarios
        $usuarios = $db->table('t_usuarios')->get()->getResultArray();
        $roles = $db->table('roles')->get()->getResultArray();

        $data = [
            ['id_usuario' => $usuarios[0]['id_usuario'], 'id_rol' => $roles[0]['id_rol']], // Admin -> Admin
            ['id_usuario' => $usuarios[1]['id_usuario'], 'id_rol' => $roles[1]['id_rol']], // Editor -> Editor
            ['id_usuario' => $usuarios[2]['id_usuario'], 'id_rol' => $roles[2]['id_rol']], // Viewer -> Viewer
        ];

        // Insertar datos en la tabla de relación
        $this->db->table('t_usuario_roles')->insertBatch($data);
    }
}
