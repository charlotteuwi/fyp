<?php
// Check if the form was submitted
$uploadedSuccess;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";
                $uploadedSuccess = true;
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
                $uploadedSuccess = false;
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
        $uploadedSuccess = false;
    }
}
include_once('connection.php');
if($uploadedSuccess){
    $contract_id=$_POST['contract_id'];
    $client_name=$_POST['client_name'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $contract_value=$_POST['contract_value'];
    $start_date=$_POST['start_date'];
    $end_date=$_POST['end_date'];   
    $cancallation_notice=$_POST['cancallation_notice'];


try {
  $sql = "INSERT INTO `employee_tb` VALUES('$contract_id', '$client_name','$phone','$address','$contract_value','$start_date','$end_date','$cancallation_notice','$filename')";
  // use exec() because no results are returned
  $conn->exec($sql);
header('location: employeecontract.php');
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}}
//$conn = null;
?>


