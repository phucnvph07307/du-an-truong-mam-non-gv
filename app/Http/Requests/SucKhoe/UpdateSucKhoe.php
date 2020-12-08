<?php

namespace App\Http\Requests\SucKhoe;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSucKhoe extends FormRequest
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
            'can_nang' => 'required|numeric|min:0',
            'chieu_cao' => 'required|numeric|min:0'
        ];
    }
}