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
			<div>
				<?php 
				$id = $_GET['id'];
				$query = "SELECT * FROM usercontracts WHERE id=$id";
				$result = mysqli_query($con, $query);
           
				if ($result->num_rows > 0) {
				   while($row = $result->fetch_assoc()) {
					?>
						<form action="employee-contract/update.php" method="POST">
							<div class="row">
								<div class="col "><input type="text" class="bg-gray-400 form-control" name="id" value="<?php echo $row['id']; ?>" required="true">
								</div>
							</div>
							<div class="row">
								<div class="col"><input type="text" class="form-control" name="employee_name" value="<?php echo $row['employee_name']; ?>" required="true">
								</div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="phone_number" value="<?php echo $row['phone_number']; ?>" required="true">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>" required="true">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="description" value="<?php echo $row['description']; ?>" required="true">
							</div>
​
​
							<div class="form-group">
								<input type="date" class="form-control" name="start_date" value="<?php echo $row['start_date']; ?>" required="true">
							</div>
							<div class="form-group">
								<input type="date" class="form-control" name="end_date" value="<?php echo $row['end_date']; ?>" required="true">
							</div>
​
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-lg btn-block" name="update">Update</button>
							</div>
						</form>
​
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