<?php

namespace App\Models;

use App\Entities\Conversation;
use CodeIgniter\Model;

class ConversationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'conversations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Conversation::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name', // if group
        'image', // if group
        'created_by', // userid
        'type', // ['single', 'group']
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
    protected $afterFind      = ['afterFind'];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected $returnResponse    = ['success' => false];

    public function afterFind(array $data)
    {
        // {
        //     "id": "2",
        //     "data": {
        //         "id": "2",
        //         "name": null,
        //         "image": null,
        //         "created_by": "4",
        //         "type": "single",
        //         "deleted_at": null
        //     },
        //     "method": "find",
        //     "singleton": true
        // }
        // return $data;
        // log_message('info', json_encode($data));
        if (isset($data['singleton']) && $data['singleton']) {
            if ($data['data']->type == 'group') {
                $data['data']->image = $data['data']->image ? getFullGroupImage($data['data']->image, $data['data']->id) : null;
            }
        } else {
            foreach ($data['data'] as $key => $conversation) {
                if ($conversation->type == 'group') {
                    $data['data'][$key]->image = $conversation->image ? getFullGroupImage($conversation->image, $conversation->id) : null;
                }
            }
        }
        return $data;
    }

    public function getMyConversationsList($userId)
    {
        $conversationMembersModel = new ConversationMembersModel();
        $conversationMembersList = $conversationMembersModel->select('conversation_id')->where('user_id', $userId)->findAll();
        if (count($conversationMembersList)) {
            $conversationIds = [];
            foreach ($conversationMembersList as $key => $list) {
                $conversationIds[] = $list->conversation_id;
            }
            $conversations = $this->whereIn('id', $conversationIds)->findAll();

            foreach ($conversations as $key => $conversation) {
                if ($conversation->type == 'single') {
                    $anotherMember = $conversationMembersModel
                        ->distinct()
                        ->select('conversation_members.user_id, users.full_name, users.avatar')
                        ->join('users', 'users.id = conversation_members.user_id')
                        ->where('conversation_members.user_id !=', $userId)
                        ->where('conversation_members.conversation_id', $conversation->id)
                        ->first();

                    $conversation->name = $anotherMember->full_name;
                    $conversation->image = $anotherMember->avatar ? getFullUserAvatar($anotherMember->avatar, $anotherMember->user_id) : null;
                    $conversations[$key] = $conversation;
                }
            }
            $this->returnResponse['success'] = true;
            $this->returnResponse['data'] = $conversations;
        } else {
            $this->returnResponse['message'] = 'No Data found.';
        }
        return $this->returnResponse;
    }
    public function getConversationDataByID($id, $userId)
    {
        $conversation = $this->find($id);
        $conversationMembersModel = new ConversationMembersModel();
        // first check the conversation have this user authenticate to read
        $check = $conversationMembersModel->where('user_id', $userId)->where('conversation_id', $id)->first();

        if ($conversation && $check) {
            if ($conversation->type == 'single') {
                $anotherMember = $conversationMembersModel
                    ->distinct()
                    ->select('conversation_members.user_id, users.full_name, users.avatar')
                    ->join('users', 'users.id = conversation_members.user_id')
                    ->where('conversation_members.user_id !=', $userId)
                    ->where('conversation_members.conversation_id', $conversation->id)
                    ->first();

                $conversation->name = $anotherMember->full_name;
                $conversation->image = $anotherMember->avatar ? getFullUserAvatar($anotherMember->avatar, $anotherMember->user_id) : null;
            } else {
                $conversation->members = $conversationMembersModel
                    ->distinct()
                    ->select('conversation_members.user_id, users.username, users.full_name, users.avatar')
                    ->join('users', 'users.id = conversation_members.user_id')
                    ->where('conversation_members.conversation_id', $conversation->id)
                    ->findAll();
            }
            $messagesModel = new MessageModel();
            $conversationMessages = $messagesModel->distinct()
                ->select('messages.*, users.full_name as user_name, users.avatar as user_avatar')
                ->join('users', 'users.id = messages.from_user')
                ->where('messages.conversation_id', $conversation->id)->orderBy('messages.id', 'asc')
                ->findAll();
            $conversation->messages = $conversationMessages;

            $this->returnResponse['success'] = true;
            $this->returnResponse['data'] = $conversation;
        } else {
            $this->returnResponse['message'] = 'No Data found.';
        }
        return $this->returnResponse;
    }
}
