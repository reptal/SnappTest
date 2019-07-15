<?php

namespace App\Http\Requests\Admin;

use App\Exceptions\CustomValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductsWithExcelRequest extends FormRequest
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
        return [
            //
            'excel' => 'required|mimes:xls,xlsx'
        ];
    }

    protected function failedValidation(Validator $validator)
    {

        throw (new CustomValidationException($validator));
    }
}
