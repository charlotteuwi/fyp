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
		<div class="flex justify-between text-2xl w-full bg-white h-16 px-4 py-2  shadow">
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
						<div class="py-4 px-5 bg-white text-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 cursor-pointer border-b border-red-800 shadow-lg">
							<p><i class="fas fa-file-signature"></i></p>
							<p class="ml-2"> Contracts</p>
						</div>

<<<<<<< HEAD
						<div class="py-4 px-5 bg-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 cursor-pointer border-b border-red-800 shadow-lg">
							<p><i class="fas fa-file-alt"></i></p>
							<p class="ml-2"> Reports</p>
						</div>
						<a href="view_request.php">
							<div class="py-4 px-5 bg-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 
			        cusror-pointer border-b border-red-800 shadow-lg">
								<p><i class="fas fa-comments"></i> Requests </p>
							</div>
						</a>
=======
					<a href="add-contract.php">
						<div class="py-4 px-5 bg-white text-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 cursor-pointer border-b border-red-800 shadow-lg">
							<p><i class="fas fa-file-signature"></i></p>
							<p class="ml-2"> Contracts</p>

						</div>
					</a>
					<div class="py-4 px-5 bg-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 cursor-pointer border-b border-red-800 shadow-lg">
						<p><i class="fas fa-file-alt"></i></p>
						<p class="ml-2"> Reports</p>
					</div>
					<a href="view_request.php">
                            <div class="py-4 px-5 bg-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 
			        cusror-pointer border-b border-red-800 shadow-lg">
                                <p><i class="fas fa-comments"></i> Requests </p>
                            </div>
                        </a>
>>>>>>> 4e579997526905a0036842f76e95fb4fd562c343
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

			<div class="w-full items-center justify-center">
				<div class="flex justify-between border-b border-gray-900 bg-red-600 px-2 py-4 w-full text-white">
					<p class="font-bold">Form to Add New Company contracts </p>
					<Div class=" bg-red-600 rounded px-4 py-1 w-100 text-white">
						<a href="add-contract.php">
							<<< BACK </a>
					</div>
				</div>

				<div class="flex p-4">
					<div class="w-3/4 bg-blue-200 rounded-l border-r border-red-800 p-4">
						<p class="font-bold">Company Information</p>
						<form action="company-contract/insert.php" method="POST" enctype="multipart/form-data">

							<div class="w-3/4 flex-wrap gap-2 bg-blue-200 rounded-l  p-4">

								<div class="w-full mt-2">
									<p class="text-xs mb-1">Company Name</p>
									<input class="w-full  px-2 shadow rounded px-1 py-2" type="text" name="company_name" required="" placeholder="Company Name">
								</div>
								<div class="w-full mt-2">
									<p class="text-xs mb-1">TIN Number</p>
									<input class="w-full px-2 shadow rounded px-1 py-2" type="number" maxlength="12" name="tin_number" required="" placeholder="TIN Number">
								</div>
								<div class="w-full mt-2">
									<p class="text-xs mb-1">Description</p>
									<textarea class="w-full px-2 shadow rounded px-1 py-2" name="description" required="" placeholder="Description"></textarea>
								</div>
								<div class="w-full mt-2">
									<p class="text-xs mb-1">Manager</p>
									<input class="w-full px-2 shadow rounded px-1 py-2" type="text" name="manager" required="" placeholder="Manager">
								</div>
								<div class="w-full mt-2">
									<p class="text-xs mb-1">Phone Number</p>
									<input class="w-full px-2 shadow rounded px-1 py-2" type="text" name="phone_number" required="" required="0700000000" placeholder="0700000000">
								</div>
								<div class="w-full mt-2">
									<p class="text-xs mb-1">Address</p>
									<input class="w-full px-2 shadow rounded px-1 py-2" type="text" name="address" required="" placeholder="Address">
								</div>
							</div>
					</div>
					<div class="w-3/4 bg-blue-200 rounded-r border-l border-red-400 p-4">
						<p class="font-bold">Contract Information</p>
						<div class="w-full mt-2">
							<p class="text-xs mb-1">Contract ID (Auto Generated)</p>
							<input class="w-full shadow rounded px-1 py-2" type="text" name="contract_id" required="" readonly id="contract_id">
						</div>
						<div class="w-full flex gap-2 mt-2">
							<div class="w-full">
								<p class="text-xs mb-1">Start Date</p>
								<input class="w-full shadow rounded px-1 py-2" type="date" name="start_date" required="">
							</div>
							<div class="w-full">
								<p class="text-xs mb-1">End Date</p>
								<input class="w-full shadow rounded px-1 py-2" type="date" name="end_date" required="">
							</div>
						</div>
						<div class="w-full mt-2">
							<p class="text-xs mb-1">Contract Document</p>
							<input type="file" name="document" id="document">
						</div>

						<div class="w-full mt-2">
							<p class="text-xs mb-1">ISCO Supervisor</p>
							<input class="w-full shadow rounded px-1 py-2" type="text" name="isco_supervisor" required="" placeholder="ISCO Supervisor">
						</div>
						<p class="font-bold mt-2">Autentication Information</p>

						<div class="w-full mt-2">
							<p class="text-xs mb-1">Username</p>
							<input class="w-full shadow rounded px-1 py-2" type="text" name="username" required="" placeholder="Username">
						</div>

						<div class="w-full mt-2">
							<p class="text-xs mb-1">Password</p>
							<input class="w-full shadow rounded px-1 py-2" type="password" name="password" required="" placeholder="Password">
						</div>
					</div>

				</div>
				<div class="w-full mt-2 flex items-center justify-center mb-8">
					<input class="w-1/3 rounded-lg text-white bg-red-600 shadow rounded px-1 py-2" type="submit" name="save" value="submit" class="border-b border-gray-900 bg-red-600 rounded-full px-4 py-1 w-64 text-white">
				</div>
				</form>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>

</body>
<script type="text/javascript">
	function makeid(length) {
		var result = '';
		var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		var charactersLength = characters.length;
		for (var i = 0; i < length; i++) {
			result += characters.charAt(Math.floor(Math.random() *
				charactersLength));
		}
		return result;
	}

	document.getElementById('contract_id').value = makeid(9);
</script>

</html>