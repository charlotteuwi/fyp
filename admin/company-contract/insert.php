<?php
include_once('../../resources/connection.php');

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.php?msg=You are not logged in');
	exit;
}

if ($_SESSION['usertype'] != 'admin') {
	header('Location: ../index.php?msg=You are not the Admin');
	exit;
}

$uploadedSuccess;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["document"]) && $_FILES["document"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "pdf" => "application/pdf");
        $filename = $_FILES["document"]["name"];
        $filetype = $_FILES["document"]["type"];
        $filesize = $_FILES["document"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die(header('Location: ../../notification.php?notification=Choose a Valid Format'));
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die(header('Location: ../../notification.php?notification=The File is too Big!'));
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)) die(header('Location: ../../notification.php?notification= filename is already exists'));
           // {
              //  echo $filename . " is already exists.";
           // } 
            else{
                move_uploaded_file($_FILES["document"]["tmp_name"], "upload/" . $filename);
                $uploadedSuccess = true;
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
                $uploadedSuccess = false;
        }
    } else{
        echo "Error: " . $_FILES["document"]["error"];
        $uploadedSuccess = false;
}}
if($uploadedSuccess === true){
    //$id=$_POST['id'];
    $company_name=$_POST['company_name'];
    $tin_number=$_POST['tin_number'];
    $description=$_POST['description'];
    $manager=$_POST['manager'];
    $phone_number=$_POST['phone_number'];
    $address=$_POST['address'];
    $contract_id=$_POST['contract_id'];
    $start_date=$_POST['start_date'];
    $end_date=$_POST['end_date'];   
    $isco_supervisor=$_POST['isco_supervisor'];
    $username=$_POST['username'];   
    $password=$_POST['password'];


    $query=mysqli_query($con, "INSERT INTO `companycontracts` VALUES('','$company_name','$tin_number','$description','$manager','$phone_number','$address','$contract_id','$start_date','$end_date','$filename','$isco_supervisor','ACTIVE')")or die(mysqli_error($con));
    $security=mysqli_query($con, "INSERT INTO `users` VALUES('','$username','$password', 'company', '$contract_id')")or die(mysqli_error($con));
    
    if($query){
        if($security){
            header('Location: ../../notification.php?notification=Data Successfully Registered!');
        } else {
            header('Location: ../../notification.php?notification=Login Information not Recorded!');  
        }
    } else{
        header('Location: ../../notification.php?notification=No Data Inserted!');
    }
}
