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
        $tags = $this->tagController()->findAll();
        return view('panel2.page.post.add-category', compact(['tags']));
    }
    public function getList()
    {
        $category = $this->findAll();
        return view('panel2.page.post.list-category', compact(['category']));
    }
    public function getDelete($id)
    {
        if ($this->delete($id)){
            return response()->json($this->message('deleteok'));
        }else{
            return response()->json($this->message('deleteno'));
        }
    }
    public function getUpdate()
    {
        return view('panel2.page.post.update-category');
    }
    public function postCreate(Request $request)
    {
        $is_create = $this->create($this->request->all());
        if ($is_create){
            return response()->json($this->message('submitok'));
        }else{
            return response()->json($this->message('submitno'));
        }
    }
}