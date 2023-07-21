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
            'to_user' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null' => true,
            ],
            'message_type' => [
                'type'       => 'ENUM',
                'constraint' => ['text', 'image', 'audio', 'video', 'contact', 'link', 'document', 'location', 'file'],
                'default'    => 'text',
            ],
            'message' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'conversation_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at datetime default null',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('from_user', 'users', 'id', 'CASCADE', 'NO_ACTION', 'message_send_user');
        $this->forge->addForeignKey('to_user', 'users', 'id', 'CASCADE', 'NO_ACTION', 'message_recieve_user');
        $this->forge->addForeignKey('conversation_id', 'conversations', 'id', 'CASCADE', 'NO_ACTION', 'message_conversation');
        $this->forge->createTable('messages');
    }

    public function down()
    {
        $this->forge->dropTable('messages');
    }
}
