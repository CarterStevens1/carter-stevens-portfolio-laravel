<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PastReadings extends Model
{
    /** @use HasFactory<\Database\Factories\PastReadingsFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'blog_url',
        'blog_image',
        'blog_title',
        'blog_description',
        'blog_date',
        'read_date'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    protected $casts = [
        'blog_date' => 'date',
        'read_date' => 'date',
    ];
}
