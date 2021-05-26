<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScholarshipRun extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'version_id',
        'is_active',
    ];

    public function getRouteKeyName()
    {
        return 'version_id';
    }

    /**
     * Returns true if the current program is closed else false
     *
     * @return bool
     */
    public function isClosed(): bool
    {
        return $this->is_active == 0 || $this->is_active == false;
    }

    public function getCurrentAttribute()
    {
        return $this->is_active;
    }

    /**
     * Get all of the scholarships for this ScholarshipRun
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scholarships(): HasMany
    {
        return $this->hasMany(Scholarship::class, 'version', 'version_id');
    }
}
