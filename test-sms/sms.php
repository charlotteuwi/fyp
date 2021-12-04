<?php
$number = $_POST['number'];
$message = $_POST['message'];

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
    echo "Message Sent!";
} else {
    echo "Message Not Sent!";
}

?>