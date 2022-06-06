<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:100|unique:users,name',
            'phone' => 'required|phone:sa,eg|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
            'is_active' => 'boolean',

        ];

        if ($this->method() == 'PUT') {
            $rules = [
                'name' => 'required|string|max:100|unique:users,name,'. $this->user->id,
                'phone' => 'required|phone:sa,eg|unique:users,phone,' . $this->user->id,
                'email' => 'required|email|unique:users,email,' . $this->user->id,
                'password' => 'nullable|confirmed|min:8',
                'image' => 'sometimes|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
                'is_active' => 'boolean',
            ];
        }
        return $rules;
    }
}
