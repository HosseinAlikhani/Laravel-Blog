<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Model\Tag;

class TagController extends BaseEntitiy
{
    public function __construct(TagRequest $request, Tag $tag)
    {
        $this->request = $request;
        $this->model = $tag;
    }

    public function getCreate()
    {
        $tag = $this->findAll();
        return view('panel2.page.post.add-tag', compact(['tag']));
    }
    public function getList()
    {
        $tags = $this->findAll();
        return view('panel2.page.post.list-tag', compact(['tags']));
    }
    public function getUpdate($id)
    {
        $taglist = $this->findAll();
        $tag = $this->findOne($id);
        return view('panel2.page.post.edit-tag', compact(['taglist', 'tag']));
    }
    public function postTag()
    {
        $is_create = $this->create($this->request->all());
        if ($is_create){
            return response()->json($this->message('submitok'));
        }else{
            return response()->json($this->message('submitno'));
        }
    }

    public function deleteTag()
    {
        $is_create = $this->delete($this->request->tag_id);
        if ($is_create){
            return response()->json($this->message('deleteok'));
        }else{
            return response()->json($this->message('deleteno'));
        }
    }
}
