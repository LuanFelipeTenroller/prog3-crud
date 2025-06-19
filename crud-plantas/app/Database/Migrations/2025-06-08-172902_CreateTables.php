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
        $this->forge->createTable('tipo', true);

        // Usuarios
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'auto_increment' => true],
            'nome'         => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false],
            'email'        => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false, 'unique' => true],
            'senha'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'papel'        => ['type' => 'ENUM', 'constraint' => ['comum', 'admin'], 'null' => false],
            'data_criacao' => ['type' => 'DATETIME', 'null' => false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('usuario', true);

        // Plantas
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'auto_increment' => true],
            'nome'          => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false],
            'especie'       => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'descricao'     => ['type' => 'TEXT', 'null' => true],
            'cuidados'      => ['type' => 'TEXT', 'null' => true],
            'data_registro' => ['type' => 'DATETIME', 'null' => false],
            'tipo_id'       => ['type' => 'INT', 'null' => true],
            'imagem'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'usuario_id'    => ['type' => 'INT', 'null' => false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('tipo_id', 'tipo', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('usuario_id', 'usuario', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('planta', true);

        // Favoritos
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'auto_increment' => true],
            'usuario_id'    => ['type' => 'INT', 'null' => false],
            'planta_id'     => ['type' => 'INT', 'null' => false],
            'data_registro' => ['type' => 'DATETIME', 'null' => false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['usuario_id', 'planta_id']);
        $this->forge->addForeignKey('usuario_id', 'usuario', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('planta_id', 'planta', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('favorito', true);

        // Comentarios
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'auto_increment' => true],
            'usuario_id'   => ['type' => 'INT', 'null' => false],
            'planta_id'    => ['type' => 'INT', 'null' => false],
            'texto'        => ['type' => 'TEXT', 'null' => false],
            'data_criacao' => ['type' => 'DATETIME', 'null' => false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('usuario_id', 'usuario', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('planta_id', 'planta', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('comentario', true);
    }

    public function down()
    {
        $this->forge->dropTable('comentario', true);
        $this->forge->dropTable('favorito', true);
        $this->forge->dropTable('planta', true);
        $this->forge->dropTable('usuario', true);
        $this->forge->dropTable('tipo', true);
    }
}
