<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;

class UserData extends BaseController
{
    public function index()
    {
        return response()->setJson(auth()->user());
    }
}
