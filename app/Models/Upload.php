<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Upload extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'description',
        'uploadable_id',
        'uploadable_type',
    ];

    /**
     * Get the parent uploadable model (passport or document).
     */
    public function uploadable()
    {
        return $this->morphTo();
    }
}
