<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Conversation extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'created_by' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'type' => [
                'type'       => 'ENUM',
                'constraint' => ['single', 'group'],
                'default'    => 'single',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at datetime default null',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('created_by', 'users', 'id', 'CASCADE', 'NO_ACTION', 'created_by_user');
        // $this->forge->addForeignKey('to_user', 'users', 'id', 'CASCADE', 'NO_ACTION', 'message_recieve_user');
        $this->forge->createTable('conversations');
    }

    public function down()
    {
        $this->forge->dropTable('conversations');
    }
}
