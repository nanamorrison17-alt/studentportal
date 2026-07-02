<?php

    include("connectionDB.php");

    $search = $_POST['search'];
    $admission_status = $_POST['admission_status'];
    $gender = $_POST['gender'];
    $jamb_score = $_POST['jamb_score'];

    $sql = "SELECT * FROM students WHERE 1=1";

    if(!empty($search)){
        $sql .= " AND (firstname LIKE '%$search%' OR middlename LIKE '%$search%' OR lastname LIKE '%$search%')";

    }

    if(!empty($admission_status)){
        $sql .= " AND admission_status='$admission_status'";

    }

    if(!empty($gender)){
        $sql .= " AND gender='$gender'";

    }

    if(!empty($jamb_score)){
        $sql .= " AND jamb_score = '$jamb_score'";

    }

    $sql .= " ORDER BY id DESC";
    $result = mysqli_query($conn,$sql);
    $sn = 1;
    while($row = mysqli_fetch_assoc($result)){

        ?>

        <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['jamb_score']; ?></td>
            <td><?php echo $row['admission_status']; ?></td>
            <td><a href="view.php?id=<?php echo $row['id']; ?>" class="view-btn"> View </a></td>
        </tr>

        <?php

    }

?>