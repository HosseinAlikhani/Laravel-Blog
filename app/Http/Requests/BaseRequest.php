<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class BaseRequest extends FormRequest
{
    public function responseValidator($data)
    {
        $field = key( $data );
        return [
            'field' =>  $field,
            'message'   =>  $data[$field][0],
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json($this->responseValidator($errors) , JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }

}
