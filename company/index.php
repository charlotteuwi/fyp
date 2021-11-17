<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.php?msg=You are not logged in');
	exit;
}

if ($_SESSION['usertype'] != 'company'){
	header('Location: ../index.php?msg=You are not the Company');
	exit;
}
?>
<html>
<head>
	<title>Welcome to user page </title>
	<link href="css/tailwind.css" rel="stylesheet">
	<link href="fontawesome/css/all.css" rel="stylesheet">
</head>
<body >
	<div>
		<!----header--->
		<div class =" flex items-center justify-between text-2xl w-full bg-gray-100 h-16 py-2 px-4 shadow">
		  <div class ="font-bold">ECAS </div>
		  <div class ="font-light"> Company </div>
		  <div> <img class="h-12" src="img/logo.png"> </div>
	</div>
	<!-----navigations & contents -->
	<div class="flex">
		<div class="bg-gray-900 w-1/4 py-10 "> 
			 <div class="text-gray-100 font-light flex-wrap gap-1/2">
				<a href="userpage.php">
				<div class="py-4 px-5 bg-white text-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 
				cusror-pointer border-b border-red-800 shadow-lg">
					<p><i class="fas fa-tachometer-alt"></i> Dashboard</p>
				</div></a>
		        
		        <a href="#">
		        <div class="py-4 px-5 bg-gray-800 text-white mt-2 flex hover:bg-gray-100 hover:text-gray-800 
		        cusror-pointer border-b border-red-800 shadow-lg">
		        	<p><i class="fas fa-file-alt"></i> Request</p>
		        </div>
		          
				
				 	
			</div>	
		
		</div>