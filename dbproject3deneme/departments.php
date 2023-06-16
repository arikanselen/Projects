<!DOCTYPE html>
<html>
<head>
    <title>Departments</title>

    <?php
    include ('dbconnect.php');
    $query = "SELECT * FROM department";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li><a href='instructordetail.php?id=" . $row['ssn'] . "'>" . $row['iname'] . "</a></li>";
        }
        echo "</ul>";
    } else {
        echo "There is no instructor";
    }
    mysqli_close($conn);
    ?>

</head>
<body>
    <h1>Departments</h1>

