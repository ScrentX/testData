<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = 'subjects';
    protected $primaryKey = 'subject_id';
    protected $fillable = ['subject_name'];

    public function Questions()
    {
        return $this->hasMany(Questions::class, 'subject_id', 'subject_id');
    }
}
