<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $fields = [
            'full_name' => [
                'type'          => 'VARCHAR',
                'default'       => null,    
                'null' => true,            
                'constraint'    => '255',
                'after' => 'username'
            ],
            'avatar' => [
                'type'          => 'VARCHAR',
                'default'       => null,  
                'null' => true,
                'constraint'    => '255',
                'after' => 'full_name'
            ],
            'phone_number' => [
                'type'          => 'VARCHAR',
                'default'       => null,  
                'null' => true,
                'constraint'    => '15',
                'after' => 'avatar'
            ],
            'role' => [
                'type'          => 'VARCHAR',
                'default'       => null,
                'null' => true,
                'constraint'    => '255',
                'after' => 'phone_number'
            ],
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        //
    }
}
