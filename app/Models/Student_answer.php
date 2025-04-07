<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'question_id',
        'selected_answer',
        'exam_id',
        'exam_ref_code',
    ];

    public function Student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    public function Questions()
    {
        return $this->belongsTo(Questions::class, 'question_id', 'question_id');
    }

    public function Exams()
    {
        return $this->belongsTo(Exams::class, 'exam_id', 'exam_id');
    }
}
