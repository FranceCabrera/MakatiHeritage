<!DOCTYPE html>
<html lang="en">
<head>
<title>Student Course Lookup</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 15px;
    }
    form {
        max-width: 300px;
    }
    label {
        margin-bottom: 10px;
    }
    input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
    }
</style>
</head>
<body>

<form action="" method="post">
    <label for="studentName">Student Name:</label>
    <input type="text" id="studentName" name="studentName" required>
    <label for="courseCode">Course Code:</label>
    <input type="text" id="courseCode" name="courseCode" required>
    <input type="submit" name="submit">
    <input type="reset" value="Clear">
    <br>
</form>

    <?php
    if(isset($_POST['submit'])){
        $studentName = $_POST['studentName'];
        $courseCode = strtoupper($_POST['courseCode']);
        $studentCourse = "";

        if($courseCode == "BSCS"){
            $studentCourse = "BS Computer Science";
        } elseif($courseCode == "BSIT"){
            $studentCourse = "BS Information Technology";
        } elseif($courseCode == "DNA"){
            $studentCourse = "Diploma in Network Administration";
        } elseif($courseCode == "DAD"){
            $studentCourse = "Diploma in Application Development";
        } else {
            $studentCourse = "Sorry. No equivalent course for that course code";
        }

        echo "Hello, <i>$studentName</i>! Your course is <b>$studentCourse</b>.";
    }
    ?>
</div>


</body>
</html>