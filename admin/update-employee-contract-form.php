<?php
include_once("../resources/connection.php");

?>
<!DOCTYPE html>
<html>
​

<head>
	<meta charset="utf-8">
	<title>Mini Dashboard</title>
	<link href="../resources/css/tailwind.css" rel="stylesheet">
	<link href="../resources/fontawesome/css/all.css" rel="stylesheet">
</head>
​

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
					​
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
						<a href="#">
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
			<div class="p-8 w-full flex items-center justify-center bg-gray-300">
				<div class="flex-wrap w-1/2 rounded bg-white shadow items-center justify-center text-xs">
				<Div class=" bg-red-600 rounded px-4 py-1 w-100 text-white">
						<a href="add-contract.php">
							<<< BACK </a>
					</div>
					<div class="font-bold bg-gray-900 w-full p-4 text-medium text-white text-center">Update Employee Information</div>
					<?php
					$id = $_GET['id'];
					$query = "SELECT * FROM usercontracts WHERE id=$id";
					$result = mysqli_query($con, $query);

					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
					?>
							<form action="employee-contract/update.php" method="POST">
								<div class="w-full items-center justify-center flex gap-3 p-2 border-b border-red-600">
									<div class="w-1/2">ID</div>
									<div class="w-1/2"><input class="p-2 bg-gray-100 border border-gray-900 rounded focus:outline-none" type="text" readonly class="bg-gray-200 form-control" name="id" value="<?php echo $row['id']; ?>" required="true"></div>
								</div>

								<div class="w-full items-center justify-left flex gap-3 p-2 border-b border-red-600">
									<div class="w-1/2">Employee Name</div>
									<div class="w-1/2"><input class="p-2 bg-gray-100 border border-gray-900 rounded focus:outline-none" type="text" class=" bg-gray-200 form-control" name="employee_name" value="<?php echo $row['employee_name']; ?>" required="true"></div>
								</div>

								<div class="w-full items-center justify-left flex gap-3 p-2 border-b border-red-600">
									<div class="w-1/2">Phone Number</div>
									<div class="w-1/2"><input class="p-2 bg-gray-100 border border-gray-900 rounded focus:outline-none" type="text" class=" bg-gray-200 form-control" name="phone_number" value="<?php echo $row['phone_number']; ?>" required="true"></div>
								</div>

								<div class="w-full items-center justify-left flex gap-3 p-2 border-b border-red-600">
									<div class="w-1/2">Address</div>
									<div class="w-1/2"><input class="p-2 bg-gray-100 border border-gray-900 rounded focus:outline-none" type="text" class=" bg-gray-200 form-control" name="address" required value="<?php echo $row['address']; ?>"></div>
								</div>

								<div class="w-full items-center justify-left flex gap-3 p-2 border-b border-red-600">
									<div class="w-1/2">Description</div>
									<div class="w-1/2"><input class="p-2 bg-gray-100 border border-gray-900 rounded focus:outline-none" type="text" class=" bg-gray-200 form-control" name="description" value="<?php echo $row['description']; ?>" required="true"></div>
								</div>

								<div class="w-full items-center justify-left flex gap-3 p-2 border-b border-red-600">
									<div class="w-1/2">Start Date</div>
									<div class="w-1/2"><input class="p-2 bg-gray-100 border border-gray-900 rounded focus:outline-none" type="date" class=" bg-gray-200 form-control" name="start_date" value="<?php echo $row['start_date']; ?>" required="true"></div>
								</div>

								<div class="w-full items-center justify-left flex gap-3 p-2 border-b border-red-600">
									<div class="w-1/2">End Date</div>
									<div class="w-1/2"><input class="p-2 bg-gray-100 border border-gray-900 rounded focus:outline-none" type="date" class=" bg-gray-200 form-control" name="end_date" value="<?php echo $row['end_date']; ?>" required="true"></div>
								</div>

								<div class="w-full items-center justify-left flex gap-3 p-2 border-b border-red-600">
									<button type="submit" class="bg-green-600 text-white rounded shadow w-full px-4 py-2" name="update">Update Informatioon</button>
								</div>
							</form>
							​
				</div>
			</div>
			​
		<?php
						} ?>
		</div>
	</div>

<?php
					} else {
						printf('No record found.<br />');
					}

?>
</div>
</div>
</div>
</body>

</html>