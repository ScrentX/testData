<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/datatable.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/design.css') }}">
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable.min.js') }}"></script>
    <script src="{{ asset('assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('assets/js/js.js') }}"></script>
</head>
<body>
    <h2>Student Results Table</h2>
    <table id="studentTable" class="display">
        <thead>
            <tr>
                <th>Student ID</th> 
                <th>Name</th>
                <th>Exam ID</th>
                <th>Exam Ref Code</th>
                <th>Total Questions</th>
                <th>Correct Answers</th>
                <th>Incorrect Answers</th>
                <th>Score Percentage</th>
                <th>Status</th>
               
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</body>
</html>
