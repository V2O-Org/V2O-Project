<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstructionCreateRequest extends FormRequest
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
            'activity_name' => 'required|regex:^[a-zA-Z\s]+$^',
            'required_item' => 'required|regex:^[a-zA-Z\s]+$^',
            'meeting_point' => 'required|regex:^[a-zA-Z\s]+$^',
            'date' => '',
            'time' => 'required|regex:^[0-9]{2}:[0-9]{2}^',
            'attire' => 'required|regex:^[a-zA-Z\s]+$^',
            'document' => 'required|regex:^[a-zA-Z\s]+$^',
        ];
    }
}
