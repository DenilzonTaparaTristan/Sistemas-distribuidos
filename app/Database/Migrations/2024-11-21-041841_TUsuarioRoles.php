<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TUsuarioRoles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_usuario_rol' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_usuario' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'id_rol' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
        ]);
        $this->forge->addKey('id_usuario_rol', true);
        $this->forge->addForeignKey('id_usuario', 't_usuarios', 'id_usuario', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_rol', 'roles', 'id_rol', 'CASCADE', 'CASCADE');   
        $this->forge->createTable('t_usuario_roles');
        
    }

    public function down()
    {
        $this->forge->dropTable('t_usuario_roles');
    }
}
