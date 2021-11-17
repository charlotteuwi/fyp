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
                  <a href="choose.php">
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
					<div class="flex justify-between border-b border-gray-900 bg-red-600 rounded-lg px-2 py-4 w-full text-white">
						<a href="addnewcontract.php"> Add new contracts on company
						 </a><a href="user/employeecontract.php"> Add New contracts on employee
						 </a>
						
					</div>
                    <div class="h-200 w-full p-2 flex items-center justify-center">
 

	</div>
	
				
				
		
		

</html>
	    