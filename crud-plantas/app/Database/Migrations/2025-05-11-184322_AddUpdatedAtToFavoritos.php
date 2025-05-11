<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUpdatedAtToFavoritos extends Migration
{
    public function up()
    {
        $this->forge->addColumn('favoritos', [
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'data_registro'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('favoritos', 'updated_at');
    }
}
