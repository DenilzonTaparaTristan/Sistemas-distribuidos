<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RolPermisos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_rol_permiso' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_rol' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'id_permiso' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
        ]);
        $this->forge->addKey('id_rol_permiso', true);
        $this->forge->addForeignKey('id_rol', 'roles', 'id_rol', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_permiso', 'permisos', 'id_permiso', 'CASCADE', 'CASCADE');
        $this->forge->createTable('rol_permisos');
        
    }

    public function down()
    {
        $this->forge->dropTable('rol_permisos');
    }
}
