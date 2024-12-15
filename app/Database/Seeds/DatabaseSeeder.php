<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('Roles');
        $this->call('Permisos');
        $this->call('Usuario');
        $this->call('RolPermisos');
        $this->call('TUsuarioRoles');
    }
}
