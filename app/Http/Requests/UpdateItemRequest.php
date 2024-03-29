<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
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
            'name'=>'required|unique:items,name,'.$this->route('item')->id,
            'price'=>'required',
            'category_id'=>'required',
            'expired_date'=>'required'
            // 'price'=>'required|unique:items,name,'.$this->route('item')->id,
            // 'category_id'=>'required|unique:items,name,'.$this->route('item')->id,
            // 'expired_date'=>'required|unique:items,name,'.$this->route('item')->id
        ];
    }
}
