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
    public function update($id, $data)
    {
        return $this->model->find($id)->update($data);
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
    public function check($data)
    {
        dd($data);
        $sum = $this->model;
        foreach ($data as $key => $value){
            $sum = $sum->where($key, $value);
        }
        return $sum->first();
    }

}
