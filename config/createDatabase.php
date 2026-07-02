<?php

function checkIfDatabaseExists(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "studentportal";
    $conn = mysqli_connect($servername,$username,$password);

    if(!$conn){
        die(mysqli_connect_error());
    }

    $createDatabase = "CREATE DATABASE IF NOT EXISTS $dbName";
    mysqli_query($conn,$createDatabase);
    mysqli_close($conn);
}


function checkIfTableExists(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "studentportal";
    $conn = mysqli_connect($servername,$username,$password,$dbName);

    if(!$conn){
        die(mysqli_connect_error());
    }

    $createTable = "CREATE TABLE IF NOT EXISTS students (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            image VARCHAR(255) DEFAULT NULL,
                            firstname VARCHAR(100) NOT NULL,
                            middlename VARCHAR(100) DEFAULT NULL,
                            lastname VARCHAR(100) NOT NULL,
                            email VARCHAR(150) NOT NULL,
                            date_of_birth DATE NOT NULL,
                            gender ENUM('male','female') NOT NULL,
                            phone VARCHAR(20) NOT NULL,
                            address TEXT,
                            state_of_origin VARCHAR(100) NOT NULL,
                            local_govt VARCHAR(100) NOT NULL,
                            next_of_kin VARCHAR(150) NOT NULL,
                            jamb_score INT NOT NULL,
                            admission_status ENUM('undecided','admitted') DEFAULT 'undecided',
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";

    if(!mysqli_query($conn, $createTable)){
        die("Table Creation Error: " . mysqli_error($conn));
    }


    $countQuery = mysqli_query($conn,"SELECT COUNT(*) AS total FROM students"
    );

    $countRow = mysqli_fetch_assoc($countQuery);
    if($countRow['total'] == 0){
        $path = "../csv/students.csv";
        if(file_exists($path)){
            $file = fopen($path,"r");
            fgetcsv($file);
            while(($line = fgetcsv($file)) !== false){
                $importSQL = 
                            "INSERT INTO students(id,image,firstname,middlename,lastname,email,date_of_birth,gender,phone,address,state_of_origin,local_govt,next_of_kin,jamb_score,admission_status)
                            VALUES('{$line[0]}','{$line[1]}','{$line[2]}','{$line[3]}','{$line[4]}','{$line[5]}','{$line[6]}','{$line[7]}','{$line[8]}','{$line[9]}','{$line[10]}','{$line[11]}','{$line[12]}','{$line[13]}','{$line[14]}')";

                if(!mysqli_query($conn,$importSQL)){
                    echo mysqli_error($conn)."<br>";
                }
            }

            fclose($file);
            echo "CSV imported successfully";

        }else{

            echo "CSV file not found";
        }
    }

    mysqli_close($conn);
}

checkIfDatabaseExists();
checkIfTableExists();

?>