<?php


namespace App\Services\Validation;


use App\Exceptions\CustomValidationException;
use App\Interfaces\Validator;

class ProductExcelValidator implements Validator
{


    /**
     * @param array $data
     * @return mixed|void
     * @throws CustomValidationException
     */
    public function validate(array $data)
    {
        //get rules
        $rules = $this->getRules();
        //get messages
        $messages = $this->getCustomMessages();
        //validate
        $validator = \Validator::make($data, $rules, $messages);
        //if it fails
        if ($validator->fails()) {
            throw (new CustomValidationException($validator));
        }
    }

    /**
     * @return array
     */
    protected function getRules(): array
    {
        return [
            '*.0' => 'required|max:60',
            '*.1' => 'required|max:150|unique:products,name',
            '*.2' => 'required|integer',
            '*.3' => 'required',
            '*.4' => 'required|integer',
            '*.5' => 'required|max:255'
        ];
    }

    /**
     * @return array
     */
    protected function getCustomMessages(): array
    {
        return [];
    }

}
