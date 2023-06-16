<?php
include ('dbconnect.php');
$id = $_GET['issn'];

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
?>
<a href="index.php">Home Page</a>
