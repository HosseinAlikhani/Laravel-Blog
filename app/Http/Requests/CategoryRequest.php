<?php

namespace App\Http\Requests;


class CategoryRequest extends BaseRequest
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
                'name'  =>  'required',
            ];
        }elseif ($this->method() == 'PATCH'){
            return [
                'name'  =>  'required',
                'category_id'   =>  'required',
            ];
        }elseif ($this->method() == 'DELETE'){
            return [
                'category_id'   =>  'required',
            ];
        }
        return [
            //
        ];
    }
}
