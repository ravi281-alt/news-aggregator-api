<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news_requests extends Model
{
    use HasFactory;

    protected $fillable = ['source_id', 'request', 'response', 'status'];

    protected $casts = [
        'request' => 'array',
        'response' => 'array',
    ];

    public function source()
    {
        return $this->belongsTo(Source::class);
    }
}
