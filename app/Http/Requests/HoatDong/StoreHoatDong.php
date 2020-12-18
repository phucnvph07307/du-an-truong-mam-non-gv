<?php

namespace App\Http\Requests\HoatDong;

use Illuminate\Foundation\Http\FormRequest;

class StoreHoatDong extends FormRequest
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
            'file' => 'required|mimes:xls,xlsx,xlm,xla,xlc,xlt,xlw,xlsm,xltx'
        ];
    }

    public function messages(){
        return [
            'file.required' => 'Vui lòng tải lên File Excel',
            'file.mimes' => 'Vui lòng tải lên đúng định dạng File Excel'
        ];
    }
}
