<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Permisos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_permiso' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id_permiso', true);
        $this->forge->createTable('permisos');
    }

    public function down()
    {
        $this->forge->dropTable('permisos');
    }
}
