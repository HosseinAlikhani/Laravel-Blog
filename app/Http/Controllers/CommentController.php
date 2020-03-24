<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Model\Comment;

class CommentController extends BaseEntitiy
{
    protected $request;
    public function __construct(CommentRequest $request, Comment $comment)
    {
        $this->request = $request;
        $this->model = $comment;
    }
    public function variable($data)
    {
        return [
            'comment'   =>  $data['comment'],
            'user_id'   =>  1,
        ];
    }
    public function getComments()
    {
        $comments = $this->findAll();
        return $comments;
    }
    public function postComments()
    {
        if ($this->check($this->request->all())){
            return $this->responseMessage(['message' => $this->message('submited')],423);
        }else{
            if ($this->create($this->variable($this->request->all()))){
                return $this->responseMessage(['message' => $this->message('submitok')],200);
            }else{
                return $this->responseMessage(['message' => $this->message('submitno')],423);
            }
        }
    }
    public function patchComments()
    {
        if ($this->check($this->variable($this->request->all()))){
            return $this->responseMessage(['message' => $this->message('updated')],200);
        }else{
            if ($this->update($this->request->comment_id, $this->variable($this->request->all()))){
                return $this->responseMessage(['message' => $this->message('updateok')],200);
            }else{
                return $this->responseMessage(['message' => $this->message('updateno')],423);
            }
        }
    }
    public function deleteComments()
    {
        if ($this->delete($this->request->comment_id)){
            return $this->responseMessage(['message' => $this->message('deleteok')],200);
        }else{
            return $this->responseMessage(['message' => $this->message('deleteno')],423);
        }
    }
}
