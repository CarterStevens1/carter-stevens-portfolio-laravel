<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Experience extends Model
{
    /** @use HasFactory<\Database\Factories\ExperienceFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'job_title',
        'company',
        'start_date',
        'end_date',
        'description',
        'skills_used',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
