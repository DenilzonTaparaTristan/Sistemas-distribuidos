<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGastosTable extends Migration
{
    public function up()
    {
        // Definir la estructura de la tabla 'gastos'
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'usuario_id' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'monto' => [
                'type'       => 'FLOAT',
                'constraint' => '10,2',
            ],
            'categoria' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'descripcion' => [
                'type' => 'TEXT',
            ],
            'fecha' => [
                'type' => 'DATETIME',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        // Agregar una clave primaria en el campo 'id'
        $this->forge->addKey('id', true);

        // Crear la tabla 'gastos'
        $this->forge->createTable('gastos');
    }

    public function down()
    {
        // Eliminar la tabla 'gastos'
        $this->forge->dropTable('gastos');
    }
}
