<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
</head>
<body>
    <h2>Students</h2>
    <style>
        body {
            position: absolute;
            width: 4554px;
            height: 4191px;
            left: 0px;
            top: 0px;
            background-image: url(resim.jpg);
            background-size: cover;
            position: absolute;
            width: 1181px;
            height: 730px;
            left: 659px;


            font-family: 'Kosugi';
            font-style: normal;
            font-weight: 400;
            font-size: 200px;
            line-height: 200px;
            text-transform: capitalize;

            color: #000000;


        }


        h2 {
            text-align: center;
            margin-bottom: 30px;
            text-transform: uppercase;
            font-size: 36px;
            color: #333;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        .right-div {
            position: absolute;
            width: 495px;
            height: 1117px;
            left: 0px;
            top: 0px;
            z-index: -1; /* Set the z-index to a negative value */

            background: rgba(217, 217, 217, 0.6);
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(2px);
        }
        .left-div {
            position: absolute;
            width: 1181px;
            height: 600px;
            left: 659px;
            top: 468px;

            font-family: 'Kosugi';
            font-style: normal;
            font-weight: 400;
            font-size: 200px;
            line-height: 200px;
            text-transform: capitalize;

            color: #000000;

        }
        .link-button {
            position: absolute;
            width: 347px;
            height: 129px;
            left: 59px;
            top: 903px;
            background: #D9D9D9;
            box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25);
        }

        h3 {
            position: absolute;
            width: 290px;
            height: 84px;
            left: 43px;
            top: 68px;

            font-family: 'Kosugi';
            font-style: normal;
            font-weight: 400;
            font-size: 48px;
            line-height: 48px;
            text-transform: capitalize;

            color: #FFFFFF;
        }

        ul {
            position: absolute;
            width: 352px;
            height: 456px;
            left: 54px;
            top: 220px;

            font-family: 'Kosugi';
            font-style: normal;
            font-weight: 400;
            font-size: 24px;
            line-height: 24px;
            text-decoration-line: underline;
            text-transform: capitalize;

            color: #000000;
        }

        li {
            margin-bottom: 5px;
        }

        a {
            color: #483430;
            text-decoration: none;
            transition: color 0.3s ease;
            display: inline-block;
            padding: 5px;
            border-radius: 5px;
        }

        a:hover {
            color: #462e2e;
            background-color: #555;
        }

        .link-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #948682;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .link-button:hover {
            background-color: #555;
        }

        .logo-image {
            position: absolute;
            bottom: 10px;
            left: 10px;
            max-width: 150px;
        }
    </style>
    <!-- Students list -->
    <h3>List of Students:</h3>
    <?php
    include ('dbconnect.php');

    $query = "SELECT * FROM student";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li><a href='studentdetail.php?id=" . $row['ssn'] . "'>" . $row['studentname'] . "</a></li>";
        }
        echo "</ul>";
    } else {
        echo "There is no student.";
        $query_3="Select ";

    }
    mysqli_close($conn);
    ?>

    <a href="index.php" class="link-button">Anasayfa</a>

</body>
<div class="right-div"></div>
<div class="left-div"></div>
</html>
