<html>
<body>
<h1>Project Lead  Page </h1>
<?php
include ('dbconnect.php');
$id = $_GET['id'];
$DATA="SELECT * FROM project_has_instructor WHERE leadSsn='$id'";
// Generate the table
echo '<table>';
echo '<thead><tr><th>leadSsn</th><th>Project Name</th><th>issn</th><th>Working Hour</th></tr></thead>';
echo '<tbody>';
foreach ($DATA as $row) {
    echo '<tr>';
    foreach ($row as $cell) {
        echo '<td>' . $cell . '</td>';
    }
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';

?>;
