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
            'otherNames' => 'bail|sometimes|string|nullable',
            'phone' => 'bail|sometimes|required|string|min:10|max:14',
            'firstName' => 'bail|sometimes|required|string|min:2|required_with:phone',
            'lastName' => 'bail|sometimes|required|string|min:2|required_with:phone',
            'dob' => 'bail|sometimes|required|date|string',
            'age' => 'bail|sometimes|required|numeric|min:16',
            'gender' => 'bail|sometimes|required|string',
            'maritalStatus' => 'bail|sometimes|required|string',
            'address' => 'bail|sometimes|required|string',
            'country' => 'bail|sometimes|required|string',
            'state' => 'bail|sometimes|required|string',
            'localGovtArea' => 'bail|sometimes|required|string',
            'city' => 'bail|sometimes|string|nullable',
            'countryOrigin' => 'bail|sometimes|required|string',
            'stateOfOrigin' => 'bail|sometimes|required|string',
            'lgaOfOrigin' => 'bail|sometimes|required|string',
            'hometown' => 'bail|sometimes|required|string',
            'kinName' => 'bail|sometimes|required|string',
            'kinPhone' => 'bail|sometimes|required|string|min:10|max:14',
            'kinRelationship' => 'bail|sometimes|required|string',
            'hasBursary' => 'bail|sometimes|required|boolean',
            'passport' => 'bail|sometimes|required|file|mimes:jpg,jpeg,jfif,pjp,pjpeg,png|max:200',
            'courseOfStudy' => 'bail|sometimes|required|string',
            'yearOfAdmission' => 'bail|sometimes|required|string',
            'courseDuration' => 'bail|sometimes|required|string',
            'currentLevel' => 'bail|sometimes|required|string',
            'expectedYearOfGraduation' => 'bail|sometimes|required|string',
            'documents.*' => 'bail|sometimes|required|file|mimes:jpg,jpeg,jfif,pjp,pjpeg,png,pdf,doc,docx|max:3072'
        ];
    }
}
