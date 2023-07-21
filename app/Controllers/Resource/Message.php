<?php

namespace App\Controllers\Resource;

use CodeIgniter\RESTful\ResourceController;

class Message extends ResourceController
{
    protected $modelName = 'App\Models\MessageModel';
    protected $format    = 'json';
    protected $respondMessage = [
        'success'=> false,
        'message'=> 'Unknown Error.',
    ];

    public function new()
    {
        $this->respondMessage['success'] = true;
        $this->respondMessage['message'] = null;
        $this->respondMessage['data'] = $this->model->findAll();
        return $this->respond($this->respondMessage);
    }
    public function create()
    {
        $this->respondMessage['success'] = true;
        $this->respondMessage['message'] = null;
        $this->respondMessage['data'] = $this->model->findAll();
        return $this->respond($this->respondMessage);
    }
    public function index()
    {
        $this->respondMessage['success'] = true;
        $this->respondMessage['message'] = null;
        $this->respondMessage['data'] = $this->model->findAll();
        return $this->respond($this->respondMessage);
    }

    
    public function show($id = null)
    {
        $this->respondMessage['success'] = true;
        $this->respondMessage['message'] = null;
        $this->respondMessage['data'] = $this->model->find($id);
        return $this->respond($this->respondMessage);
    }
    public function edit($id = null)
    {
        $this->respondMessage['success'] = true;
        $this->respondMessage['message'] = null;
        $this->respondMessage['data'] = $this->model->find($id);
        return $this->respond($this->respondMessage);
    }
    public function update($id = null)
    {
        $this->respondMessage['success'] = true;
        $this->respondMessage['message'] = null;
        $this->respondMessage['data'] = $this->model->findAll();
        return $this->respond($this->respondMessage);
    }
    public function delete($id = null)
    {
        $this->respondMessage['success'] = true;
        $this->respondMessage['message'] = null;
        $this->respondMessage['data'] = $this->model->delete($id);
        return $this->respond($this->respondMessage);
    }
}
