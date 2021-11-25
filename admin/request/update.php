<?php
// We need to use sessions, so you should always start sessions using the below code.

session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../../index.php?msg=You are not logged in');
    exit;
}

if ($_SESSION['usertype'] != 'admin') {
    header('Location: ../../index.php?msg=You are not the Company');
    exit;
}

include_once('../../resources/connection.php');

$contract_id=$_GET['contract_id'];
$action=$_GET['action'];

if($action == 'approve'){

    echo $action;
    //query
    $sql=mysqli_query($con, "UPDATE requests SET status='Approved' WHERE contract_id='$contract_id'")or die(mysqli_error($con));

    if($sql){
        header('Location: ../../notification.php?notification=REQUESTS STATUS CHANGED');
    
        exit;
    }

}
if(isset($_POST['Reject'])){
    //query
    $sql=mysqli_query($con, "UPDATE requests SET status='Rejected' WHERE contract_id='HVCZ1T4D7'")or die(mysqli_error($con));

    if($sql){
        header('Location: ../../notification.php?notification=REQUESTS STATUS CHANGED');
    
        exit;
    }

}