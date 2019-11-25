<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoggingHoursRequest extends FormRequest
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
           /* 'activity_id' => [ 'required', 'string', 'max:191'],
            'description' => [ 'required', 'string' ],
            'image' => [ 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048', ],
            'start_date' => [ 'required', 'date', ],
            'end_date' => [ 'required', 'date', ],
            'start_time' => [ ],
            'end_time' => [ ],
            'location' => [ 'required', 'string', ],
            'co_host' => [ 'max:191', ],
            'registration_deadline' => [ 'required', 'date', ],
            'volunteer_hours' => [ 'required', 'integer', ],*/
            'activity_id' => [ 'required' ],
            'volunteer_profile_id' => [ 'required' ],
            'volunteer_hours_earned' => [ 'required' ],
            'hours_confirmed' => [ 'required' ],
            'is_complete' => [ 'required' ],
            'created_at' => [ 'required' ],
            'updated_at' => [ 'required' ],
        ];
    }

 
}
