<?php
include ("dbconnect.php");


if (isset($_POST['login'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $querystudent = "select * from student where username= '" . $username . "' AND passwrd= '" . $password . "'";
    $resultstudent = mysqli_query($conn, $querystudent);

    $query_instructor= "select * from  instructor where username= '" . $username . "' AND passwrd= '" . $password . "'";
    $result_instructor = mysqli_query($conn, $query_instructor);

    $query_department= "select * from department where name= '" . $username . "'";
    $result_department = mysqli_query($conn, $query_department);

    $query_project= "select * from project where name= '" . $username . "'";
    $result_project = mysqli_query($conn, $query_project);

    if ($row = mysqli_fetch_assoc($result_instructor)) {
        session_start();
        $_SESSION['usernameinstructor'] = $username;
        ?>
        <script type="text/javascript">window.location.href = "instructor/main.php"</script>
        <?php
    }
    if ($row = mysqli_fetch_assoc($result_student)) {
        session_start();
        $_SESSION['username_student'] = $username;
        ?>
        <script type="text/javascript">window.location.href = "student/main.php"</script>
        <?php
    }
    if ($row = mysqli_fetch_assoc($result_department)) {
        session_start();
        $_SESSION['username_department'] = $username;
        ?>
        <script type="text/javascript">window.location.href = "department/main.php"</script>
        <?php
    }
   
    if ($row = mysqli_fetch_assoc($result_project)) {
        session_start();
        $_SESSION['usernameproject'] = $username;
        ?>
        <script type="text/javascript">window.location.href = "project/main.php"</script>
        <?php
    }
}
?>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" media="all" href="styles.css">
    </head>

    <body>
    <style>

    </style>
        <div class="login-wrap">
            <div class="login-html">
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
                <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                <div class="login-form">

                    <form method="post">
                        <div class="sign-in-htm">
                            <div class="group">
                                <label for="user" class="label">Username</label>
                                <input name="username" type="text" class="input">
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Password</label>
                                <input name="password" type="password" class="input" data-type="password">
                            </div>

                            <div class="group">
                                <input type="submit" name="login" class="button" value="Log In">
                            </div>
                            <div class="hr"></div>

                        </div>
                    </form>
                    <form action="signUp.php" method="post">
                        <div class="sign-up-htm">
                            <div class="group">
                                <label for="username" class="label" style="color: #1f497d">User Name </label>
                                <input id="user" name="username" type="text" class="input">
                            </div>

                            <div class="group" style="color: #1f497d">
 >                               <label for="fname" class="label">First Name</label>
                                <input id="pass" name="fname" type="text" class="input">
                            </div>
                            <div class="group">
                                <label for="lname" class="label">Last Name</label>
                                <input id="pass" name="lname" type="text" class="input">
                            </div>

                            <div class="group">
                                <input type="submit" class="button" value="Sign Up">
                            </div>
                            <div class="hr"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
// Veritabanı bağlantısı
include ('dbconnect.php');

// Eğitmenleri sorgulama
$sql = "SELECT * FROM instructors";
if (!empty($conn)) {
    $result = $conn->query($sql);
}

// Eğer sorguda sonuç varsa
if ($result->num_rows > 0) {
    // Sonuçları ekrana yazdırma
    while ($row = $result->fetch_assoc()) {
        echo "Eğitmen Adı: " . $row["instructor_name"] . "<br>";
        echo "Eğitmen E-posta: " . $row["instructor_email"] . "<br><br>";
    }
} else {
    echo "Kayıtlı eğitmen bulunamadı.";
}

// Veritabanı bağlantısını kapatma
$conn->close();
?>