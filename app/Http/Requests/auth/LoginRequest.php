<?php

namespace App\Http\Requests\auth;

use App\Http\Requests\BaseRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class LoginRequest extends BaseRequest
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
        if ( $this->method() == 'GET' ){
            return [];
        }elseif( $this->method() == 'POST' ){
            return [
                'username'  =>  'required',
                'password'  =>  'required',
            ];
        }
    }
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json($this->responseValidator($errors) , JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }

}
