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
?>
<p>Pending Request </p>
<?php
include_once('../../resources/connection.php');

$contract_id=$_POST['contract_id'];
$manager=$_POST['manager'];
$phone_number=$_POST['phone_number'];
$action=$_POST['action'];
$approve=$_POST['status'];
$usertype=$_POST['usertype'];
$date=$_POST['date'];

$user_reason = $_POST['user_reason'];
$admin_reason = $_POST['admin_reason'];

if(isset($_POST['approve'])){
   
    $sql=mysqli_query($con, "INSERT INTO `requestsanswers` (contract_id, manager, phone_number, action, status, date, user_reason, admin_reason) VALUES('$contract_id','$manager',$phone_number,'$action','approved','$date', '$user_reason', '$admin_reason')")or die(mysqli_error($con));

    //query delete 
    $sql1=mysqli_query($con, "DELETE FROM `requests` WHERE contract_id='$contract_id'");

    //if action == 'cancel'
    //query for updating in company contracts set status = 'cancel' where contract id = contractod

    if($action == 'cancel'){

        if($usertype=='company'){
            $sql2=mysqli_query($con, "UPDATE companycontracts set status='cancel' where contract_id='$contract_id'");
        } elseif($usertype=='user'){
            $sql2=mysqli_query($con, "UPDATE usercontracts set status='cancel' where contract_id='$contract_id'");
        }
        
    }

    if($sql && $sql1 || $sql2){
        header('Location: ../../notification.php?notification=Request Changed the Status!');    
        exit;
    }


}
if(isset($_POST['reject'])){

    //echo $action;
    //query insert
    $sql=mysqli_query($con, "INSERT INTO `requestsanswers` (contract_id, manager, phone_number, action, status, date, user_reason, admin_reason) VALUES('$contract_id','$manager',$phone_number,'$action','Rejected','$date', '$user_reason', '$admin_reason')")or die(mysqli_error($con));

    //query delete 
    $sql1=mysqli_query($con, "DELETE FROM `requests` WHERE contract_id='$contract_id'");

    if($sql && $sql1){
        header('Location: ../../notification.php?notification=REQUESTS STATUS CHANGED');
    
        exit;
    }

}
   