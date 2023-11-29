<?php
    include "db_conn.php";
    $patient_id=$_GET["patient_id"];
    $sql="DELETE FROM `patient_details` WHERE patient_id=$patient_id";
    $result = mysqli_query($conn, $sql);
    if ($result){
        header("Location: index.php?msg=Record Deleted Successfully.");
    }
    else{
        echo "Failed: ".mysqli_error($conn);
    }
?>