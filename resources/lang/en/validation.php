<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'firstName' => [
            'required' => 'Please provide your first name.',
            'min' => 'First name must be more than :min characters.',
            'string' => 'First name must be a word'
        ],
        'lastName' => [
            'required' => 'Please provide your last name.',
            'min' => 'Last name must be more than :min characters.',
            'string' => 'Last name must be a word'
        ],
        'otherNames' => [
            'string' => 'Other names contains invalid characters.'
        ],
        'phone' => [
            'required' => 'Please provide your phone number.',
            'min' => 'Phone number can not be less than :min digits',
            'max' => 'Phone number can not be more than :max digits.',
            'string' => 'Invalid Phone number!'
        ],
        'age' => [
            'required' => 'Please select your age.',
            'numeric' => 'Age must be a number from 16 - 45',
            'min' => 'You must at least :minyears to apply for this scholarship.'
        ],
        'gender' => [
            'required' => 'Gender is required!',
            'string' => 'Gender can be only Male or Female.'
        ],
        'maritalStatus' => [
            'required' => 'Marital Status is required!',
            'string' => 'Marital Status is invalid.'
        ],
        'address' => [
            'required' => 'Please provide your Home address.',
            'string' => 'Address contains invalid characters.'
        ],
        'country' => [
            'required' => 'The country field id required!',
            'string' => 'Country contains invalid characters.'
        ],
        'state' => [
            'required' => 'Please select your State.',
            'string' => 'State contains invalid characters.'
        ],
        'localGovtArea' => [
            'required' => 'Please select Local Govt. Area',
            'string' => 'L.G.A contains invalid characters.'
        ],
        'city' => [
            'string' => 'City contains invalid characters.'
        ],
        'countryOrigin' => [
            'required' => 'Country field is required!',
            'string' => 'Country of Origin contains invalid characters.'
        ],
        'stateOfOrigin' => [
            'required' => 'State of origin is required!',
            'string' => 'State of Origin contains invalid characters.'
        ],
        'lgaOfOrigin' => [
            'required' => 'L.G.A of origin is required!',
            'string' => 'L.G.A of Origin contains invalid characters.'
        ],
        'hometown' => [
            'required' => 'Please specify your hometown',
            'string' => 'Hometown contains invalid characters.'
        ],
        'kinName' => [
            'required' => 'Please provide your Kin\'s name.',
            'string' => 'Kin name is invalid.'
        ],
        'kinPhone' => [
            'required' => 'Kindly provide your kin\'s phone number.',
            'min' => 'Kin\'s phone number can not be less than :min digits.',
            'max' => 'Kin\'s phone number can not be more than :max digits.',
            'string' => 'Invalid kin phone number!'
        ],
        'hasBursary' => [
            'required' => 'Are you on an existing scholarship / bursary?',
            // 'accepted' => 'Are you on a Bursary? True or False.'
        ],
        'passport' => [
            'required' => 'Please upload a recent passport photograph.',
            'file' => 'Uploaded Passport must be an Image',
            'mimes' => 'Photo must either be .jpg or .jpeg format',
            'max' => 'Photo must be less than :maxkb in size.',
        ],
        'kinRelationship'  => [
            'required' => 'Kin relationship is required!',
            'string' => 'Kin Relationship is invalid.'
        ],
        'courseOfStudy'  => [
            'required' => 'Course of study field is required!',
            'string' => 'Course of Study is invalid.'
        ],
        'yearOfAdmission'  => [
            'required' => 'Please select your Year of admission!',
            'string' => 'Year of Admission is invalid.'
        ],
        'courseDuration'  => [
            'required' => 'Please select the Course Duration.',
            'string' => 'Course Duration is invalid.'
        ],
        'currentLevel'  => [
            'required' => 'Please select your current level.',
            'string' => 'Current Level is invalid.'
        ],
        'documents.*' => [
            'required' => 'You must upload at lease one document from the List.',
            'file' => 'Uploaded Document must be a valid file.',
            'mimes' => 'Accepted document formats are: .jpg, .jpeg, .png, .pdf, .doc, .docx',
            'max' => 'Documents can not be more than :maxkb in size.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
