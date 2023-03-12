<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class application extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'resume',
        'cover_letter'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
