<?php
// We need to use sessions, so you should always start sessions using the below code.

session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php?msg=You are not logged in');
    exit;
}

if ($_SESSION['usertype'] != 'user') {
    header('Location: ../index.php?msg=You are not the Company');
    exit;
}

include_once('../resources/connection.php');
?>
<html>

<head>
    <title>Welcome to user page </title>
    <link href="../resources/css/tailwind.css" rel="stylesheet">
    <link href="../resources/fontawesome/css/all.css" rel="stylesheet">
</head>

<body>
    <div>
        <!----header--->
        <div class=" flex items-center justify-between text-2xl w-full bg-gray-100 h-16 py-2 px-4 shadow">
            <div class="font-bold">ECAS </div>
            <div class="font-light"> USER <?php echo $_SESSION['contract_id']; ?></div>
            <div> <img class="h-12" src="../resources/img/logo.png"> </div>
        </div>
        <!-----navigations & contents -->
        <div class="flex">
            <div class="bg-gray-900 w-1/4 py-10 ">
                <div class="text-gray-100 font-light flex-wrap gap-1/2">
                    <a href="index.php">
                        <div class="py-4 px-5 bg-gray-800 mt-2 flex hover:bg-gray-100 hover:text-gray-800 
				cusror-pointer border-b border-red-800 shadow-lg">
                            <p><i class="fas fa-tachometer-alt"></i> Dashboard</p>
                        </div>
                    </a>

                    <a href="company_request.php">
                        <div class="py-4 px-5 bg-white text-gray-800 text-white mt-2 flex hover:bg-gray-100 hover:text-gray-800 
		        cusror-pointer border-b border-red-800 shadow-lg">
                            <p><i class="fas fa-file-alt"></i> Request</p>
                        </div>
                    </a>
                    <a href="changepassword.php">
                        <div class="py-4 px-5 bg-gray-800 text-white-800 text-white mt-2 flex hover:bg-gray-100 hover:text-gray-800 
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
            <div class="flex p-4 h-full items-center">
                <div class="w-full bg-blue-200 rounded-l border-r p-4">
                    <p class="font-bold text-gray-800 my-2">Request Form</p>
                    <form method="POST" action="request/insert.php">
                        <div>
                            <textarea placeholder="Reason for your Request" minlength="30" required class="w-full px-4 py-1 focus:outline-none rounded-lg shadow text-gray-600" name="user_reason" id="" cols="90" rows="4"></textarea>
                        </div>
                        <div class="flex gap-1">
                            <div class="w-full mt-2 flex items-center justify-center mb-8">
                                <input class="w-full rounded-lg text-white bg-red-600 shadow rounded px-1 py-2" type="submit" name="cancel" value="Cancel" class="border-b border-gray-900 bg-red-600 rounded-full px-4 py-1 w-64 text-white">
                            </div>
                            <div class="w-full mt-2 flex items-center justify-center mb-8">
                                <input class="w-full rounded-lg text-white bg-red-600 shadow rounded px-1 py-2" type="submit" name="renew" value="Renew" class="border-b border-gray-900 bg-red-600 rounded-full px-4 py-1 w-64 text-white">
                            </div>

                            <div class="w-full mt-2 flex items-center justify-center mb-8">
                                <input class="w-full rounded-lg text-white bg-red-600 shadow rounded px-1 py-2" type="submit" name="update_information" value="Change Information" class="border-b border-gray-900 bg-red-600 rounded-full px-4 py-1 w-64 text-white">
                            </div>
                        </div>


                        <?php

                        $contract_id = $_SESSION['contract_id'];
                        if ($stmt = $con->prepare('SELECT contract_id, employee_name, phone_number FROM usercontracts WHERE contract_id = ?')) {
                            // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
                            $stmt->bind_param('s', $contract_id);
                            $stmt->execute();
                            // Store the result so we can check if the account exists in the database.
                            $stmt->store_result();
                            if ($stmt->num_rows > 0) {
                                $stmt->bind_result($contract_id, $employee_name, $phone_number);
                                $stmt->fetch();

                        ?>
                                <input type="hidden" name="contract_id" value="<?php echo $contract_id; ?>">
                                <input type="hidden" name="manager" value="<?php echo $employee_name; ?>">
                                <input type="hidden" name="phone_number" value="<?php echo $phone_number; ?>">

                        <?php
                            }
                        }
                        ?>
                    </form>
                    <p class="font-medium my-2"> Pending Request</p>
                    <table class="w-full">
                        <tr class="bg-white text-gray-900 font-medium border-l border-r border-gray-900">

                            <td class="p-2 ml-2 border-r border-gray-900">Contract_Id </td>
                            <td class="p-2 ml-2 border-r border-gray-900">Employee Name </td>
                            <td class="p-2 ml-2 border-r border-gray-900">Phone Number </td>
                            <td class="p-2 ml-2 border-r border-gray-900">Action </td>
                            <td class="p-2 ml-2 border-r border-gray-900">User Reason </td>
                            <td class="p-2 ml-2 border-r border-gray-900">Status </td>
                            <td class="p-2 ml-2 border-r border-gray-900">Date </td>

                        </tr>
                        <?php
                        if ($stmt = $con->prepare('SELECT contract_id, manager,phone_number,action, status, user_reason, date FROM requests WHERE contract_id = ?')) {
                            // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
                            $stmt->bind_param('s', $contract_id);
                            $stmt->execute();
                            // Store the result so we can check if the account exists in the database.
                            $stmt->store_result();
                            if ($stmt->num_rows > 0) {
                                $stmt->bind_result($contract_id, $client_name, $phone_number, $action, $status, $user_reason, $date);

                                $stmt->fetch();
                        ?>
                                <tr class="bg-gray-800 border-b border-gray-900 text-gray-300">
                                    <td class="p-2 ml-2 border-r border-gray-900"><?php echo $contract_id; ?> </td>
                                    <td class="p-2 ml-2 border-r border-gray-900"><?php echo $client_name; //selected as manager 
                                                                                    ?> </td>
                                    <td class="p-2 ml-2 border-r border-gray-900"><?php echo $phone_number; ?> </td>
                                    <td class="p-2 ml-2 border-r border-gray-900"><?php echo $action; ?> </td>
                                    <td class="p-2 ml-2 border-r border-gray-900"><?php echo $user_reason; ?> </td>
                                    <td class="p-2 ml-2 border-r border-gray-900"><?php echo $status; ?> </td>
                                    <td class="p-2 ml-2 border-r border-gray-900"><?php echo $date; ?> </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>

                    </table>

                    <p class="font-medium my-2">Requests Answers</p>
                    <div class="bg-green-500">
                        <table class="w-full text-xs">
                            <tr class="bg-green-600 font-medium text-white border-l border-r border-gray-900">
                                <td class="p-4 ml-4">Contract ID</td>
                                <td class="p-4 ml-4">Client Name </td>
                                <td class="p-4 ml-4">Phone Number</td>
                                <td class="p-4 ml-4">Action</td>
                                <td class="p-4 ml-4">User Reason</td>
                                <td class="p-4 ml-4">Status</td>
                                <td class="p-4 ml-4">Admin Reason</td>
                                <td class="p-4 ml-4">Date</td>
                            </tr>

                            <?php
                            $query = "SELECT contract_id, manager,phone_number,action, user_reason, admin_reason, status, date FROM requestsanswers WHERE contract_id = '$contract_id'"; // Fetch all the records from the table address
                            $result = mysqli_query($con, $query);

                            while ($array = mysqli_fetch_array($result)) {
                            ?>


                                <tr class=" text-xs bg-gray-800 border-b border-gray-900 text-gray-300">
                                    <td class="p-2 ml-2 border-r border-gray-900"><?php echo $array['contract_id']; ?> </td>
                                    <td class="p-2 ml-2 border-r border-gray-900"><?php echo $array['manager']; //selected as manager 
                                                                                    ?> </td>
                                    <td class="p-2 ml-2 border-r border-gray-900"><?php echo $array['phone_number']; ?> </td>
                                    <td class="p-2 ml-2 border-r border-gray-900"><?php echo $array['action']; ?> </td>
                                    <td class="p-2 ml-2 border-r border-gray-900"><?php echo $array['user_reason']; ?> </td>
                                    <td class="p-2 ml-2 border-r border-gray-900"><?php echo $array['status']; ?> </td>
                                    <td class="p-2 ml-2 border-r border-gray-900"><?php echo $array['admin_reason']; ?> </td>
                                    <td class="p-2 ml-2 border-r border-gray-900"><?php echo $array['date']; ?> </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </table>
                    </div>

                </div>