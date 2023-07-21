<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MessageGroupMember extends Migration
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
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'conversation_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'user_left datetime default null',
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at datetime default null',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'NO_ACTION', 'conversation_member_id');
        $this->forge->addForeignKey('conversation_id', 'conversations', 'id', 'CASCADE', 'NO_ACTION', 'conversation_relation');
        $this->forge->createTable('conversation_members');
    }

    public function down()
    {
        $this->forge->dropTable('conversation_members');
    }
}
