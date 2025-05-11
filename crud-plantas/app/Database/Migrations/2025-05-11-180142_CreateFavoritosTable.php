<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFavoritosTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'auto_increment' => true],
            'planta_id'     => ['type' => 'INT'],
            'data_registro' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('planta_id', 'plantas', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('favoritos');
    }

    public function down()
    {
        $this->forge->dropTable('favoritos');
    }
}
