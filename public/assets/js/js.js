
$(document).ready(function(){
    var table = $('#studentTable').DataTable({
        ordering: true,
        paging: true,
        searching: true,
        responsive: true
    });

    // AJAX
    // $.ajax({
    //     url: 'api/auth/display/table',
    //     type: 'GET',
    //     success: function(response){
    //         var stud = response.students;

    //         if (response.success){  
    //             console.log(stud);  

    //             table.clear();

    //             for (let i = 0; i < stud.length; i++) {
    //                 table.row.add([
    //                     stud[i].student_id,
    //                     stud[i].name.trim(),
    //                     stud[i].exam_id,
    //                     stud[i].exam_ref_code,
    //                     stud[i].total_questions,
    //                     stud[i].correct_answers,
    //                     stud[i].incorrect_answers,
    //                     stud[i].score_percentage + '%',
    //                     stud[i].status,
                        
    //                 ]);
    //             }
                
    //             table.draw(); 
    //         }
    //     },
    //     error: function(xhr, status, error){
    //         console.error(xhr.responseText);
    //     }
    // });


    // axios.get('api/auth/display/table')
    // .then(function(response){
    //     if(response.data.success) {
    //         var students = response.data.students;
    //         table.clear();

    //         for (let i = 0; i < students.length; i++) {
    //             table.row.add([
    //                 students[i].student_id,
    //                 students[i].name.trim(),
    //                 students[i].exam_id,
    //                 students[i].exam_ref_code,
    //                 students[i].total_questions,
    //                 students[i].correct_answers,
    //                 students[i].incorrect_answers,
    //                 students[i].score_percentage + '%',
    //                 students[i].status
    //             ]);
    //         }
    //         table.draw();
    //     }
    // })
    // .catch(function(error){
    //     console.error(error);
    // });


    fetch('api/auth/display/table')
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            var students = data.students;
            table.clear();
            for (let i = 0; i < students.length; i++) {
                table.row.add([
                    students[i].student_id,
                    students[i].name.trim(),
                    students[i].exam_id,
                    students[i].exam_ref_code,
                    students[i].total_questions,
                    students[i].correct_answers,
                    students[i].incorrect_answers,
                    students[i].score_percentage + '%',
                    students[i].status
                ]);
            }
            table.draw();
        }
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
});