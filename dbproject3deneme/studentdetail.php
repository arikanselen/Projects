
<h1>Student Detail Page </h1>
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-image: url('https://i.pinimg.com/564x/f9/96/a8/f996a8b256632b8766e8735a6ac435a1.jpg');
            background-size: cover;
        }

        button {
            background-color: #8B4513;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        button:hover {
            background-color: #A0522D;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #8B4513;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        h1, h3 {
            color: #8B4513;
        }

    </style>

<?php
include ('dbconnect.php');
$id = $_GET['id'];
$query = "SELECT * FROM student WHERE ssn ='$id'";
$result = mysqli_query($conn ,$query);
$student = mysqli_fetch_assoc($result);
$sName = $student['studentname'];
$dName= $student['dName'];
$gradorUgrad= $student['gradorUgrad'];

if ($gradorUgrad){
    echo "<h3> Student is graduated!";
 $query_2= "SELECT gs.supervisorSsn, i.iname FROM gradstudent gs JOIN instructor i ON i.ssn=gs.supervisorSsn Where gs.ssn='$id' ";
 $result_2= mysqli_query($conn,$query_2);
 $student_2=mysqli_fetch_assoc($result_2);
 $aName=$student_2['iname'];
 echo "<h3> Name of the supervisor is $aName";}

else{
    $query_3="SELECT s.advisorSsn, i.iname FROM student s JOIN instructor i ON i.ssn=s.advisorSsn Where s.ssn='$id'";
    $result_3=mysqli_query($conn,$query_3);
    $student_3=mysqli_fetch_assoc($result_3);
    $aSsn= $student_3['advisorSsn'];
    $asName= $student_3['iname'];
    echo "<h3> Name of the advisor: $asName.$aSsn";
}

echo "<h3> Name of the student: $sName";
echo "<h3> Department: $dName";

echo "<h3>List of Courses for Students:</h3>";

$query = "SELECT cs.studentname, cc.courseCode, cc.courseName, cs.currCode
          FROM Student cs
          INNER JOIN curriculacourses ccs ON cs.currCode = ccs.currCode
          INNER JOIN Course cc ON ccs.courseCode= cc.courseCode AND ssn='$id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Student Name</th><th>Course Code</th><th>Course Name</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['studentname'] . "</td>";
        echo "<td>" . $row['currCode'] . "</td>";
        echo "<td>" . $row['courseName'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No courses found.";
}
echo "<h3>List of Courses Taken by Student:</h3>";

$query = "SELECT s.studentname, c.courseCode, c.courseName
          FROM Student s
          INNER JOIN Enrollment e ON s.studentid = e.sssn
          INNER JOIN Course c ON e.courseCode = c.courseCode";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Student Name</th><th>Course Code</th><th>Course Name</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['studentname'] . "</td>";
        echo "<td>" . $row['courseCode'] . "</td>";
        echo "<td>" . $row['courseName'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No courses taken by the student.";
}

echo "<h3>Grade Report of Student:</h3>";

$query = "SELECT s.studentname, c.courseCode, c.courseName, e.grade
          FROM Student s
          INNER JOIN Enrollment e ON s.studentid = e.sssn
          INNER JOIN Course c ON e.courseCode = c.courseCode";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Student Name</th><th>Course Code</th><th>Course Name</th><th>Grade</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['studentname'] . "</td>";
        echo "<td>" . $row['courseCode'] . "</td>";
        echo "<td>" . $row['courseName'] . "</td>";
        echo "<td>" . $row['grade'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No grade report available for the student.";
}
echo "<h3>Weekly Schedule of Student:</h3>";

$query = "SELECT s.studentname, s.studentid, ws.dayy, ws.courseCode, ws.buildingName, ws.roomNumber, ws.hourr, e.courseCode, e.sssn
FROM Student s
INNER JOIN enrollment e ON e.sssn = s.studentid
INNER JOIN weeklyschedule ws ON e.courseCode = ws.courseCode";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Student Name</th><th>Day</th><th>Course Code</th><th>Building</th><th>Room</th><th>Hour</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['studentName'] . "</td>";
        echo "<td>" . $row['dayy'] . "</td>";
        echo "<td>" . $row['courseCode'] . "</td>";
        echo "<td>" . $row['buildingName'] . "</td>";
        echo "<td>" . $row['roomNumber'] . "</td>";
        echo "<td>" . $row['hourr'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No weekly schedule available for the student.";
}
echo "<h3>List of Projects and Supervisor:</h3>";


$query = "SELECT  s.studentname, p.pName, p.leadSsn
          FROM Student s
          INNER JOIN Project p ON s.advisorSsn = p.leadSsn
          WHERE s.gradorUgrad=1 AND s.ssn='$id'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Student Name</th><th>Project Name</th><th>Supervisor</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['studentname'] . "</td>";
        echo "<td>" . $row['pName'] . "</td>";
        echo "<td>" . $row['leadSsn'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No projects found for the graduate student.";
}










?>


    <a href="index.php"><button>Home Page</button></a>