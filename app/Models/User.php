<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use TCG\Voyager\Models\User as VoyagerUser;

class User extends VoyagerUser implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        "first_name",
        "last_name",
        "full_name",
        "scholarship",
        "last_active_scholarship"
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['passportPhoto'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Checks if the user has applied for the scholarship
     * @param \App\Models\ScholarshipRun $program
     *
     * @return bool
     */
    public function hasAppliedForProgram(ScholarshipRun $program): bool
    {
        if ($program == null) return false;

        $scholarship = $this->scholarships()
            ->whereVersion($program->version_id)
            ->first();

        return $scholarship !== null;
    }

    /**
     * Get all of the scholarships for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scholarships(): HasMany
    {
        return $this->hasMany(Scholarship::class);
    }

    /**
     * Get the Passport Photo associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function passportPhoto(): HasOne
    {
        return $this->hasOne(PassportPhoto::class);
    }

    /**
     * Get aa Payments for this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payments(): HasMany
    {
        return $this->hasMany(PaymentReceipt::class);
    }

    /**
     * Get the user's first name.
     *
     * @return string
     */
    public function getFirstNameAttribute()
    {
        return mb_split(" ", $this->name)[0] ?? null;
    }

    /**
     * Get the user's last name.
     *
     * @return string
     */
    public function getLastNameAttribute()
    {
        return mb_split(" ", $this->name)[1] ?? null;
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->name;
    }

    /**
     * Get the active scholarship for the user.
     *
     * @return string
     */
    public function getScholarshipAttribute()
    {
        // Get the current active scholarship
        $program = ScholarshipRun::whereIsActive(true)->first();

        // return the scholarship model
        // that matches the active above
        // Else null meaning user has not applied for that active scholarship
        $var = $program != null ? $this
            ->scholarships()
            ->whereVersion($program->version_id)
            ->first() : null;
        // dd($var);
        return $var;
    }

    public function getLastActiveScholarshipAttribute()
    {
        $scholarship = $this->scholarships()->latest()->first();
        return $scholarship;
    }
}
