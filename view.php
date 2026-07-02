<?php

session_start();
include("config/connectionDB.php");

$id = $_GET['id'];

$sql = "SELECT * FROM students WHERE id='$id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

$image = !empty($row['image']) ? "uploads/".$row['image'] : "images/default-user.svg";?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Summary View</title>
<link rel="stylesheet" href="css/style.css">
</head>
    <body>
        <header>
    <div class="logo">startocode</div>

    <nav>
        <a href="index.php">Home</a>
        <a href="dashboard.php">Dashboard</a>
    </nav>
</header>

<div class="view-container">

    <div class="top-section">

        <div class="profile-card">

            <img src="<?php echo $image; ?>" class="profile-image">

            <h2>
                <?php
                echo $row['firstname'].' '.
                     $row['lastname'];
                ?>
            </h2>

            <span class="status-badge">
                <?php echo $row['admission_status']; ?>
            </span>

        </div>

        <div class="personal-info">

            <div class="section-heading">
                Personal Information
            </div>

            <p>
                <strong>Email:</strong>
                <?php echo $row['email']; ?>
            </p>

            <p>
                <strong>Gender:</strong>
                <?php echo $row['gender']; ?>
            </p>

            <p>
                <strong>Phone Number:</strong>
                <?php echo $row['phone']; ?>
            </p>

            <p>
                <strong>Date Of Birth:</strong>
                <?php echo $row['date_of_birth']; ?>
            </p>

            <p>
                <strong>Address:</strong>
                <?php echo $row['address']; ?>
            </p>

        </div>

    </div>

    <div class="info-section">

        <div class="section-heading">
            Other Information
        </div>

        <div class="info-grid">

            <div>
                <strong>State Of Origin:</strong>
                <?php echo $row['state_of_origin']; ?>
            </div>

            <div>
                <strong>Local Govt:</strong> 
                <?php echo $row['local_govt']; ?>
            </div>

        </div>

    </div>

    <div class="info-section">

        <div class="section-heading">
            Academics Related Information
        </div>

        <div class="info-grid">

            <div>
                <strong>Next Of Kin:</strong>
                <?php echo $row['next_of_kin']; ?>
            </div>

            <div>
                <strong>Jamb Score:</strong>
                <?php echo $row['jamb_score']; ?>
            </div>

            <div>
                <strong>Status:</strong>
                <?php echo $row['admission_status']; ?>
            </div>

            <div>

               <form action="config/updateStatus.php" method="POST" class="status-form">

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <strong for="admission_status_<?php echo $row['id']; ?>">Change Status:</strong>

                    <select id="admission_status_<?php echo $row['id']; ?>" name="admission_status">

                        <option value="undecided" <?php if($row['admission_status']=="undecided") echo "selected"; ?>>  
                            Undecided
                        </option>

                        <option value="admitted" <?php if($row['admission_status']=="admitted") echo "selected"; ?>>
                            Admitted
                        </option>

                    </select>

                    <button type="submit" class="update-btn">Save</button>

            </form>

            </div>

        </div>

    </div>

</div>

<footer>
    All rights reserved @Startocode 2026
</footer>
    <script src="js/mainscript.js"></script>
    </body>
</html>