<?php


namespace App\Interfaces;


use App\Exceptions\CustomValidationException;

interface Validator
{
    /**
     * @param array $data
     * @return mixed|void
     * @throws CustomValidationException
     */
    public function validate(array $data);
}
