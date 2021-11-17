		<!DOCTYPE html>
		<html>

		<head>
			<meta charset="utf-8">
			<title>Mini Dashboard</title>
			<link href="css/tailwind.css" rel="stylesheet">
			<link href="fontawesome/css/all.css" rel="stylesheet">
		</head>

		<body class="bg-gray-100">
			<div>
				<!--Header Area-->
				<div class="flex items-center justify-between text-2xl w-full bg-white h-16 px-4 py-2  shadow">
					<div class="font-bold"> E-Contracts </div>
					<div class="font-light"> Admin </div>
					<div> <img class="h-12" src="img/logo.png"> </div>
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
					<div class="w-full items-center justify-center">
						<div class="flex justify-between border-b border-gray-900 bg-red-600 rounded-lg px-2 py-4 w-full text-white">
							<button class=" bg-red-600 rounded px-4 py-1 w-100 text-white">Form to Add New contracts </button>
							<button class=" bg-red-600 rounded px-4 py-1 w-100 text-white"><a href="choose.php">BACK </a></button>

						</div>

						<div class="flex p-4">
							<div class="w-3/4 bg-blue-200 rounded-l border-r border-red-800 p-4">
								Client Information
								<form action="contractinsert.php" method="POST" enctype="multipart/form-data">
									<div class="w-3/4 flex-wrap gap-2 bg-blue-200 rounded-l  p-4">
										<div class="w-full mt-2">
											<input class="w-full shadow rounded px-1 py-2" type="text" name="client_name" required="" placeholder="client_name">
										</div>
										<div class="w-full mt-2">
											<input class="w-full shadow rounded px-1 py-2" type="text" name="tin_number" required="" placeholder="tin_number">
										</div>
										<div class="w-full mt-2">
											<textarea class="w-full shadow rounded px-1 py-2" name="asset_description" required="" placeholder="asset_description"></textarea>
										</div>
										<div class="w-full mt-2">
											<input class="w-full shadow rounded px-1 py-2" type="text" name="representative_client" required="" placeholder="representative_client">
										</div>
										<div class="w-full mt-2">
											<input class="w-full shadow rounded px-1 py-2" type="text" name="phone_client" required="" required="0700000000" placeholder="0700000000">
										</div>
										<div class="w-full mt-2">
											<input class="w-full shadow rounded px-1 py-2" type="text" name="address" required="" placeholder="address">
										</div>
									</div>
							</div>
							<div class="w-3/4 bg-blue-200 rounded-r border-l border-red-400 p-4">
								Contract Information
								<div class="w-full mt-2">
									<input class="w-full shadow rounded px-1 py-2" type="text" name="contract_id" required="" readonly id="contract_id">
								</div>
								<div class="w-full flex gap-2 mt-2">
									<input class="w-1/2 shadow rounded px-1 py-2" type="date" name="start_date" required="" placeholder="state_date">
									<input class="w-1/2 shadow rounded px-1 py-2" type="date" name="end_date" required="" placeholder="end_date">
								</div>
								<div class="w-full mt-2">
									<input class="w-full shadow rounded px-1 py-2" type="text" name="contract_value" required="" placeholder="contract value">
								</div>
								<div class="w-full mt-2">
									<input class="w-full shadow rounded px-1 py-2" type="text" name="cancallation_notice" required="" placeholder="cancallation Notice (15days/30days)">
								</div><br>

								<input type="file" name="photo" id="file">
								<div class="w-full mt-2">
									<input class="w-full shadow rounded px-1 py-2" type="text" name="representative_campany" required="" placeholder="Representative_campany">
								</div>
								<div class="w-full mt-2">
									<input class="w-full shadow rounded px-1 py-2" type="text" name="phone_campany" required="" minlength="12" min="2507200000" placeholder="0700000000">
								</div>
							</div>

						</div>
						<div class="w-full mt-2">
							<input class="w-full shadow rounded px-1 py-2" type="submit" name="save" value="submit" class="border-b border-gray-900 bg-red-600 rounded-full px-4 py-1 w-64 text-white">
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