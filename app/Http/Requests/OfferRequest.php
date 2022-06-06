<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'discount' => 'required|numeric|min:1|max:99',
            'start_date' => 'required|date|after:yesterday',
            'end_date' => 'required|date|after:start_date',
            'services' => 'required|array',
            'ar_name' => 'required',
            'en_name' => 'required',
            'image' => 'required',
        ];

        if ($this->method() == 'PUT') {
            $rules = [
                'ar_name' => 'required',
                'en_name' => 'required',
                'discount' => 'required|numeric|min:1|max:99',
                'start_date' => 'required|date|after:yesterday',
                'end_date' => 'required|date|after:start_date',
                'services' => 'required|array',
                'name' => 'nullable',
                'image' => 'nullable',
            ];
        }
        return $rules;
    }
}
