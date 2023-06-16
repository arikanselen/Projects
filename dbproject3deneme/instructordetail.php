<html>
<body>

<h1>Instructor Detail Page </h1>
<?php
include 'dbconnect.php';
$id = $_GET['id'];
$query = "SELECT * FROM instructor WHERE ssn ='$id'";
$result = mysqli_query($conn, $query);
$inst = mysqli_fetch_assoc($result);
$iname = $inst['iname'];
$rName= $inst['rankk'];
$dName =$inst['dName'];
$baseSal =$inst['baseSal'];
echo "<h3>"."<BR>". "$iname"."<BR><BR>";
echo "<h3>"."<BR>"." $rName"."<BR><BR>";
echo "<h3> Department Name:"."<BR>"."$dName"."<BR><BR>";
echo "<h3> Base Salary :"."<BR>"."$baseSal"."<BR><BR>";

$query_2="SELECT studentname FROM student WHERE advisorSsn= '$id'";
$result_2=mysqli_query($conn,$query_2);
$ints_2=mysqli_fetch_assoc($result_2);
$sname=$ints_2['studentname'];
echo "<h3> Name of the students you advise "."<BR>"."$sname"."<BR><BR>";

$query_3="SELECT studentname FROM student WHERE gradorUgrad=1 AND advisorSsn='$id'";
$result_3=mysqli_query($conn,$query_3);
$ints_3=mysqli_fetch_assoc($result_3);
$saName=$ints_3['studentname'];
echo "<h3> Name of the students you supervise:"."<BR>"." $saName"."<BR><BR>";

echo "<h3>Weekly schedule:</h3>";

$days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

echo "<table>";
echo "<tr><th>Day</th><th>Course Code</th><th>Building Name</th><th>Room Number</th><th>Hour</th></tr>";

foreach ($days as $day) {
    $query = "SELECT DISTINCT * FROM weeklyschedule WHERE dayy = '$day' AND issn = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows > 0) {
        echo "<tr><td rowspan='" . $result->num_rows . "'>$day</td>";

        $firstRow = true;
        while ($row = $result->fetch_assoc()) {
            if ($firstRow) {
                echo "<td>" . $row['courseCode'] . "</td>";
                echo "<td>" . $row['buildingName'] . "</td>";
                echo "<td>" . $row['roomNumber'] . "</td>";
                echo "<td>" . $row['hourr'] . "</td>";
                $firstRow = false;
            } else {
                echo "<tr><td>" . $row['courseCode'] . "</td>";
                echo "<td>" . $row['buildingName'] . "</td>";
                echo "<td>" . $row['roomNumber'] . "</td>";
                echo "<td>" . $row['hourr'] . "</td>";
            }
            echo "</tr>";
        }
    } else {
        echo "<tr><td>$day</td><td colspan='4'>-</td></tr>";
    }
}
echo "<h3>Free days:</h3>";
$days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
foreach ($days as $day){
    $query="SELECT DISTINCT *FROM weeklyschedule WHERE dayy='$day'AND issn='$id'";
    $result=mysqli_query($conn,$query);
    if ($result->num_rows==0){
        echo $day ."<br>";
    }
}


echo"</table>"."<BR><BR>";

echo "<h3>List of Courses Taught by Instructor:</h3>";

$query_10 = "SELECT courseCode FROM enrollment WHERE issn='$id' ";

$result_10 = mysqli_query($conn, $query);

if (mysqli_num_rows($result_10) > 0) {
    echo "<table>";
    echo "<tr><th>Instructor Name</th><th>Course Code</th><th>Course Name</th></tr>";
    while ($row = mysqli_fetch_assoc($result_10)) {
        echo "<tr>";
        echo "<td>" . $row['iname'] . "</td>";
        echo "<td>" . $row['courseCode'] . "</td>";
        echo "<td>" . $row['courseName'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No courses taught by instructors found.";
}


$query_4="SELECT pName FROM project_has_instructor WHERE leadSsn='$id'";
$result_4=mysqli_query($conn,$query_4);
echo "<h3> Name of the projects $iname lead: "."<BR>";
if (mysqli_num_rows($result_4) > 0) {
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result_4)) {
        echo "<li><a href='leadProject.php?id=" ."'>" . $row['pName'] ."</a></li>";
    }
    echo "</ul>";
} else {
    echo "There is no exam";
}

echo "<h3> List of projects $iname's working:"."<BR>";
$query_7="SELECT pName FROM project_has_instructor WHERE issn='$id'";
$result_7=mysqli_query($conn,$query_7);
if (mysqli_num_rows($result_7) > 0) {
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result_7)) {
        echo "<li><a href='leadProject.php?id=" ."'>" . $row['pName'] ."</a></li>";
    }
    echo "</ul>";
} else {
    echo " There is no project $iname is working with... ";
}

echo "<h3> List of exams $iname's:";
$query_5="SELECT DISTINCT examname FROM questionofexam WHERE issn='$id'";
$result_5=mysqli_query($conn,$query_5);
if (mysqli_num_rows($result_5) > 0) {
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result_5)) {
        echo "<li><a href='exam.php?id=" .  "'>" . $row['examname'] . "</a></li>";

    }
    echo "</ul>";
} else {
    echo "There is no exam";
}
echo "<h3> List of the past exams $iname delivered:";
$query_6="SELECT *  FROM examofsection WHERE issn='$id'";
$result_6=mysqli_query($conn,$query_6);
if (mysqli_num_rows($result_6) > 0) {
    echo "<ul>";
    echo "Exam name "."    ". " semester";
    while ($row = mysqli_fetch_assoc($result_6)) {
        echo "<li><a href='exam.php?id=" ."'>" . $row['examname'] .'      '. $row['date'] ."</a></li>";

    }
    echo "</ul>";
} else {
    echo "There is no exam";
}
echo "<h3> List of $iname's student:". "<br>";
$query_8="SELECT DISTINCT cc.courseCode, cs.studentname
          FROM course cc
          INNER JOIN examofsection eos ON cc.courseCode = eos.courseCode
          INNER JOIN curriculacourses ccs ON cc.courseCode = ccs.courseCode
          INNER JOIN student cs ON cs.studentid = cs.studentid
          WHERE eos.issn = (SELECT issn FROM Instructor WHERE ssn = '$id')";
$result_8=mysqli_query($conn,$query_8);
if ($result_8->num_rows > 0) {
    while ($row = $result_8->fetch_assoc()) {
        echo "Course Code: " . $row["courseCode"] . "<br>";
        echo "Student Name: " . $row["studentname"] . "<br><br>";

        echo "</ul>";
    }
} else {
    echo "There is no student";
}
mysqli_close($conn);

?>
<a href="index.php">Home Page</a>
