<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Form</title>
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

     
<div class="container">

    
    <h1 class="center">Student Portal Form</h1>

    <div class="alert alert-success alert-dismissible fade in" id="resultMessage" style="display: none;"></div> 
       

    <form id="studentForm" method="POST" enctype="multipart/form-data">

        <h3 class="section-title">Personal Information</h3>

        <div class="grid">

            <div>
                <label>Upload Image</label>
                <input type="file" id="image" name="image">
            </div>

            <div></div>

            <div>
                <label>First Name*</label>
                <input type="text" id="firstname" name="firstname" required placeholder="Enter your first name">
                <span style="color: red" id="firstname_error" class="error"></span>
            </div>

            <div>
                <label>Middle Name</label>
                <input type="text" id="middlename" name="middlename" placeholder="Enter your middle name">
            </div>

            <div>
                <label>Last Name*</label>
                <input type="text" id="lastname" name="lastname" required placeholder="Enter your last name">
                <span style="color: red" id="lastname_error" class="error"></span>
            </div>

            <div>
                <label>Email*</label>
                <input type="email" id="email" name="email" placeholder="example@mail.com">
                <span style="color: red" id="email_error" class="error"></span>
            </div>
 
            <div>
                <label>Date Of Birth*</label>
                <input type="date" id="date_of_birth" name="date_of_birth">
                <span style="color: red" id="date_of_birth_error" class="error"></span>
            </div>

            <div>
                <label>Gender*</label>

                <div class="radio-group" >
                    <div class="form-check">
                        <input type="radio" name="gender" class="form-check-input" id="male" value="male"  style="width:5%!important">
                        <label for="male" class="form-check-label has-success">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="gender" class="form-check-input" id="female" value="female"  style="width:5%!important">
                        <label for="male" class="form-check-label has-success">Female</label>
                    </div>
                    <span style="color: red" id="gender_error" class="error"></span>
                </div>
            </div>

            <div>
                <label>Phone Number*</label>
                <input type="text" id="phone" name="phone" placeholder="Enter phone number eg. 024xxxxxxxx">
                <span style="color: red" id="phone_error" class="error"></span>
            </div>

            <div>
                <label>Address*</label>
                <textarea id="address" name="address"></textarea>
            </div>

            <div>
                <label>State Of Origin*</label>

                <select id="state_of_origin" name="state_of_origin">
                    <option value="">Select State</option>
                </select>
                <span style="color: red" id="state_of_origin_error" class="error"></span>
            </div>

            <div>
                <label>Local Government*</label>

                <select id="local_govt" name="local_govt">
                    <option value="">Select Local Government</option>
                </select>
                <span style="color: red" id="local_govt_error" class="error"></span>
            </div>

        </div>

        <h3 class="section-title">
            Academics Related Information
        </h3>

        <div class="grid">

            <div>
                <label>Next Of Kin*</label>
                <input type="text" id="next_of_kin" name="next_of_kin" placeholder="Enter the full name of your next of kin">
                <span style="color: red" id="next_of_kin_error" class="error"></span>
            </div>

            <div>
                <label>Jamb Score*</label>
                <input type="number" id="jamb_score" name="jamb_score" placeholder="Enter a score between 100 and 400">
                <span style="color: red" id="jamb_score_error" class="error"></span>
            </div>

        </div>

        <button type="button" class="submit-btn" onclick="addNewStudentAjax()"> Submit </button>

    </form>

</div>

<footer>
    All rights reserved @Startocode 2026
</footer>

<script src="js/mainscript.js"></script>

</body>
</html>