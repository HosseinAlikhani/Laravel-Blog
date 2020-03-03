<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
}
