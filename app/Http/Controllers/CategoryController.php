<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends BaseEntitiy
{
    public function __construct(CategoryRequest $request, Category $category)
    {
        $this->model = $category;
        $this->request = $request;
    }
    public function getCreate()
    {
        $category = $this->findAll();
        return view('panel2.page.post.add-category', compact(['category']));
    }
    public function getList()
    {
        $category = $this->findAll();
        return view('panel2.page.post.list-category', compact(['category']));
    }
    public function getDelete()
    {
        if ($this->delete($this->request->category_id)){
            return response()->json($this->message('deleteok'));
        }else{
            return response()->json($this->message('deleteno'));
        }
    }
    public function getUpdate($id)
    {
        $categorylist = $this->findAll();
        $category = $this->findOne($id);
        if ($category->categories_id != 0 && $category->categories_id != null){
            $category = [
                'id'    =>  $category->id,
                'name'  =>  $category->name,
                'categories_id' =>  $category->categories_id,
                'categories_name'   =>  $this->findOne($category->categories_id)->name,
            ];
        }
        return view('panel2.page.post.edit-category', compact(['category', 'categorylist']));
    }
    public function postCategory()
    {
        $is_create = $this->create($this->request->all());
        if ($is_create){
            return response()->json($this->message('submitok'));
        }else{
            return response()->json($this->message('submitno'));
        }
    }
    public function patchCategory()
    {
        $data = $this->request->all();
        unset($data['id']);
        $is_create = $this->update($this->request->id, $data);
        if ($is_create){
            return response()->json($this->message('submitok'));
        }else{
            return response()->json($this->message('submitno'));
        }
    }
}
