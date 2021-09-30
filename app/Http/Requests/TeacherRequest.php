<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'id' => 'required|unique:teachers',
            'position_id' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'sex' => 'required',
            'birth_date' => 'required'
               
        ];
    }
}
