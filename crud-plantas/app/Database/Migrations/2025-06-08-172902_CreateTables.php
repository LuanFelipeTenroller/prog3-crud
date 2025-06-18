<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTables extends Migration
{
    public function up()
    {
        // Tipos
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'nome'       => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false],
            'descricao'  => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tipos', true);

        // Usuarios
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'auto_increment' => true],
            'nome'         => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false],
            'email'        => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false, 'unique' => true],
            'senha'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'papel'        => ['type' => 'ENUM', 'constraint' => ['comum', 'admin'], 'default' => 'comum'],
            'data_criacao' => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('usuarios', true);

        // Plantas
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'auto_increment' => true],
            'nome'          => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false],
            'especie'       => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'descricao'     => ['type' => 'TEXT', 'null' => true],
            'cuidados'      => ['type' => 'TEXT', 'null' => true],
            'data_registro' => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP'],
            'tipo_id'       => ['type' => 'INT', 'null' => true],
            'imagem'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'usuario_id'    => ['type' => 'INT', 'null' => false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('tipo_id', 'tipos', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('usuario_id', 'usuarios', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('plantas', true);

        // Favoritos
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'auto_increment' => true],
            'usuario_id'    => ['type' => 'INT', 'null' => false],
            'planta_id'     => ['type' => 'INT', 'null' => false],
            'data_registro' => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['usuario_id', 'planta_id']);
        $this->forge->addForeignKey('usuario_id', 'usuarios', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('planta_id', 'plantas', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('favoritos', true);

        // Comentarios
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'auto_increment' => true],
            'usuario_id'   => ['type' => 'INT', 'null' => false],
            'planta_id'    => ['type' => 'INT', 'null' => false],
            'texto'        => ['type' => 'TEXT', 'null' => false],
            'data_criacao' => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('usuario_id', 'usuarios', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('planta_id', 'plantas', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('comentarios', true);
    }

    public function down()
    {
        $this->forge->dropTable('comentarios', true);
        $this->forge->dropTable('favoritos', true);
        $this->forge->dropTable('plantas', true);
        $this->forge->dropTable('usuarios', true);
        $this->forge->dropTable('tipos', true);
    }
}