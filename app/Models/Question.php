<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'subject_id',
        'question_text',
        'question_image',
        'display_count',
        'correct_count',
        'wrong_count'
    ];

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function options() {
        return $this->hasMany(Option::class);
    }
} 