<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'layout',
        'status',
        'meta_data',
        'published_at'
    ];

    protected $casts = [
        'meta_data' => 'json',
        'published_at' => 'datetime'
    ];

    public function sections()
    {
        return $this->hasMany(PageSection::class);
    }
}
