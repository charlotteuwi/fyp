<?php
include_once('../resources/connection.php');


$number = $_GET['phone'];

$message = $_GET['message'];

$data=array("sender"=>'ECAS', "recipients"=> $number, "message"=> $message,);

$url="https://www.intouchsms.co.rw/api/sendsms/.json";
$data=http_build_query($data);
$username="charlotteuwi";
$password="7962zzAW@EuHHnc";

$ch=curl_init();

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_USERPWD,$username.":".$password);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);

$result=curl_exec($ch);
$httpcode=curl_getinfo($ch,CURLINFO_HTTP_CODE);

curl_close($ch);

$sent_as_on =  date('d-m-Y');

if($httpcode == 200){
    $query = "INSERT INTO `smsnotification`(`phone_number`, `message`, `status`, `sent_as_on`) VALUES ('$number','$message','Sent','$sent_as_on');";
    $result = mysqli_query($con, $query);
    header('Location: ../notification.php?notification=Message Sent to The User');
} else {
    $query = "INSERT INTO `smsnotification`(`phone_number`, `message`, `status`, `sent_as_on`) VALUES ('$number','$message','Not Sent','$sent_as_on');";
    $result = mysqli_query($con, $query);
    header('Location: ../notification.php?notification=Message Not Sent to The User');
}

?>