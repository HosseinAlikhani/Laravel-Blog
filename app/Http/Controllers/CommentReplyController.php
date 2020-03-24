<?php

namespace App\Http\Controllers;


use App\Http\Requests\CommentReplyRequest;
use App\Model\CommentReply;

class CommentReplyController extends BaseEntitiy
{
    protected $request;
    public function __construct(CommentReplyRequest $request, CommentReply $commentreply)
    {
        $this->model = $commentreply;
        $this->request = $request;
    }
    public function variable($data)
    {
        return [
            'comment_reply'   =>  $data['comment_reply'],
            'comment_id'    =>  $data['comment_id'],
            'user_id'   =>  1,
        ];
    }
    public function getCommentReplies()
    {
        $comment_reply = $this->findAll();
        return $comment_reply;
    }
    public function getCommentReply(CommentReply $comment)
    {
        return $comment;
    }
    public function postCommentReplies()
    {
        $this->variable($this->check($this->request->all()));
        if ($this->check($this->variable($this->request->all()))){
            return $this->responseMessage(['message' => $this->message('submited')],423);
        }else{
            if ($this->create($this->variable($this->request->all()))){
                return $this->responseMessage(['message' => $this->message('submitok')],200);
            }else{
                return $this->responseMessage(['message' => $this->message('submitno')],423);
            }
        }
    }
    public function patchCommentReplies()
    {
        if ($this->check($this->variable($this->request->all()))){
            return $this->responseMessage(['message' => $this->message('submited')],423);
        }else{
            if ($this->update($this->request->reply_comment_id, $this->variable($this->request->all()))){
                return $this->responseMessage(['message' => $this->message('submitok')],200);
            }else{
                return $this->responseMessage(['message' => $this->message('submitno')],423);
            }
        }
    }
    public function deleteCommentReplies()
    {
        if ($this->delete($this->request->reply_comment_id)){
            return $this->responseMessage(['message' => $this->message('deleteok')],200);
        }else{
            return $this->responseMessage(['message' => $this->message('deleteno')],423);
        }
    }
}
