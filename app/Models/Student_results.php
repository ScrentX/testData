<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_results extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'exam_id',
        'exam_ref_code',
        'total_questions',
        'correct_answers',
        'incorrect_answers',
        'score_percentage',
        'status',
    ];

    public function Student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    public function Exams()
    {
        return $this->belongsTo(Exams::class, 'exam_id', 'exam_id');
    }
}
