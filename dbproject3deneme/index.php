<!DOCTYPE html>
<html>
<head>
    <title>Main Window</title>
    <style>
        body {
            background-image: url('https://images.rawpixel.com/image_1000/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvcm00OTQtYmctMDE4LXguanBn.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .allPage {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-flow: column nowrap;
            align-items: center;
            justify-content: center; /* Center align the content vertically */
        }

        .navigation {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .navigation li {
            display: inline;
            margin: 0 10px;
        }

        .navigation a {
            padding: 10px 20px;
            border: 2px solid #8B4513; /* Kenarlık rengi */
            border-radius: 10px;
            color: #8B4513; /* Buton rengi */
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .navigation a:hover {
            background-color: #8B4513; /* Buton basıldığında rengi */
            color: #FFF;
        }

        .main {
            width: 70vw;
            height: 90vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center; /* Center align the content vertically */
            text-align: center;
        }

        .main .myImage {
            width: 300px; /* Adjust the image size as needed */
            height: 300px;
            margin-top: 50px;
        }

        .main .contents {
            margin-top: 50px;
        }

        .main .contents h1 {
            font-size: 30px;
            font-weight: 700;
            color: #8B4513; /* Text color */
        }

        .main .contents p {
            font-size: 20px;
            font-weight: 500;
            color: #8B4513; /* Text color */
        }

        .main .contents .start {
            display: flex;
            justify-content: center;
            align-items: center;

            background-color: #8B4513; /* Buton rengi */
            border-radius: 20px;
            border: 2px solid #8B4513; /* Kenarlık rengi */

            box-shadow: rgba(0, 0, 0, 0.5) 0px 5px 15px;

            width: 200px;
            height: 50px;

            margin-top: 30px;
        }

        .main .contents .start a {
            font-size: 20px;
            font-weight: 700;
            color: #FFF; /* Text color */
            text-decoration: none;
        }
    </style>
</head>
<body>
<header>
    <section class="topPart">

        <section class="left">
            <ul class="navigation">
                <li><a href="">Home</a></li>
                <li><a href="instructor.php">Instructors</a></li>
                <li><a href="students.php">Students</a></li>
                <li><a href="#">Departments</a></li>
                <li><a href="#">Projects</a></li>
            </ul>
        </section>

        <section class="right">
            <div class="logo">
                <img src="https://upload.wikimedia.org/wikipedia/commons/c/c2/Iu_logo-mavi.png" alt="Isik Universitesi Logo">
            </div>
        </section>
    </section>
</header>
<main>
    <h1>Welcome to Our Project's Part 3 Implementation</h1>
    <p>Click on the menu you want to enter</p>
    <div class="navigation">
        <a href="login.php">Get Started</a>
    </div>
</main>
</body>
</html>
