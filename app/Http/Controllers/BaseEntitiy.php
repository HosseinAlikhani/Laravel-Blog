<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseEntitiy extends Controller
{
    protected $model;
    public function create($data)
    {
        return $this->model->create($data);
    }
    public function update($data)
    {
        return $this->model->update($data);
    }
    public function delete($data)
    {
        return $this->model->destroy($data);
    }
    public function findAll()
    {
        return $this->model->all();
    }
    public function FindOne($id)
    {
        return $this->model->find($id);
    }

}
