<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolPermisos extends Seeder
{
    public function run()
    {
        $data = [
            // Permisos del admin (ID Rol: 1)
            ['id_rol' => 1, 'id_permiso' => 1], // Admin -> Crear
            ['id_rol' => 1, 'id_permiso' => 2], // Admin -> Editar
            ['id_rol' => 1, 'id_permiso' => 3], // Admin -> Eliminar
            ['id_rol' => 1, 'id_permiso' => 4], // Admin -> Ver

            // Permisos del editor (ID Rol: 2)
            ['id_rol' => 2, 'id_permiso' => 2], // Editor -> Editar
            ['id_rol' => 2, 'id_permiso' => 4], // Editor -> Ver

            // Permisos del viewer (ID Rol: 3)
            ['id_rol' => 3, 'id_permiso' => 4], // Viewer -> Ver
        ];

        $this->db->table('rol_permisos')->insertBatch($data);
    }
}
