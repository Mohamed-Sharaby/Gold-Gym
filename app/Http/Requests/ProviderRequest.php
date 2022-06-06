<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderRequest extends FormRequest
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
            'name' => 'required|string|max:100|unique:providers,name',
            'phone' => 'required|numeric|unique:providers,phone',
            'password' => 'required|confirmed|min:6',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
            'photos' => 'sometimes|array',
            'is_active' => 'boolean',
            'is_confirmed' => 'boolean',
            'address' => 'required|string',
            'location' => 'required|in:fixed,moving',
            'category_id' => 'required|exists:categories,id',
            'service_id' => 'required|exists:services,id',
            'expire_at' => 'required|date|after:today',

        ];

        if ($this->method() == 'PUT') {
            $rules = [
                'name' => 'required|string|max:100|unique:providers,name,'. $this->provider->id,
                'phone' => 'required|numeric|unique:providers,phone,' . $this->provider->id,
                'password' => 'nullable|confirmed|min:6',
                'image' => 'sometimes|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
                'photos' => 'sometimes|array',
                'is_active' => 'boolean',
                'is_confirmed' => 'boolean',
                'address' => 'required|string',
                'location' => 'required|in:fixed,moving',
                'category_id' => 'required|exists:categories,id',
                'service_id' => 'required|exists:services,id',
                'expire_at' => 'nullable|date|after:today',
            ];
        }
        return $rules;
    }
}
