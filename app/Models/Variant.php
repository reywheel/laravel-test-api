<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'is_correct',
        'question_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function question() {
        return $this->belongsTo(Question::class);
    }
}
