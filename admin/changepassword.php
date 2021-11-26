<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.php?msg=You are not logged in');
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
			<div> <img class="h-12" src="../resources/img/logo.png"> </div>
		</div>
		<!-----navigations & contents -->
		<div class="flex">
			<div class="bg-gray-900 w-1/4 py-10 ">
				<div class="text-gray-100 font-light flex-wrap gap-1/2">
					<a href="index.php">
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

					<a href="#">
						<div class="py-4 px-5 bg-gray-800 text-white mt-2 flex hover:bg-gray-100 hover:text-gray-800 
		        cusror-pointer border-b border-red-800 shadow-lg">
							<p><i class="fas fa-file-alt"></i> Reports</p>
						</div>
					</a>
					<a href="view_request.php">
						<div class="py-4 px-5 bg-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 
			        cusror-pointer border-b border-red-800 shadow-lg">
							<p><i class="fas fa-comments"></i> Requests </p>
						</div>
					</a>

					<a href="changepassword.php">
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
			<div class="h-200 w-3/4 p-2">
				<div class="flex-wrap w-full items-center justify-center">
					<div class="w-full items-center text-center p-4 font-bold text-lg">Change Password</div>
					<div id="notification" class="flex items-center justify-center w-full text-center">
						<div id="message" class="bg-gred-600 w-3/4 text-white rounded px-2 text-xs items-center justify-center">
						</div>
					</div>
					<?php
					//session_start();

					if (isset($_POST["submit"])) {
						if ($_SESSION["loggedin"] == "admin" || $_POST["user"] == "admin") {
							$query = mysqli_query($con, "UPDATE users SET password='$_POST[nwpswrd]' WHERE id ='$_POST[id]' and password='$_POST[oldpswrd]'");
							if ($query) {
								$msgpass = "<b><font color='#009900'>Password updated successfully</font></b>";
							} else {
								$msgpass = "<b><font color='#FF0000'>Failed to update password</font></b>";
							}
						} else {
							$msgpass = "<b><font color='#FF0000'>Failed to update password</font></b>";
						}
					}

					?>
					<script type="application/javascript">
						function validation() {
							if (document.form1.user.value == "") {
								alert("Select User Type");
								document.form1.user.focus();
								return false;
							}
							if (document.form1.id.value == "") {
								alert("Enter Login ID");
								document.form1.id.focus();
								return false;
							}
							if (document.form1.oldpswrd.value == "") {
								alert("Enter Old Password");
								document.form1.oldpswrd.focus();
								return false;
							}
							if (document.form1.nwpswrd.value == "") {
								alert("Enter New Password");
								document.form1.nwpswrd.focus();
								return false;
							}
							if (document.form1.nwpswrd.value.length < 8 || document.form1.nwpswrd.value.length > 15) {
								alert("minimum charaters for password is 8 and maximum character is 15");
								document.form1.nwpswrd.focus();

								return false;
							}
							if (document.form1.cpswrd.value == "") {
								alert("Confirm the new Password");
								document.form1.cpswrd.focus();
								return false;
							}
							if (document.form1.nwpswrd.value != document.form1.cpswrd.value) {
								alert("Password not matching...");
								return false;
							}

						}
					</script>

					<form id="form1" name="form1" method="post" action="" onSubmit="return validation()">
						<table width="458" height="241">
							<tr>
								<?php
								if ($_SESSION["loggedin"] == 'Adminstraction') {
								?>
								<?php
								} else {
									echo "<input type='hidden' name='user' is='user' value='admin'>";
								}
								?>
								<?php
								if ($_SESSION["loggedin"] == 'admin') {
								?>
									<input class="right" hidden name="id" type="text" id="id" size="50" value="<?php echo $_SESSION['id'] ?>" />
								<?php
								}
								?>
								<div class=" h-56 mx-32 items-center bg-gray-900 w-6/12 focus:outline-none border border-gray-400 rounded-xl rounded-r-xl">
									<div class="flex-wrap mt-10 w-full">
										<form action="change_password.php" method="POST">
											<div class="flex w-full">
												<label class="ml-6 w-1/3 text-bold text-white text-1xl">Old Password</label>
												<input type="password" name="oldpswrd" id="oldpswrd" class="mx-4 w-2/3 text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-8 w-6/12">
											</div>

											<div class="flex mt-3 w-full">
												<label class="ml-6 w-1/3 text-bold text-white text-1xl">New Password</label>
												<input type="password" name="nwpswrd" id="nwpswrd" class="mx-4 w-2/3 text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-8 w-6/12">
											</div>

											<div class="flex mt-3 w-full">
												<label class="ml-6 w-1/3 text-bold text-white text-1xl">Confirm Password</label>
												<input type="password" name="cpswrd" id="cpswrd" class="mx-4 w-2/3 text-align bg-white text-center focus:outline-none border border-gray-400 rounded-md h-8 w-6/12">
											</div>

											<input type="submit" name="submit" value="Change Password" class="mx-20 mt-3 py-0 font-bold text-align text-1xl text-white  bg-red-900 text-items-center focus:outline-none border border-gray-600 rounded-full h-8 w-8/12 hover:bg-red-600 hover:text-black shad focus:outline-none">

										</form>
									</div>

								</div>
				</div>
			</div>
</body>

</html>