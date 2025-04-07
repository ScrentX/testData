<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    use HasFactory;

    protected $primaryKey = 'exam_id';
    public $timestamps = false;

    protected $fillable = [
        'exam_ref_code',
        'exam_time',
        'question_ids',
        'exam_date',
        'subject_id',
        'school_year',
    ];

    public function Subjects()
    {
        return $this->belongsTo(Subjects::class, 'subject_id', 'subject_id');
    }

    public function Questions()
    {
        return $this->belongsToMany(Questions::class, 'exam_question', 'exam_id', 'question_id');
    }

    public function Student_results()
    {
        return $this->hasMany(Student_results::class, 'exam_id', 'exam_id');
    }
}
