<?php

namespace App\Models;

use App\Entities\Message;
use CodeIgniter\Model;

class MessageModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'messages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Message::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'from_user',
        'to_user',
        'message_type', // ['text', 'image', 'audio', 'video', 'contact', 'link', 'document', 'location', 'file']
        'message',
        'conversation_id'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
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

    // public function afterFind(array $data)
    // {
    //     $finderId = auth()->user()->id;
    //     if (isset($data['singleton']) && $data['singleton']) {
    //         if ($data['data']->from_user == $finderId) {
    //             $data['data']->image = $data['data']->image ? getFullGroupImage($data['data']->image, $data['data']->id) : null;
    //         }
    //     } else {
    //         foreach ($data['data'] as $key => $conversation) {
    //             if ($conversation->from_user == $finderId) {
    //                 $data['data'][$key]->image = $conversation->image ? getFullGroupImage($conversation->image, $conversation->id) : null;
    //             }
    //         }
    //     }
    //     return $data;
    // }
}
