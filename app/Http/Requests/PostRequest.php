<?php

namespace App\Http\Requests;


class PostRequest extends BaseRequest
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
                'title'    =>  'required',
                'long_description'  =>  'required',
                'pic'   =>  'required',
            ];
        }elseif ($this->method() == 'DELETE'){
            return [
                'post_id',
            ];
        }
        return [
            //
        ];
    }
}
