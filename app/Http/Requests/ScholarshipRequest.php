<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScholarshipRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Means an Admin cannot register for a scholarship
        return !$this->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'otherNames' => 'string',
            'phone' => 'string|required|min:10|max:14',
            'dob' => 'date',
            'age' => 'numeric|required|min:16',
            'gender' => 'string|required',
            'maritalStatus' => 'string|required',
            'address' => 'string|required',
            'country' => 'string|required',
            'state' => 'string|required',
            'localGovtArea' => 'string|required',
            'city' => 'string|required',
            'countryOrigin' => 'string|required',
            'stateOfOrigin' => 'string|required',
            'lgaOfOrigin' => 'string|required_if:stateOfOrigin,!=,null',
            'hometown' => 'string|required_if:lgaOfOrigin,!=,null',
            'kinName' => 'string|required',
            'kinPhone' => 'string|required_if:kinName,!=,null|min:10|max:14',
            'kinRelationship' => 'string|required_if:kinName,!=,null',
            'hasBursary' => 'boolean|required',
            'passport_photograph_url' => 'max:2048|mimes:image',
            'courseOfStudy' => 'string|required',
            'yearOfAdmission' => 'string|required',
            'courseDuration' => 'string|required',
            'currentLevel' => 'string|required',
            'expectedYearOfGraduation' => 'string|required',
            // 'documents' => 'max:2048|mimes:image,pdf,doc,docx,csv,xlx',
            // 'documents' => 'max:2048',
        ];
    }
}
