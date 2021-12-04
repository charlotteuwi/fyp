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
						<div class="py-4 px-5 bg-white text-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 cursor-pointer border-b border-red-800 shadow-lg">
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
							<div class="py-4 px-5 bg-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 
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
			<p class="font-bold">Pending Requests</p>
					<tr class="bg-gray-900 text-white p-2 border-b border-gray-900 rounded-r-md rounded-l-md" colspan="6">
						<th class="p-2"> Contract ID </th>
						<th class="p-2"> Manager </th>
						<th class="p-2"> Phone_Number </th>
						<th class="p-2"> Actions</th>
						<th class="p-2"> Status </th>
						<th class="p-2"> Date </th>
						<th class="p-2"> Request Type </th>
						<th class="p-2" colspan="2"> Response </th>
					</tr>

					<?php
					include_once('../resources/connection.php');

					$query = "SELECT * from requests"; // Fetch all the records from the table address
					$result = mysqli_query($con, $query);

					while ($array = mysqli_fetch_array($result)) { ?>

						<form method="POST" action="request/update.php">

							<input type="hidden" name="contract_id" value="<?php echo $array[1]; //contract_id?>">
							<input type="hidden" name="manager" value="<?php echo $array[2]; //Manager?>">
							<input type="hidden" name="phone_number" value="<?php echo $array[3]; //Phone Number ?>">
							<input type="hidden" name="action" value="<?php echo $array[4]; //action ?>">
							<input type="hidden" name="status" value="<?php echo $array[5]; //status?>">
							<input type="hidden" name="date" value="<?php echo $array[6]; //date?>">
							<input type="hidden" name="usertype" value="<?php echo $array[7]; //Request Type?>">
							<tr>
								<td><?php echo $array[1]; //contract_id; ?></td>
								<td><?php echo $array[2]; //manager?></td>
								<td><?php echo $array[3]; //phone_number?></td>
								<td><?php echo $array[4]; //action?></td>
								<td><?php echo $array[5]; //status?></td>
								<td><?php echo $array[6]; //date?></td>
								<td><?php echo $array[7]; //Request Type?></td>
								<td><button type="submit" name="approve" value="">Approve</button></td>
								<td><button type="submit" name="reject" value="">Reject</button></td>
							</tr>

						</form>

			</div>
		<?php
					}
		?>
		</div>


	</div>

	<div class="h-200 w-full py-8 mt-2 flex items-center justify-center">
		<table class="w-full" cellspacing="10">
		<p class="font-bold">approved Requests</p>
			<tr class="bg-gray-900 text-white p-2 border-b border-gray-900 rounded-r-md rounded-l-md" colspan="6">
				<th class="p-2"> Contract ID </th>
				<th class="p-2"> Manager </th>
				<th class="p-2"> Phone_Number </th>
				<th class="p-2"> Actions</th>
				<th class="p-2"> Status </th>
				<th class="p-2"> Date </th>
			</tr>

			<?php
			include_once('../resources/connection.php');

			$query = "SELECT * from requestsanswers"; // Fetch all the records from the table address
			$result = mysqli_query($con, $query);

			while ($array = mysqli_fetch_array($result)) { ?>

				<form method="POST" action="request/update.php">

					<input type="hidden" name="contract_id" value="<?php echo $array[1] //contract_id; 
																	?>">
					<input type="hidden" name="manager" value="<?php echo $array[2] //contract_id; 
																?>">
					<input type="hidden" name="phone_number" value="<?php echo $array[3] //contract_id; 
																	?>">
					<input type="hidden" name="action" value="<?php echo $array[4] //contract_id; 
																?>">
					<input type="hidden" name="status" value="<?php echo $array[5] //contract_id; 
																?>">
					<input type="hidden" name="date" value="<?php echo $array[6] //contract_id; 
															?>">
					<tr>
						<td><?php echo $array[1] //contract_id; 
							?></td>
						<td><?php echo $array[2]; //manager
							?></td>
						<td><?php echo $array[3]; //phone_number
							?></td>
						<td><?php echo $array[4]; //action
							?></td>
						<td><?php echo $array[5]; //status
							?></td>
						<td><?php echo $array[6]; //date
							?></td>
					</tr>

				</form>

	</div>
<?php
			}
?>
</div>
</div>

</boby>

</html>