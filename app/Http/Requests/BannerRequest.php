<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
        $rules = [
            'ar_title' => 'required|string|max:255',
            'en_title' => 'required|string|max:255',
            'ar_body' => 'required|string',
            'en_body' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
        ];

        if ($this->method() == 'PUT') {
            $rules = [
                'ar_title' => 'required|string|max:255',
                'en_title' => 'required|string|max:255',
                'ar_body' => 'required|string',
                'en_body' => 'required|string',
                'image' => 'sometimes|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
            ];
        }
        return $rules;
    }
}
