<?php

namespace App\Exceptions;

use App\Serializers\Response\JsonResponseSerializer;
use Exception;
use Illuminate\Contracts\Validation\Validator;

class CustomValidationException extends Exception
{
    protected $validator;

    protected $code = 422;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function render()
    {
        $jsonResponseSerializer = new JsonResponseSerializer();
        // return a json with desired format
        return response()->json($jsonResponseSerializer->serialize([
            'error' => true,
            'message' => $this->validator->errors()->first(),
            'data' => []
        ]), $this->code);
    }
}
