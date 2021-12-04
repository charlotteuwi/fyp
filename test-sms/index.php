<!DOCTYPE html>
<html>
<head>
	<title>My SMS Platform</title>
	<link href="../resources/css/tailwind.css" rel="stylesheet">
	<link href="../resources/fontawesome/css/all.css" rel="stylesheet">
</head>
<body class="flex justify-center items-center bg-blue-600 p-8 select-none">
	<div class="flex-wrap items-center justify-center bg-blue-500 rounded text-white shadow-lg w-1/3">
		<div class="border-b border-blue-100 shadow p-4 text-center font-bold text-xl"> ECAS SMS App </div>
		<div class="mt-4 bg-white p-8 text-blue-600 rounded-b">
			<form class="flex-wrap" method="POST" action="sms.php">
				<div class="flex-wrap gap-1">
					<p class="text-gray-700 text-sm">Your Phone</p>
					<input class="bg-blue-200 rounded focus:outline-none focus:bg-blue-100 text-blue-900 px-2 py-1 border-b border-blue-600 border-1 w-full" type="text" maxlength="12" placeholder="Phone Number 0700000000" name="number">
				</div>
				<div class="flex-wrap gap-1 mt-4">
					<p class="text-gray-700 text-sm">Your Message</p>
					<textarea rows="6" placeholder="Your Message Here!" name="message" class="bg-blue-200 rounded focus:outline-none focus:bg-blue-100 text-blue-900 px-2 py-1 border-b border-blue-500 border-1 w-full text-xs"></textarea>
				</div>			
				<div class="flex gap-1 mt-4 "><input type="submit" class="bg-blue-500 focus:outline-none border-1 border-b border-blue-900 text-sm hover:bg-blue-600 py-1 px-2 text-white rounded"value="Send Message"></div>
			</form>
		</div>
	</div>
</body>
</html>
