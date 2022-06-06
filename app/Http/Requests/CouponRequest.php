<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'name' => 'required|string',
            'code' => 'required|unique:coupons,id',
            'value' => 'required|numeric|min:1',
            'expire_at' => 'required|date|after:today',
        ];

        if ($this->method() == 'PUT') {
            $rules = [
                'name' => 'required|string',
                'code' => 'required|unique:coupons,id,'.$this->coupon->id,
                'value' => 'required|numeric|min:1',
                'expire_at' => 'required|date|after:today',
            ];
        }
        return $rules;
    }
}
