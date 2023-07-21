<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\ConversationMembersModel;
use App\Models\ConversationModel;
use App\Models\UserModel;

class ConversationController extends BaseController
{
    // custom variables
    protected $returnResponse;
    protected $conversationModel;
    protected $conversationMemberModel;
    protected $userModel;

    public function __construct()
    {
        $this->returnResponse    = ['success' => false];
        $this->conversationModel    = new ConversationModel();
        $this->conversationMemberModel    = new ConversationMembersModel();
        $this->userModel    = new UserModel();
    }

    public function getMyConversationsList()
    {
        return response()->setJSON($this->conversationModel->getMyConversationsList(auth()->user()->id));
    }
    public function getConversationDataByID($id)
    {
        return response()->setJSON($this->conversationModel->getConversationDataByID($id, auth()->user()->id));
    }
}
