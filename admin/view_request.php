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
			<div class="bg-gray-900 h-200 w-1/6 py-10">
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
					<a href="sms-list.php">
						<div class="py-4 px-5 bg-gray-800 text-white mt-2 flex hover:bg-white hover:text-gray-800 cursor-pointer border-b border-red-800 shadow-lg">
							<p><i class="fas fa-file-signature"></i></p>
							<p class="ml-2"> SMS List </p>
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
			<!--Contents-->
			<div class="flex-wrap w-5/6">
				<div class="w-full px-4 mt-4 flex-wrap items-center justify-center">

					<table class="w-full rounded shadow">
						<tr class="text-left text-xs p-2 border-b border-gray-900 rounded-r-md rounded-l-md">
							<th class="p-2 text-center bg-red-700 text-white" colspan="11"> Pending Requests </th>
						</tr>
						<tr class="text-left text-xs p-2 border-b border-gray-900 rounded-r-md rounded-l-md">
							<th class="p-2"> Contract ID </th>
							<th class="p-2"> Manager </th>
							<th class="p-2"> Phone Number </th>
							<th class="p-2"> Actions</th>
							<th class="p-2"> User Reason </th>
							<th class="p-2"> Status </th>
							<th class="p-2"> Admin Reason</th>
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

								<input type="hidden" name="contract_id" value="<?php echo $array[1]; //contract_id
																				?>">
								<input type="hidden" name="manager" value="<?php echo $array[2]; //Manager
																			?>">
								<input type="hidden" name="phone_number" value="<?php echo $array[3]; //Phone Number 
																				?>">
								<input type="hidden" name="action" value="<?php echo $array[4]; //action 
																			?>">
								<input type="hidden" name="user_reason" value="<?php echo $array[5]; //User Reason 
																				?>">
								<input type="hidden" name="status" value="<?php echo $array[6]; //status
																			?>">
								<input type="hidden" name="date" value="<?php echo $array[7]; //date
																		?>">
								<input type="hidden" name="usertype" value="<?php echo $array[8]; //Request Type
																			?>">
								<tr class="text-xs text-left">
									<td class="p-2 ">
										<p class="bg-green-600 rounded p-1 text-white"><?php echo $array[1]; //contract_id; 
																						?></p>
									</td>
									<td class="p-2"><?php echo $array[2]; //manager
													?></td>
									<td class="p-2"><?php echo $array[3]; //phone_number
													?></td>
									<td class="p-2"><?php echo $array[4]; //action
													?></td>

									<td class="p-2"><?php echo $array[5]; //User Reason
													?></td>

									<td class="p-2">
										<p class="p-1 bg-yellow-600 text-white rounded"><?php if ($array[6] == 'pending') {
																							echo "Pending";
																						} //status
																						?></p>
									</td>
									<td class="p-2"><textarea required class="rounded border border-green-600 shadow focus:outline-none px-2 py-1" name="admin_reason" id=""></textarea></td>

									<td class="p-2"><?php echo $array[7]; //Admin Reason
													?></td>
									<td class="p-2"><?php echo $array[8]; //Date
													?></td>
									<td class="p-2"><button class="bg-green-600 text-white p-2 rounded" type="submit" name="approve" value="">Approve</button></td>
									<td class="p-2"><button class="bg-red-600 text-white p-2 rounded" type="submit" name="reject" value="">Reject</button></td>
								</tr>

							</form>

				</div>
			</div>


		<?php
						}
		?>
		</div>


	</div>

	<div class="h-200 w-full py-8 mt-2 flex items-center justify-center">
		<table class="w-full mt-4 rounded shadow">
			<th class="bg-green-600 text-xs p-2 text-white w-full text-center" colspan="10">Approved Requests</th>
			<tr class="bg-white text-left text-gray-900 text-xs p-2 border-b border-gray-900 rounded-r-md rounded-l-md" colspan="6">
				<th class="p-2"> Contract ID </th>
				<th class="p-2"> Manager </th>
				<th class="p-2"> Phone Number </th>
				<th class="p-2"> Actions</th>
				<th class="p-2"> User Reason </th>
				<th class="p-2"> Status </th>
				<th class="p-2"> Admin Reason </th>
				<th class="p-2"> Date </th>
			</tr>

			<?php
			include_once('../resources/connection.php');

			$query = "SELECT * from requestsanswers"; // Fetch all the records from the table address
			$result = mysqli_query($con, $query);

			while ($array = mysqli_fetch_array($result)) { ?>

				<form method="POST" action="request/update.php">

					<input type="hidden" name="contract_id" value="<?php echo $array[1];
																	?>">
					<input type="hidden" name="manager" value="<?php echo $array[2];
																?>">
					<input type="hidden" name="phone_number" value="<?php echo $array[3];
																	?>">
					<input type="hidden" name="action" value="<?php echo $array[4];
																?>">
					<input type="hidden" name="status" value="<?php echo $array[5];
																?>">
					<input type="hidden" name="date" value="<?php echo $array[6];
															?>">
					<input type="hidden" name="date" value="<?php echo $array[7];
															?>">

					<tr class="text-xs">
						<td class="p-2"><?php echo $array[1];
										?></td>
						<td class="p-2"><?php echo $array[2];
										?></td>
						<td class="p-2"><?php echo $array[3];
										?></td>
						<td class="p-2"><?php echo $array[4];
										?></td>

						<td class="p-2 "><?php echo $array[5];
											?></td>
						<?php
						// Use green color for Approved and Red for Rejected
						$statusName = '';
						$colorClass = '';
						if ($array[7] == 'approved') {
							$colorClass = 'rounded bg-green-600 text-white';
							$statusName = 'Approved';
						} elseif ($array[7] == 'Rejected') {
							$colorClass = 'rounded bg-red-600 text-white';
							$statusName = 'Rejected';
						}
						?>
						<td class="p-2">
							<p class="p-1  <?php echo $colorClass; ?>"><?php echo $statusName;
																		?></p>
						</td>
						<td class="p-2"><?php echo $array[6];
										?></td>
						<td class="p-2"><?php echo $array[8];
										?></td>
					</tr>

				</form>

	</div>
<?php
			}
?>
</div>
</div>
</div>
</boby>

</html>