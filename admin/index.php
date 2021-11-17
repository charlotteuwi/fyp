<?php
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
<html>

<head>
	<title>Welcome </title>
	<link href="../resources/css/tailwind.css" rel="stylesheet">
	<link href="../resources/fontawesome/css/all.css" rel="stylesheet">
</head>

<body>
	<div>
		<!----header--->
		<div class=" flex items-center justify-between text-2xl w-full bg-white h-16 py-2 px-4 shadow">
			<div class="font-bold">ECAS </div>
			<div class="font-light"> Admin </div>
			<div> <img class="h-12" src="img/logo.png"> </div>
		</div>
		<!-----navigations & contents -->
		<div class="flex">
			<div class="bg-gray-900 w-1/4 py-10 ">
				<div class="text-gray-100 font-light flex-wrap gap-1/2">
					<a href="adminpage.php">
						<div class="py-4 px-5 bg-white text-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 
				cusror-pointer border-b border-red-800 shadow-lg">
							<p><i class="fas fa-tachometer-alt"></i> Dashboard</p>
						</div>
					</a>
					<a href="add-contract.php">
						<div class="py-4 px-5 bg-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 
			        cusror-pointer border-b border-red-800 shadow-lg">
							<p><i class="fas fa-file-signature"></i> Contracts</p>
						</div>
					</a>

					<div class="py-4 px-5 bg-gray-800 text-white mt-2 flex hover:bg-gray-100 hover:text-gray-800 
		        cusror-pointer border-b border-red-800 shadow-lg">
						<p><i class="fas fa-file-alt"></i> Reports</p>
					</div>
					<a href="#">
						<div class="py-4 px-5 bg-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 
			        cusror-pointer border-b border-red-800 shadow-lg">
							<p><i class="fas fa-comments"></i> Comments </p>
						</div>
					</a>

					<a href="settings.php">
						<div class="py-4 px-5 bg-gray-800 text-white mt-2 flex hover:bg-gray-100 hover:text-gray-800 
					cusror-pointer border-b border-red-800 shadow-lg">
							<p><i class="fas fa-user-cog"></i> Settings</p>
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
			<!-------contents--->

			<div class="bg-gray-200 w-3/4 p-8 text-gray-100">
				<div class="bg-gray-200 flex rounded">
					<div class="flex-wrap p-2 rounded w-1/3">
						<div class="rounded-t p-x1 py-6 bg-gray-900 text-2xl font-bold flex items-center justify-center">
							3000
						</div>
						<div class="rounded-b px-1 py-2 bg-red-600 text-xs flex items-center justify-center">
							All Contracts
						</div>
					</div>
					<div class="flex-wrap p-2 rounded w-1/3 ">
						<div class="rounded-t p-x1 py-6 bg-gray-900 text-2xl font-bold flex items-center justify-center">
							1550
						</div>
						<div class="rounded-b px-1 py-2 bg-red-600 text-xs flex items-center justify-center">
							Active Contracts
						</div>
					</div>
				</div>
				<div class="bg-gray-200 flex rounded">
					<div class="flex-wrap p-2 rounded w-1/3">
						<div class="rounded-t p-x1 py-6 bg-gray-900 text-2xl font-bold flex items-center justify-center">
							3
						</div>
						<div class="rounded-b px-1 py-2 bg-red-600 text-xs flex items-center justify-center">
							canceled
						</div>
					</div>
					<div class="flex-wrap p-2 rounded w-1/3 ">
						<div class="rounded-t p-x1 py-6 bg-gray-900 text-2xl font-bold flex items-center justify-center">
							5
						</div>
						<div class="rounded-b px-1 py-2 bg-red-600 text-xs flex items-center justify-center">
							Expiring this week
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</boby>

</html>