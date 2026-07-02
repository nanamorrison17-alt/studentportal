<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>

    <div class="logo">startocode</div>

    <nav>
        <a href="index.php">Home</a>
        <a href="form.php">Add Student</a>
    </nav>

</header>



<div class="container">

    <div class="alert alert-success alert-dismissible fade in" style="display: block; font-weight:bold;">Info! All students records table</div> 

    <div class="filters">

        <input type="text" id="searchInput" onkeyup="searchStudent()" placeholder="Search Student">

        <select id="admission_status" onchange="searchStudent()">
            <option value="">Admission Status</option>
            <option value="admitted">Admitted</option>
            <option value="undecided">Undecided</option>
        </select>

        <select id="gender" onchange="searchStudent()">
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <input type="number" id="jamb_score" onkeyup="searchStudent()" placeholder="Jamb Score">

        <button>Search</button>
        <button type="button" onclick="resetFilters()">Reset</button>

    </div>

    <table id="studentTable">

        <thead>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Jamb Score</th>
                <th>Admission Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody id="studentTableBody">

            <?php include("config/getStudents.php"); ?>

        </tbody>

    </table>

</div>

<footer>
        All rights reserved @Startocode 2026
</footer>

<script src="js/mainscript.js"></script>

</body>
</html>