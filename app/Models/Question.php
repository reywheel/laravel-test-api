<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function test() {
        return $this->belongsTo(Test::class);
    }

    public function type() {
        return $this->belongsTo(QuestionType::class);
    }

    public function variants() {
        return $this->hasMany(Variant::class);
    }

    public function results() {
        return $this->hasMany(Result::class);
    }
}
