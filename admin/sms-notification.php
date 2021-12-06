<?php
$number = $_GET['phone'];
$days = $_GET['days'];
$name = $_GET['name'];

$message = 'Hello '. $name . ' Your ISCO Contract Remain ' . $days . 'day(s), Please Cancel/Renew/Update. Thanks to use ECAS System!';

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

if($httpcode == 200){
    header('Location: ../notification.php?notification=Message Sent to The User');
} else {
    header('Location: ../notification.php?notification=Message Not Sent to The User');
}

?>