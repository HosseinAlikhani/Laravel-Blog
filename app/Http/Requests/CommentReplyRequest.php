<?php

namespace App\Http\Requests;


class CommentReplyRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() == 'POST'){
            return [
                'comment_reply'    =>  'required',
                'comment_id'    =>  'required',
            ];
        }elseif ($this->method() == 'PATCH'){
            return [
                'comment_reply'    =>  'required',
                'comment_id'    =>  'required',
                'comment_reply_id' =>  'required',
            ];
        }elseif ($this->method() == 'DELETE'){
            return [
                'comment_reply_id' =>  'required',
            ];
        }
        return [
            //
        ];
    }
}
