<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'version',
        'other_names',
        'phone',
        'dob',
        'age',
        'gender',
        'marital_status',
        'address_street',
        'address_country',
        'address_state',
        'address_lga',
        'address_city',
        'origin_country',
        'origin_state',
        'origin_lga',
        'origin_hometown',
        'kin_name',
        'kin_phone',
        'kin_relationship',
        'is_on_scholarship',
        'passport_photograph_url',
        'course_of_study',
        'year_of_admission',
        'course_duration',
        'current_level',
        'year_of_graduation',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'dob' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'version';
    }

    /**
     * Get the user that owns the Scholarship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
