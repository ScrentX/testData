<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'student_id',
        'email',
        'first_name',
        'middle_name',
        'last_name',
    ];

    public function Student_answer()
    {
        return $this->hasMany(Student_answer::class, 'student_id', 'student_id');
    }

    public function Student_results()
    {
        return $this->hasMany(Student_results::class, 'student_id', 'student_id');
    }
}
