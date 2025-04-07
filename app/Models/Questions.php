<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;

    protected $primaryKey = 'question_id';
    public $timestamps = false;

    protected $fillable = [
        'question_text',
        'option1',
        'option2',
        'option3',
        'option4',
        'correct_answer',
        'subject_id',
    ];

    public function Subjects()
    {
        return $this->belongsTo(Subjects::class, 'subject_id', 'subject_id');
    }

    public function Exams()
    {
        return $this->belongsToMany(Exams::class, 'exam_question', 'question_id', 'exam_id');
    }
}
