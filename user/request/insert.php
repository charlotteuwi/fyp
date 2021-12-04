<?php
// We need to use sessions, so you should always start sessions using the below code.

session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../../index.php?msg=You are not logged in');
    exit;
}

if ($_SESSION['usertype'] != 'user') {
    header('Location: ../../index.php?msg=You are not the Company');
    exit;
}
include_once('../../resources/connection.php');
$contract_id=$_POST['contract_id'];
$manager=$_POST['client_name'];
$phone_number=$_POST['phone_number'];
$day = date('d-m-Y');

if(isset($_POST['cancel'])){
    //query
    $sql=mysqli_query($con, "INSERT INTO `requests` VALUES('','$contract_id','$manager', '$phone_number', 'cancel', 'pending', '$day', 'user')")or die(mysqli_error($con));

    if($sql){
        header('Location: ../../notification.php?notification=Your request have been recorded');
        echo " Data Inserted";
    }else{
        echo " Data not Inserted";
        exit;
    }

}
if(isset($_POST['renew'])){
    //query
    $sql=mysqli_query($con, "INSERT INTO `requests` VALUES('','$contract_id','$manager', '$phone_number', 'renew', 'pending', '$day', 'user')")or die(mysqli_error($con));

    if($sql){
        header('Location: ../../notification.php?notification=Your request to renew have been recorded');
    
    //We insert into the db some cancel request information
    //$sql=mysqli_query($con, "INSERT INTO `requests` VALUES('','$contract_id','$manager', 'phone_number')")or die(mysqli_error($con));
}

}
if(isset($_POST['update_information'])){
    $sql=mysqli_query($con, "INSERT INTO `requests` VALUES('','$contract_id','$manager', '$phone_number', 'update_information', 'pending', '$day', 'user')")or die(mysqli_error($con));

    if($sql){
        header('Location: ../../notification.php?notification=Your request to Update Information  have been recorded');
    //We insert into the db some cancel request information
}
}
?>