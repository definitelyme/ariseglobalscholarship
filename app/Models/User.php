<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use TCG\Voyager\Models\User as VoyagerUser;

class User extends VoyagerUser
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
        "scholarship"
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
        $program = ScholarshipRun::whereIsActive(true)->first();

        // dd($this->passportPhoto()->get());

        return $this
            ->scholarships()
            ->whereVersion($program->version_id)
            ->with(['documents'])
            ->first();
    }
}
