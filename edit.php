<?php
    
    include "db_conn.php";
    $patient_id=$_GET["patient_id"];

    if(isset($_POST["submit"])){
        $patient_id=$_POST['patient_id'];
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $gender=$_POST['gender'];
        $patient_age=$_POST['patient_age'];
        $address=$_POST['address'];
        $room_number=$_POST['room_number'];
        $phone_no=$_POST['phone_no'];

        $sql="UPDATE `patient_details` SET `Patient_id`='[$patient_id]', `First_name`='[$first_name]',`Last_name`='[$last_name]',`Gender`='[$gender]',`Patient_age`='[$patient_age]',`Address`='[$address]',`Room_number`='[$room_number]',`Phone_no`='[$phone_no]' WHERE patient_id=$patient_id";;

        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: index.php?msg: Patient information updated.");
        }
        else{
            echo "Failed: ".mysqli_error($conn);
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <title>Patient's Enquiry Portal</title>


</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: beige";>
        Patient's Details
    </nav>
    <div class="container ">
        <div class="text-center mb-4">
           <h3>Edit Patient Information</h3>
           <p class="text-muted">Save the changes.</p>
        </div>
        <?php
        
        $sql="SELECT * FROM `patient_details` WHERE patient_id = $patient_id";
        $result=mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);
        ?>
    </div>
    <div class="container d-dflex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px">
            <div class="row mb-3"> 
                <div class="col">
                <label class="form-label">Patient ID:</label>
                    <input type="number" class="form-control" name="patient_id" placeholder="Enter the patient id">
                 </div>
            </div>

                <div class="mb-3">
                    <label class="form-label">First Name:</label>
                    <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name']  ?>">
                    <label class="form-label">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name']  ?>">
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Gender:</label>&nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="female" value="female" <?php echo ($row['gender']=='female')?"checked":"" ?>>
                    <label for="female" class="form-input-label">Female</label>
                    <input type="radio" class="form-check-input" name="gender" id="male" value="male" <?php echo ($row['gender']=='male')?"checked":"" ?>>
                    <label for="male" class="form-input-label">Male</label>
                </div>

                <div class="mb-3">
                    <label class="form-label">Patient's Age:</label>
                    <input type="number" class="form-control" name="patient_age" value="<?php echo $row['patient_age']  ?>">
                </div>  

                <div class="mb-3">
                    <label class="form-label">Address:</label>
                    <input type="text" class="form-control" name="address" value="<?php echo $row['address']  ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Room Number:</label>
                    <input type="number" class="form-control" name="room_number" value="<?php echo $row['room_number']  ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Contact details:</label>
                    <input type="number" class="form-control" name="phone_no" value="<?php echo $row['phone_no']  ?>">
                </div>
                <div>
                    <Button type="submit" class="btn btn-success" name="submit">Update</Button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
              
        </form>
    </div>

    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>   
</html>