<?php
include("config/connectionDB.php");

$sql = "SELECT * FROM students ORDER BY id DESC";
$result = mysqli_query($conn,$sql);

$sn = 1;

while($row = mysqli_fetch_assoc($result)){

        ?>
        <tr>
            <td><?php echo $sn++; ?></td>
            <td> <?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];?> </td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['jamb_score']; ?></td>
            <td><?php echo $row['admission_status']; ?></td>
            <td> 
                <a href="view.php?id=<?php echo $row['id']; ?>" class="view-btn"> View </a>
            </td>
        </tr>

        <?php
    }
?>