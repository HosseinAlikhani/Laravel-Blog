<?php

namespace App\Http\Requests;


class CommentRequest extends BaseRequest
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
                'comment'   =>  'required',
            ];
        }elseif ($this->method() == 'PATCH'){
            return [
                'comment'   =>  'required',
                'comment_id'    =>  'required',
            ];
        }elseif ($this->method() == 'DELETE'){
            return [
                'comment_id'    =>  'required',
            ];
        }
        return [
            //
        ];
    }
}
