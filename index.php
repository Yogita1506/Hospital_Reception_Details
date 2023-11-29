<?php 
include "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Patient's Enquiry Portal</title>


</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: beige";>
        Patient's Details
    </nav>
    <div class="container">
        <?php
            if(isset($_GET["msg"])){
                $msg = $_GET["msg"];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'.$msg.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
               
            }
        ?>
        <a href="add_new.php" class="btn btn-dark  mb-3">Add New Patient</a>
    </div>
    
    <table class="table table-hover text-center">
        <thead class="table-dark">
            <tr>
            <th scope="col">Patient Id</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Age</th>
            <th scope="col">Address</th>
            <th scope="col">Room No</th>
            <th scope="col">Contact No</th>
            <th scope="col">Action</th>
            
            </tr>
        </thead>
        <tbody>
            <?php
                $sql="SELECT * FROM `patient_details`";
                $result= mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                        <td><?php echo $row['patient_id']   ?></td>
                        <td><?php echo $row['first_name']   ?></td>
                        <td><?php echo $row['last_name']   ?></td>
                        <td><?php echo $row['gender']   ?></td>
                        <td><?php echo $row['patient_age']   ?></td>
                        <td><?php echo $row['address']   ?></td>
                        <td><?php echo $row['room_number']   ?></td>
                        <td><?php echo $row['phone_no']   ?></td>
                            
                            <td>
                            <a href="edit.php?patient_id=<?php echo $row["patient_id"] ?>" class="line-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                            <a href="delete.php?patient_id=<?php echo $row["patient_id"] ?>" class="line-dark"><i class="fa-solid fa-trash fs-5 me-3"></i></a>
                            </td>

            </tr>
                    <?php
                }
            ?>
            
           
        </tbody>
    </table>

    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>   
</html>