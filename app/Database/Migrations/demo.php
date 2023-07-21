<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Message extends Migration
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
            'from_user' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'blog_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'blog_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at datetime default null',
        ]);
        $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('from_user', 'users', 'id', 'CASCADE', 'NO_ACTION', 'message_send_user');
        // $this->forge->addForeignKey('to_user', 'users', 'id', 'CASCADE', 'NO_ACTION', 'message_recieve_user');
        $this->forge->createTable('blog');
    }

    public function down()
    {
        $this->forge->dropTable('blog');
    }
}
