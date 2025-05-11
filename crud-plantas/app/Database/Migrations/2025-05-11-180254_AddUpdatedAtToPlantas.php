<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUpdatedAtToPlantas extends Migration
{
    public function up()
    {
        $this->forge->addColumn('plantas', [
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'data_registro'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('plantas', 'updated_at');
    }
}
