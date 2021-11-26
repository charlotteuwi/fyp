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

<div class="flex-wrap">
			<div class="h-200 w-3/4 p-2">
				<div class="flex-wrap w-1/3 items-center justify-center">
					<a href="add-company-contract.php">
						<div class="items-center justify-center hover:bg-red-800  flex px-10 py-30 bg-gray-900 h-20 rounded text-white">
							Add Company Contract
						</div>
					</a>
					<a href="add-employee-contract.php">
						<div class="flex items-center justify-center hover:bg-red-800 mt-2 px-10 py-30 bg-gray-900 h-20 rounded text-white">
							Add Employee Contract
						
						</div>
					</a>
				</div>
			</div>

			<div class="h-200 w-full py-8 mt-32 flex items-center justify-center">
                        <table class="w-full" cellspacing="10" border="2">
<<<<<<< HEAD
                            <tr class="bg-gray-900 text-white p-2 border-b border-gray-900 rounded-r-md rounded-l-md" colspan="4">
=======
                            <tr class="bg-gray-900 text-white p-2 border-b border-gray-900 rounded-r-md rounded-l-md" colspan="3">
>>>>>>> b95e34479b7dbfcc8e6ca83211a53c1a734e2e5f
                                <th class="p-2"> Id </th>
                                <th class="p-2"> Contract ID </th>
                                <th class="p-2"> Company Name </th>
                                <th class="p-2"> Rem .Days </th>
<<<<<<< HEAD
								<th class="p-2"> Status </th>
                                <th class="p-2"> Actions </th> 
=======
                                <th class="p-2" colspan="2"> Actions </th>
>>>>>>> b95e34479b7dbfcc8e6ca83211a53c1a734e2e5f
                            </tr>

                            <?php
                            include_once('../resources/connection.php');

<<<<<<< HEAD
                            $query = "SELECT id, contract_id ,company_name, end_date,status from companycontracts"; // Fetch all the records from the table address
=======
                            $query = "SELECT id, contract_id ,company_name, end_date from companycontracts"; // Fetch all the records from the table address
>>>>>>> b95e34479b7dbfcc8e6ca83211a53c1a734e2e5f
                            $result = mysqli_query($con, $query);

                            while ($array = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <td><?php echo $array['id']; ?></td>
                                    <td><?php echo $array[1]; ?></td>
                                    <td><?php echo $array[2]; ?></td>
                                    <td><?php echo $array[3]; ?></td>
<<<<<<< HEAD
									<td><?php echo $array[4]; ?></td>
                                    <td ><a href="update-company-contract-form.php?id=<?php echo $array['id']; ?>"><i class="fas fa-user-edit"></i></a></td>
                                    
=======
                                    <td><a href=\"editart.php?id=$row[id]\">edit</a></td>
                                    <td><a href=\"deleteart.php?id=$row[id]\"onClick=\"return (are you sure want to)\">delete</td>
>>>>>>> b95e34479b7dbfcc8e6ca83211a53c1a734e2e5f
                                </tr>

                            <?php } ?>
                        </table>
                    </div>
</div>

		</div>
	</div>
</body>

</html>