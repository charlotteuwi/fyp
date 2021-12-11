<?php
session_start();
//Database Connection
include_once('../../resources/connection.php');
//include_once('../empoyee-contract/updte-company-contract-form.php');

if (isset($_POST['update'])) {
    
    $id = $_POST['id'];
    //Getting Post Values
    $employee_name = $_POST['employee_name'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $description = $_POST['description'];
   
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    
    //Query for data updation
    $query=mysqli_query($con, "UPDATE usercontracts 
    SET employee_name='$employee_name', 
    phone_number='$phone_number',
    address='$address',  
    description='$description',
    start_date='$start_date', 
    end_date='$end_date' WHERE 
    id = $id ") or die(mysqli_error($con));

    if ($query) {
        header('Location: ../../notification.php?notification=Data Successfully Updated');
    } else {
        header('Location: ../../notification.php?notification=Data Failed Update');
    }
}
?>
















