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
					<a href="sms-list.php">
						<div class="py-4 px-5 bg-white text-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 cursor-pointer border-b border-red-800 shadow-lg">
							<p><i class="fas fa-sms"></i></p>
							<p class="ml-2"> SMS List </p>
						</div>
					</a>
					<a href="view_request.php">
						<div class="py-4 px-5 bg-gray-800 text-white mt-2 flex hover:bg-white hover:text-gray-800 
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

			<div style="height: 474px; overflow-y: scroll;" class="text-xs h-200 w-3/4 px-16 mt-8 flex-wrap items-center justify-center">

				<table  class="w-full" cellspacing="10">
					<tr class="font-bold text-xl text-center text-gray-200 text-shadow rounded-tr-lg rounded-tl-lg bg-red-600 font-white p-3 w-full"><td colspan="5"> SMS Management </td></tr>
					<tr class="sticky top-0 bg-gray-900 text-white p-2 border-b border-gray-900 rounded-r-md rounded-l-md">
						<th class="p-2"> ID </th>
						<th class="p-2"> Phone_Number </th>
						<th class="p-2"> Message</th>
						<th class="p-2"> Status </th>
						<th class="p-2"> Resend </th>

					</tr>
					<?php
						include_once('../resources/connection.php');

						$query = "SELECT * from smsnotification"; // Fetch all the records from the table address
						$result = mysqli_query($con, $query);

						while ($array = mysqli_fetch_array($result)) {
						?>
							<tr class=" text-gray-900 p-2 border-b border-gray-900 rounded-r-md rounded-l-md">
								<td class="p-2"><?php echo $array['id']; ?></td>
								<td class="p-2"><?php echo $array['phone_number']; ?></td>
								<td class="p-2"><?php echo $array['message']; ?></td>
									<?php
										$messageStatusColor = '';

										if($array['status'] == "Sent"){
											$messageStatusColor = "bg-green-600 text-white text-center w-16 py-1 px-2 rounded-lg";
										} else {
											$messageStatusColor = "bg-red-600 text-white text-center w-16 py-1 px-2 rounded-lg";
										}
									?>
								<td class="p-2"><p class="<?php echo $messageStatusColor; ?>"><?php echo $array['status']; ?></p></td>
								<td class="p-2"> <a href="re-send-sms.php?phone=<?php echo $array['phone_number']; ?>&message=<?php echo $array['message']; ?>" class="bg-green-600 text-white py-1 px-2 rounded-lg ">Resend</a>									
							</tr>

						<?php } ?>
				</table>
			</div>
		</div>
	</div>
</body>

</html>