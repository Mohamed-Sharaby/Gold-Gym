<?php

namespace App\Http\Requests;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'day' => 'required|date|after:yesterday',
            'from' => 'required',
            'to' => 'required|after:from',
            'day_status' => 'required|in:work,holiday',
        ];

        if ($this->method() == 'PUT') {
            $rules = [
                'day' => 'required|date',
                'from' => 'required',
                'to' => 'required|after:from',
                'day_status' => 'required|in:work,holiday',
            ];
            $appointment = Appointment::withoutGlobalScope('expire')->whereId($this->appointment)->first();
            if ($appointment->day != Carbon::parse(request('day'))){
                $rules['day'] = 'after:yesterday';
            }

        }
        return $rules;
    }
}
