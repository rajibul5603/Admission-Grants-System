<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Gate;

class StoreApplicationInfoRequest extends FormRequest
{
    /**
     * 
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return true;
        return Gate::allows('application_tracking_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id_no' => [
                'string',
                'max:100',
                'required',
            ],
            'grants_name_id' => [
                'integer',
                'required',
                'max:2',
            ],
            'circular_id' => [
                'required',
                'integer',
            ],
            'brid' => [
                'string',
                'min:17',
                'max:17',
                'required',
                'unique:general_infos',
            ],
            'nid' => [
                'string',
                'min:10',
                'max:17',
                'nullable',
            ],
            'stu_name' => [
                'string',
                'required',
            ],
            'father_name' => [
                'string',
                'min:1',
                'max:50',
                'required',
            ],
            'father_nid' => [
                'nullable',
                'string',
                'min:10',
                'max:17',
            ],
            'mother_name' => [
                'string',
                'min:1',
                'max:100',
                'required',
            ],
            'mother_nid' => [
                'nullable',
                'string',
                'min:10',
                'max:17',
            ],
            'dob' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'age' => [
                'required',
                'integer',
                'min:5',
                'max:25',
            ],
            'division_id' => [
                'required',
                'numeric',
            ],
            'district_id' => [
                'required',
                'numeric',
            ],
            'upazila_id' => [
                'required',
                'numeric',
            ],
            'union_id' => [
                'required',
                'numeric',
            ],
            'village_id' => [
                'string',

                'required',
            ],
            'eiin_id' => [
                'integer',
                'required',
            ],
            'grants_name_id' => [
                'integer',
                'required',
            ],
            'academic_year' => [
                'integer',
                'required',
            ],
            'circular_id' => [
                'integer',
                'required',
            ],

        ];
    }
}
