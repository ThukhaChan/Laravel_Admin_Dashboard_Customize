<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class UpdateItemApiRequest extends FormRequest
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
            'name'=>'required|unique:items,name,'.$this->route('id'),
            'price'=>'required',
            'category_id'=>'required',
            'expired_date'=>'required'
        ];
    }
    protected function failedValidation($validator)
{
    throw new ValidationException($validator, response()->json(['errors' => $validator->errors()], 422));
}
}
