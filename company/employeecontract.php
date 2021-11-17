<!DOCTYPE html>
		<html>
			<head>
				<meta charset="utf-8">
				<title>Mini Dashboard</title>
				<link href="../css/tailwind.css" rel="stylesheet">
				<link href="../fontawesome/css/all.css" rel="stylesheet">
			</head>
			<body class="bg-gray-100">
				<div>
					<!--Header Area-->
					<div class="flex items-center justify-between text-2xl w-full bg-white h-16 px-4 py-2  shadow">
					 	<div class="font-bold"> E-Contracts </div> 
					 	<div class="font-light"> Admin </div>
					 	<div> <img class="h-12" src="../img/logo.png"> </div>
					</div>
					<!-- Navigations & Contents -->		
					<div class="flex">
						<div class="bg-gray-900 h-200 w-1/4 py-10">
							<div class="text-gray-100 font-light flex-wrap gap-1">

								<a href="adminpage.php">
									<div class="py-4 px-5 bg-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 cursor-pointer border-b border-red-800 shadow-lg">
										<p><i class="fas fa-tachometer-alt"></i></p>
										<p class="ml-2"> Dashboard</p>
									</div>
								</a>

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
			        	         <p><i class="fas fa-comments"></i> Comments </p>
			                    </div> 
		    	                </a>
								<a href="Settings.php">
								<div class="py-4 px-5 bg-gray-800 text-white mt-2  flex hover:bg-gray-100 hover:text-gray-800 cursor-pointer border-b border-red-800 shadow-lg">
									<p><i class="fas fa-user-cog"></i></p>
									<p class="ml-2"> Settings</p>
								</div>
								</a>
							</div>
							</div>
						<div class="h-200 w-3/4 p-2">
				<div class="flex-wrap w-full items-center justify-center">					
					<div class="flex justify-between border-b border-gray-900 bg-red-600 rounded-lg px-2 py-4 w-3/4 text-white">
						<a href=""> Form to Add new Employee
						 </a>
						 <button class=" bg-red-600 rounded px-4 py-1 w-100 text-white"><a href="../choose.php">BACK </a></button>
						
					</div>
							</div>

								<div class="w-3/4 bg-gray-400 rounded-r border-l border-red-600 p-4">
									<div class="flex p-4">
								<div class="w-3/4 bg-blue-200 rounded-l border-r  p-4">
									Employee Form
									<form action="employeecontractinsert.php" method="POST" enctype="multipart/form-data">
										
											<div class="w-full mt-2">
												<input class="w-full shadow rounded px-1 py-2" type="text" name="contract_id"required="" readonly id="contract_id">
											</div>
											<div class="w-full mt-2">
												<input class="w-full shadow rounded px-1 py-2" type="text" name="client_name" required="" placeholder="Client name">
											</div>
											<div class="w-full mt-2">
												<input class="w-full shadow rounded px-1 py-2" type="number" name="phone" required="" minlength="12" min="2507200000" placeholder="0700000000">
											</div>
											<div class="w-full mt-2">
												    <input class="w-full shadow rounded px-1 py-2" type="text" name="address" required="" placeholder="Address">
											  </div>
											  
												<hr class="bg-gray-200 w-full m-4" />
												<div class="w-full mt-2">
												<input class="w-full shadow rounded px-1 py-2" type="text" name="contract_value" required="" placeholder="Contract value">
											</div>
																						
										
											<div class="w-full flex gap-2 mt-2">
												<input class="w-1/2 shadow rounded px-1 py-2" type="date" name="start_date" required="" placeholder="State_date">
												<input class="w-1/2 shadow rounded px-1 py-2" type="date" name="end_date" required="" placeholder="End_date">
											</div>
											<div class="w-full mt-2">
												<input class="w-full shadow rounded px-1 py-2" type="text" name="cancallation_notice" required="" placeholder="Cancallation Notice (15days/30days)">
											</div><br>
											<div>
											<input type="file" name="photo" id="file">
									
											</div>
										 <div class="w-full mt-2">
												 <div class="w-full items-center text-center mt-8">
           											 <input class="w-full shadow rounded px-1 py-2" type="submit" name="save" value="submit" class="border-b border-white bg-red-600 rounded-full w-64 px-4 py-1 text-white mt-4"">
           											</div>
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
