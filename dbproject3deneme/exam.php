<?php
include('dbconnect.php');
$year = $_GET['yearr'];
echo "<h3> List of grades :". "<br>";
$query = "SELECT sssn, qno, pointsEarned FROM gradesperquestion WHERE yearr = '$year'";
$result = mysqli_query($conn, $query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "SSSN: " . $row["sssn"] . "<br>";
        echo "qNo: " . $row["qno"] . "<br><br>";
        echo "Points Earned: " . $row["pointsEarned"] . "<br><br>";
    }
} else {
    echo "There is no exam";
}
?>