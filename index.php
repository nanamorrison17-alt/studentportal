<?php

session_start();
include("config/createDatabase.php");
include("config/connectionDB.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Portal</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header>
        <div class="logo">startocode</div>

        <nav>
            <a href="index.php" >Home</a>
        </nav>

        <a href="form.php" class="btn">Get Started</a>
    </header>

    <section class="hero">

        <div class="hero-text">
            <h1>Student Main Portal</h1>
            <p>Ustacky Student Portal registration, join us today for your online courses.</p>
            <br>
            <a href="form.php" class="hero-btn"> Get Started </a>
        </div>

        <div class="hero-image">
            <img src="images/heroimage1.svg" alt="Student Portal Image">
        </div>

    </section>

    <footer>
        All rights reserved @ Startocode 2026
    </footer>

</body>
</html>