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
			<div class="flex-wrap mx-80 mt-20">
				<p class="font-bold">Update your info.</p>
				<?php
				//Database Connection
				include_once('../resources/connection.php');

				$id = $_GET['id'];

				$query = "SELECT * FROM companycontracts WHERE id=$id";
				$result = mysqli_query($con, $query);

				while ($array = mysqli_fetch_array($result)) {
				?>


					<form action="company-contract/update.php" method="POST">
						Id<div class="row">
							<div class="col "><input type="text" class="bg-gray-200 form-control" name="id" value="<?php echo $array['id']; ?>" required="true">
							</div>
						</div>
						Company Name<div class="row">
							<div class="col"><input type="text" class=" bg-gray-200 form-control" name="company_name" value="<?php echo $array['company_name']; ?>" required="true">
							</div>
						</div>
						Tin Number<div class="form-group">
							<input type="text" class=" bg-gray-200 form-control" name="tin_number" value="<?php echo $array['tin_number']; ?>" required="true">
						</div>

						Description<div class="form-group">
							<input type="text" class=" bg-gray-200 form-control" name="description" value="<?php echo $array['description']; ?>" required="true">
						</div>
						Manager<div class="form-group">
							<input type="text" class=" bg-gray-200 form-control" name="manager" value="<?php echo $array['manager']; ?>" required="true">
						</div>
						Phone Number<div class="form-group">
							<input type="number" class=" bg-gray-200 form-control" name="phone_number" value="<?php echo $array['phone_number']; ?>" required="true">
						</div>
						Address<div class="form-group">
							<input type="text" class=" bg-gray-200 form-control" name="address" value="<?php echo $array['address']; ?>" required="true">
						</div>
						Start Date<div class="form-group">
							<input type="date" class=" bg-gray-200 form-control" name="start_date" value="<?php echo $array['start_date']; ?>" required="true">
						</div>
						End Date<div class="form-group">
							<input type="date" class=" bg-gray-200 form-control" name="end_date" value="<?php echo $array['end_date']; ?>" required="true">
						</div>
						Isco Supervisor<div class="form-group">
							<input type="text" class=" bg-gray-200 form-control" name="isco_supervisor" value="<?php echo $array['isco_supervisor']; ?>" required="true">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-lg btn-block" name="update">Update</button>
						</div>
					</form>


				<?php
				} ?>
			</div>
		</div>
		</div>
</body>

</html>