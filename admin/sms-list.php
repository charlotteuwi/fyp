<?php
include_once('../resources/connection.php');

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
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Mini Dashboard</title>
	<link href="../resources/css/tailwind.css" rel="stylesheet">
	<link href="../resources/fontawesome/css/all.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
	<div>
		<!--Header Area-->
		<div class="flex items-center justify-between text-2xl w-full bg-white h-16 px-4 py-2  shadow">
			<div class="font-bold"> E-Contracts </div>
			<div class="font-light"> Admin </div>
			<div> <img class="h-12" src="../resources/img/logo.png"> </div>
		</div>
		<!-- Navigations & Contents -->
		<div class="flex">
			<div class="bg-gray-900 h-200 w-1/4 py-10">
				<div class="text-gray-100 font-light flex-wrap gap-1">

					<a href="index.php">
						<div class="py-4 px-5 bg-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 cursor-pointer border-b border-red-800 shadow-lg">
							<p><i class="fas fa-tachometer-alt"></i></p>
							<p class="ml-2"> Dashboard</p>
						</div>
					</a>
					<a href="add-contract.php">
						<div class="py-4 px-5  bg-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 cursor-pointer border-b border-red-800 shadow-lg">
							<p><i class="fas fa-file-signature"></i></p>
							<p class="ml-2"> Contracts</p>


						</div>
						</a>
					<a href="#">
						<div class="py-4 px-5 bg-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 cursor-pointer border-b border-red-800 shadow-lg">
							<p><i class="fas fa-file-alt"></i></p>
							<p class="ml-2"> Reports</p>
						</div>
						</a>
						<a href="view_request.php">
							<div class="py-4 px-5 bg-white text-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 
			        cusror-pointer border-b border-red-800 shadow-lg">
								<p><i class="fas fa-comments"></i> Requests </p>
							</div>
						</a>
						<a href="changepassword.php">
							<div class="py-4 px-5 bg-gray-800 text-white mt-2  flex hover:bg-gray-100 hover:text-gray-800 cursor-pointer border-b border-red-800 shadow-lg">
								<p><i class="fas fa-user-cog"></i></p>
								<p class="ml-2"> Settings</p>
							</div>
						</a>
						<a href="../logout.php">
							<div class="py-4 px-5 bg-gray-800 text-white mt-2  flex hover:bg-gray-100 hover:text-gray-800 cursor-pointer border-b border-red-800 shadow-lg">
								<p><i class="fas fa-user-cog"></i></p>
								<p class="ml-2"> Logout</p>
							</div>
						</a>
				</div>
			</div>
			
			<div class="h-200 w-full px-16 mt-8 flex-wrap items-center justify-center">
				
			<table class="w-full" cellspacing="10">
			<p class="font-bold">Sms List</p>
					<tr class="bg-gray-900 text-white p-2 border-b border-gray-900 rounded-r-md rounded-l-md" colspan="6">
						<th class="p-2">  ID </th>
						<th class="p-2"> Phone_Number </th>
						<th class="p-2"> Message</th>
						<th class="p-2"> Status </th>
                        <th class="p-2"> Resend </th>
					
					</tr>
                    <tr class=" text-gray-900 p-2 border-b border-gray-900 rounded-r-md rounded-l-md" colspan="6">
						<th class="p-2">  ID1 </th>
						<th class="p-2"> Phone_Number1 </th>
						<th class="p-2"> Message1</th>
						<th class="p-2"> Status1</th>
                        <th class="p-2" colspan="2">resend </th>	
					</tr>