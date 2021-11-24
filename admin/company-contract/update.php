<?php
//Database Connection
include_once('../../resources/connection.php');
//include_once('../empoyee-contract/updte-company-contract-form.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    //Getting Post Values
    $company_name = $_POST['company_name'];
    $tin_number = $_POST['tin_number'];
    $description = $_POST['description'];
    $manager = $_POST['manager'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    //$contract_id=$_POST['contract_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $isco_supervisor = $_POST['isco_supervisor'];
    //Query for data updation
    $query=mysqli_query($con, "update companycontracts set company_name='$company_name', tin_number='$tin_number', description='$description', manager='$manager', phone_number='$phone_number'
 , address='$address', start_date='$start_date', end_date='$end_date', isco_supervisor='$isco_supervisor' where id='$id'");
    if ($query) {
        echo "<script>alert('You have successfully update the data');</script>";
        echo "<script type='text/javascript'> document.location ='../add-contract.php'; </script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>