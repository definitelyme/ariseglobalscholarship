<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Scholarship extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'other_names',
        'phone',
        'dob',
        'age',
        'gender',
        'status',
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
        'declined',
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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['run', 'documents'];

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
     * Get the Scholarship Payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payments(): HasMany
    {
        return $this->hasMany(PaymentReceipt::class);
    }

    /**
     * Get the Scholarship Run associated with the Scholarship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function run(): HasOne
    {
        return $this->hasOne(ScholarshipRun::class, 'version_id', 'version');
    }

    /**
     * Get all of the documents for the Scholarship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents(): HasMany
    {
        return $this->hasMany(FileDocument::class);
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
