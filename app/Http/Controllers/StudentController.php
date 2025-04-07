<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use App\Models\Student;


class StudentController extends Controller
{
    
   // LEVEL 1


//     public function madali()
//     {
//         $easy = DB::select('
//             SELECT students.*, 
//                    exams.exam_ref_code, exams.exam_date, 
//                    student_results.score_percentage AS score, student_results.status AS passed, 
//                    questions.question_text, questions.correct_answer 
//             FROM students
//             INNER JOIN student_results ON students.student_id = student_results.student_id
//             INNER JOIN exams ON student_results.exam_id = exams.exam_id
//             INNER JOIN subjects ON exams.subject_id = subjects.subject_id
//             INNER JOIN questions ON subjects.subject_id = questions.subject_id
//         ');

//         return response()->json(['success' => true, 'easy' => $easy], 200);
//     }



//     //LEVEL 2


//     public function medjo()
//     {
//         $moderate = DB::table('students AS s')
//             ->select('s.*', 'sr.score_percentage AS score', 'sr.status AS passed', 'e.exam_ref_code', 'e.exam_date')
//             ->join('student_results AS sr', 's.student_id', '=', 'sr.student_id')
//             ->join('exams AS e', 'sr.exam_id', '=', 'e.exam_id')
//             ->get();

//         return response()->json(['success' => true, 'moderate' => $moderate], 200);
    
//     }

//    //LEVEL 3

//    public function mahirap()
//    {
//        $challenging = Student::with(['Student_results.Exams.Subjects.Questions'])->get();
   
//        return response()->json(['success' => true, 'challenging' => $challenging], 200);
//    }


//  //  LEVEL 4
//    public function pinakamahirap()
//    {
//        $difficult = Student::with(['Student_results' => function ($q) {
//            $q->select('*');          
//        }])->with(['Student_results.Exams' => function ($q) {
//            $q->select('*');
//        }])->with(['Student_results.Exams.Subjects' => function ($q) {
//            $q->select('*');
//        }])->with(['Student_results.Exams.Subjects.Questions' => function ($q) {
//            $q->select('*');
//        }])->get();
   
//        return response()->json(['success' => true, 'difficult' => $difficult], 200);


//    }

public function fronteEndDisplay(){
    return view('table');
}


public function DisplaydataUsingJs()
{
    $students = DB::table('student_results AS sr')
        ->join('students AS s', 's.student_id', '=', 'sr.student_id')
        ->select(
            'sr.student_id',
            'sr.exam_id',
            'sr.exam_ref_code',
            'sr.total_questions',
            'sr.correct_answers',
            'sr.incorrect_answers',
            'sr.score_percentage',
            'sr.status',
            DB::raw('CONCAT(s.first_name, " ", IFNULL(s.middle_name, ""), " ", s.last_name) AS name')
        )
        ->get();
    return response()->json(["success" => true, "students" => $students]);
}

}