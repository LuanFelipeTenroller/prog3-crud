<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePlantasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'auto_increment' => true],
            'nome'          => ['type' => 'VARCHAR', 'constraint' => 100],
            'especie'       => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'descricao'     => ['type' => 'TEXT', 'null' => true],
            'cuidados'      => ['type' => 'TEXT', 'null' => true],
            'data_registro' => ['type' => 'DATETIME', 'null' => true],
            'tipo_id'       => ['type' => 'INT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('tipo_id', 'tipos', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('plantas');
    }

    public function down()
    {
        $this->forge->dropTable('plantas');
    }
}
