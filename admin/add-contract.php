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
					<a href="">
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

			<div class="flex-wrap w-3/4">
				<div class="w-full p-2 flex items-center justify-center">
					<div class="flex w-full items-center justify-center">
						<a href="add-company-contract.php">
							<div class="items-center justify-center hover:bg-red-800  flex px-10 py-30 bg-gray-900 h-20 rounded text-white">
								Add Company Contract
							</div>
						</a>
						<a href="add-employee-contract.php">
							<div class="flex items-center justify-center hover:bg-red-800 ml-2 px-10 py-30 bg-gray-900 h-20 rounded text-white">
								Add Employee Contract
							</div>
						</a>
					</div>
				</div>
				<div class="flex w-full">
				<div style="height: 440px; overflow-y: scroll;" class="w-full bg-white px-4 flex-wrap items-center justify-center">
					<table class="w-full" cellspacing="10">
						<tr class="sticky top-0 bg-gray-900 text-white border-b border-gray-900 rounded-r-md rounded-l-md" colspan="4">
							<th class="p-2"> Id </th>
							<th class="p-2"> Contract ID </th>
							<th class="p-2"> Company Name </th>
							<th class="p-2"> Rem .Days </th>
							<th class="p-2"> Status </th>
							<th class="p-2"> Actions </th>
						</tr>

						<?php
						include_once('../resources/connection.php');

						function dateDifference($date1, $date2)
						{
							$date1_ts = strtotime($date1);
							$date2_ts = strtotime($date2);
							$diff = $date2_ts - $date1_ts;
							return round($diff / 86400);
						}

						$query = "SELECT id, contract_id ,company_name, end_date,status, phone_number from companycontracts"; // Fetch all the records from the table address
						$result = mysqli_query($con, $query);

						while ($array = mysqli_fetch_array($result)) {
						?>
							<tr>
								<td class="p-2"><?php echo $array['id']; ?></td>
								<td class="p-2"><?php echo $array[1]; ?></td>
								<td class="p-2"><?php echo $array[2]; ?></td>
								<?php
								$date1 = date('Y-m-d');
								$date2 = $array[3];

								$dateDiff =  dateDifference($date1, $date2);

								if ($dateDiff < 0) {
									$contractColor = "bg-red-500 font-bold text-gray-900 p-2";
								} else if ($dateDiff < 7) {
									$contractColor = "bg-yellow-500 font-bold text-gray-900 p-2";
								} else {
									$contractColor = "bg-green-500 font-bold text-gray-900 p-2";
								}
								?>
								<td class="<?php echo $contractColor ?>">
									<?php echo $dateDiff; ?>
								</td>
								</td>
								<td class="p-2"><?php echo $array[4]; ?></td>
								<td class="p-2">
									<a href="update-company-contract-form.php?id=<?php echo $array['id']; ?>">
										<i class="fas fa-user-edit"></i>
									</a>
									<a href="sms-notification.php?phone=<?php echo $array[5]; ?>&days=<?php echo $dateDiff ?>&name=<?php echo $array[2]; ?>">
										<i class="fas fa-sms"></i>
									</a>
								</td>
							</tr>

						<?php } ?>
					</table>
				</div>
				<div style="height: 440px; overflow-y: scroll;" class="w-full bg-white px-4 flex-wrap items-center justify-center">
					<table class="w-full" cellspacing="10">
						<tr class="sticky top-0 bg-gray-900 text-white p-2 border-b border-gray-900 rounded-r-md rounded-l-md" colspan="4">
							<th class="p-2"> Id </th>
							<th class="p-2"> Contract ID </th>
							<th class="p-2"> Company Name </th>
							<th class="p-2"> Rem .Days </th>
							<th class="p-2"> Status </th>
							<th class="p-2"> Actions </th>
						</tr>

						<?php
						include_once('../resources/connection.php');

						$query = "SELECT id, contract_id ,employee_name, end_date,status,phone_number from usercontracts"; // Fetch all the records from the table address
						$result = mysqli_query($con, $query);

						while ($array = mysqli_fetch_array($result)) {
						?>
							<tr>
								<td class="p-2"><?php echo $array['id']; ?></td>
								<td class="p-2"><?php echo $array[1]; ?></td>
								<td class="p-2"><?php echo $array[2]; ?></td>
								<?php
								$date1 = date('Y-m-d');
								$date2 = $array[3];

								$dateDiff =  dateDifference($date1, $date2);
								if ($dateDiff < 0) {
									$contractColor = "bg-red-500 font-bold text-gray-900 p-2";
								} else if ($dateDiff < 7) {
									$contractColor = "bg-yellow-500 font-bold text-gray-900 p-2";
								} else {
									$contractColor = "bg-green-500 font-bold text-gray-900 p-2";
								}
								?>
								<td class="<?php echo $contractColor ?>">
									<?php echo $dateDiff; ?>
								</td>
								</td>
								<td class="p-2"><?php echo $array[4]; ?></td>
								<td class="p-2">
									<a href="update-company-contract-form.php?id=<?php echo $array['id']; ?>">
										<i class="fas fa-user-edit"></i>
									</a>
									<a href="sms-notification.php?phone=<?php echo $array[5]; ?>&days=<?php echo $dateDiff ?>&name=<?php echo $array[2]; ?>">
										<i class="fas fa-sms"></i>
									</a>
								</td>
							</tr>

						<?php } ?>
					</table>
				</div>

				</div>
			</div>

		</div>
	</div>
</body>

</html>