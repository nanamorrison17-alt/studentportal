<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include("createDatabase.php");
include("connectionDB.php");
header('Content-Type: application/json');

$errors = array();

//GET FORM VALUES

$firstname      = $_POST['firstname'] ?? '';
$middlename     = $_POST['middlename'] ?? '';
$lastname       = $_POST['lastname'] ?? '';
$email          = $_POST['email'] ?? '';
$date_of_birth  = $_POST['date_of_birth'] ?? '';
$gender         = $_POST['gender'] ?? '';
$phone          = $_POST['phone'] ?? '';
$address        = $_POST['address'] ?? '';
$state_of_origin= $_POST['state_of_origin'] ?? '';
$local_govt     = $_POST['local_govt'] ?? '';
$next_of_kin    = $_POST['next_of_kin'] ?? '';
$jamb_score     = $_POST['jamb_score'] ?? '';


// VALIDATION


if(empty($firstname)){
    $errors['firstname'] = "First name is required";
}
elseif(!preg_match("/^[a-zA-Z\s'-]+$/", $firstname)){
    $errors['firstname'] = "First name must contain letters only";
}

if(empty($lastname)){
    $errors['lastname'] = "Last name is required";
}
elseif(!preg_match("/^[a-zA-Z\s'-]+$/", $lastname)){
    $errors['lastname'] = "Last name must contain letters only";
}

if(empty($email)){
    $errors['email'] = "Email is required";
}
elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "Invalid email address";
}

if(empty($date_of_birth)){
    $errors['date_of_birth'] = "Date of birth is required";
}

if(empty($gender)){
    $errors['gender'] = "Please select gender";
}

if(empty($phone)){
    $errors['phone'] = "Phone number is required";
}
elseif(!preg_match('/^[0-9]{10,15}$/', $phone)){
    $errors['phone'] = "Phone number must contain 10-15 digits only";
}

if(empty($state_of_origin)){
    $errors['state_of_origin'] = "Please select state";
}

if(empty($local_govt)){
    $errors['local_govt'] = "Please select local government";
}

if(empty($next_of_kin)){
    $errors['next_of_kin'] = "Next of kin is required";
}

if(empty($jamb_score)){
    $errors['jamb_score'] = "JAMB score is required";
}
elseif(!is_numeric($jamb_score) || $jamb_score < 0 || $jamb_score > 400){
    $errors['jamb_score'] = "JAMB score must be between 0 and 400";
}


// RETURN VALIDATION ERRORS

if(!empty($errors)){

    echo json_encode([
        "success" => false,
        "errors" => $errors
    ]);

    exit;
}


/* ==========================
   IMAGE UPLOAD
========================== */

$image = "";

if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

    $uploadLocation = "../uploads/";

    if(!file_exists($uploadLocation)){
        mkdir($uploadLocation, 0777, true);
    }

    $image = time() . "_" . $_FILES['image']['name'];

    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        $uploadLocation . $image
    );
}


//Adding new student to DB

$admission_status = "undecided";
$addNewStudent = "INSERT INTO students(image,firstname,middlename,lastname,email,date_of_birth,gender,phone,address, state_of_origin,local_govt,next_of_kin,jamb_score,admission_status)
        VALUES('$image','$firstname','$middlename','$lastname','$email','$date_of_birth','$gender','$phone','$address','$state_of_origin','$local_govt','$next_of_kin','$jamb_score','$admission_status')";

$result = mysqli_query($conn, $addNewStudent);
if($result){
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['sql'] = $firstname.' '.$lastname.' has just been successfully registered';
        $data['success'] = "true";

        echo json_encode([
            "success" => true,
            "insert" => $firstname . " " . $lastname . " has been successfully added"
    ]);

}else{

    $_SESSION['noUpdate'] = $firstname.' '.$lastname.' could not be added. Try again!';
    
    echo json_encode([
        "success" => false,
        "database_error" => mysqli_error($conn)
    ]);
}

?>