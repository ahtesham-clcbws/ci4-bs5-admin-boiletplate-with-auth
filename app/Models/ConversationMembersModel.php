<?php

namespace App\Models;

use App\Entities\MessageGroupMember;
use CodeIgniter\Model;

class ConversationMembersModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'conversation_members';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = MessageGroupMember::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'conversation_id',
        'user_left', // datetime
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at'; // user joined	
    protected $updatedField  = 'updated_at'; // user left maybe
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
