<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
            'type'=> 'required|in:image,video',
            'ar_name' => 'required|string|max:255',
            'en_name' => 'required|string|max:255',
            'ar_description' => 'required',
            'en_description' => 'required',
            'image' => 'required_if:type,image|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
            'video_link' => 'required_if:type,video',
            'is_active' => 'boolean',


        ];

        if ($this->method() == 'PUT') {
            $rules = [
                'type'=> 'nullable',
                'ar_name' => 'required|string|max:255',
                'en_name' => 'required|string|max:255',
                'ar_description' => 'required',
                'en_description' => 'required',
                'image' => 'sometimes|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
                'video_link' => 'nullable',
                'is_active' => 'boolean',
            ];
        }
        return $rules;
    }
}
