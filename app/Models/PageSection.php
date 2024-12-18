<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'type',
        'content',
        'settings',
        'order'
    ];

    protected $casts = [
        'content' => 'json',
        'settings' => 'json'
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
