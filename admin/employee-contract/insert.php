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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["document"]) && $_FILES["document"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "pdf" => "application/pdf");
        $filename = $_FILES["document"]["name"];
        $filetype = $_FILES["document"]["type"];
        $filesize = $_FILES["document"]["size"];

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die(header('Location: ../../notification.php?notification=Choose a Valid Format'));

        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die(header('Location: ../../notification.php?notification=The File is too Big!'));

        // Verify MYME type of the file
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("upload/" . $filename)) die(header('Location: ../../notification.php?notification= filename is already exists'));
            // {
            //  echo $filename . " is already exists.";
            // } 
            else {
                move_uploaded_file($_FILES["document"]["tmp_name"], "upload/" . $filename);
                $uploadedSuccess = true;
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
            $uploadedSuccess = false;
        }
    } else {
        echo "Error: " . $_FILES["document"]["error"];
        $uploadedSuccess = false;
    }
}
if ($uploadedSuccess === true) {
    //$id=$_POST['id'];
    $contract_id = $_POST['contract_id'];
    $employee_name = $_POST['employee_name'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $registered_on = date("d-m-Y");
   
    $message = "Hi Employee, your Username is: " . $username . " and Password is: " . $password . " KEEP THEM SAFE, Thank you!";

    $query = mysqli_query($con, "INSERT INTO `usercontracts` VALUES('','$contract_id','$employee_name', '$phone_number','$address','$description','$start_date','$end_date','$filename','ACTIVE','$registered_on')") or die(mysqli_error($con));
    $security = mysqli_query($con, "INSERT INTO `users` VALUES('','$username','$password', 'user', '$contract_id')") or die(mysqli_error($con));

    if ($query) {
        $notificationMessage = "Data Into Contracts Inserted";
        if ($security) {
            $notificationMessage = "Data Into Contracts and User Inserted";

            header('Location: ../../notification.php?notification='.$notificationMessage);
            $data = array("sender" => 'ECAS', "recipients" => $phone_number, "message" => $message,);

            $url = "https://www.intouchsms.co.rw/api/sendsms/.json";
            $data = http_build_query($data);
            $username = "charlotteuwi";
            $password = "7962zzAW@EuHHnc";

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

            $result = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            curl_close($ch);


        } else {
            header('Location: ../../notification.php?notification='.$notificationMessage);
        }
    } else {
        $notificationMessage = "No data inserted";
        header('Location: ../../notification.php?notification='.$notificationMessage);
    }
}
