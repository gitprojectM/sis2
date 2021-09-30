<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'id' => 'required|unique:students|max:12|min:12',
            'fname' => 'required',
            'lname' => 'required',
            'sex' => 'required',
            'birth_date' => 'required',
           'status' => 'required',
           // 'etnic_group' => 'required',
           // 'religion' => 'required',
           // 'street' => 'required',
          //  'barangay' => 'required',
            'municipality' => 'required',
            'province' => 'required',
           // 'mothers_tongue' => 'required',  
           // 'dialect' => 'required', 
           // 'schoolid' => 'required',  
            //'grade_level' => 'required',
          //  'school_name' => 'required',
           // 'adviser_name' => 'required',  
           // 'father_fname' => 'required',
          //  'father_lname' => 'required',
           // 'father_mname' => 'required',
          //  'mother_fname' => 'required',
           // 'mother_lname' => 'required',
            //'mother_mname' => 'required',
           // 'guardianfname' => 'required',
          //  'guardianlname' => 'required',
           // 'guardianmname' => 'required',
           // 'pcontact' => 'required',
           
        ];
    }
}
