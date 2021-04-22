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
            'otherNames' => 'string|nullable',
            'phone' => 'string|nullable|min:10|max:14',
            'dob' => 'date|nullable',
            'age' => 'numeric|nullable|min:16',
            'gender' => 'string|nullable',
            'maritalStatus' => 'string|nullable',
            'address' => 'string|nullable',
            'country' => 'string|nullable',
            'state' => 'string|nullable',
            'localGovtArea' => 'string|nullable',
            'city' => 'string|nullable',
            'countryOrigin' => 'string|nullable',
            'stateOfOrigin' => 'string|nullable',
            'lgaOfOrigin' => 'string|nullable',
            'hometown' => 'string|nullable',
            'kinName' => 'string|nullable',
            'kinPhone' => 'string|min:10|max:14',
            'kinRelationship' => 'string|nullable',
            'hasBursary' => 'boolean',
            'passport' => 'file|mimes:jpg,jpeg,jfif,pjp,pjpeg,png|max:200',
            'courseOfStudy' => 'string|nullable',
            'yearOfAdmission' => 'string|nullable',
            'courseDuration' => 'string|nullable',
            'currentLevel' => 'string|nullable',
            'expectedYearOfGraduation' => 'string|nullable',
            // 'documents' => 'max:2048|mimes:image,pdf,doc,docx,csv,xlx',
            // 'documents' => 'max:2048',
        ];
    }
}
