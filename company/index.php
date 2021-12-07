<?php
session_start();
// We need to use sessions, so you should always start sessions using the below code.
include_once('../resources/connection.php');

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php?msg=You are not logged in');
    exit;
}

if ($_SESSION['usertype'] != 'company') {
    header('Location: ../index.php?msg=You are not the Company');
    exit;
}
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
            <div class="font-light"> Company <?php echo $_SESSION['contract_id']; ?></div>
            <div> <img class="h-12" src="../resources/img/logo.png"> </div>
        </div>
        <!-----navigations & contents -->
        <div class="flex">
            <div class="bg-gray-900 w-1/4 py-10 ">
                <div class="text-gray-100 font-light flex-wrap gap-1/2">
                    <a href="index.php">
                    <div class="py-4 px-5 bg-gray-800 text-white mt-2 flex hover:bg-gray-100 hover:text-gray-800 
		        cusror-pointer border-b border-red-800 shadow-lg">
                            <p><i class="fas fa-tachometer-alt"></i> Dashboard</p>
                        </div>
                    </a>

                    <a href="company_request.php">
                        <div class="py-4 px-5 bg-gray-800 text-white mt-2 flex hover:bg-gray-100 hover:text-gray-800 
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
            <?php
            $contract_id = $_SESSION['contract_id'];


            if ($stmt = $con->prepare('SELECT contract_id, company_name,phone_number, description, start_date, end_date, address, file, manager, isco_supervisor, status FROM companycontracts WHERE contract_id = ?')) {

                // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
                $stmt->bind_param('s', $contract_id);
                $stmt->execute();
                // Store the result so we can check if the account exists in the database.
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    // echo "Fetch Success";
                    $stmt->bind_result($contract_id, $company_name, $phone_number, $description, $start_date, $end_date, $address, $file, $manager, $isco_supervisor, $status);
                    $stmt->fetch();

            ?>

                    <div class="w-full flex items-center justify-center">
                        <div class="bg-white rounded w-3/5 px-16 py-12 mt-4 shadow-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-xs font-bold text-gray-600">Contract ID</div>
                                    <div class="text-lg font-bold text-gray-800"><?php echo $contract_id; ?></div>
                                </div>
                                <div class="text-right">
                                    <div class="text-xs font-bold text-gray-600">Phone_Number</div>
                                    <div class="text-lg font-bold text-gray-800"><?php echo $phone_number; ?></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="text-right">
                                    <div class="text-xs font-bold text-gray-600">Company Name</div>
                                    <div class="text-lg font-bold text-gray-800"><?php echo $company_name; ?></div>
                                </div>
                                <div class="text-right">
                                    <div class="text-xs font-bold text-gray-600">Description</div>
                                    <div class="text-lg font-bold text-gray-800"><?php echo $description; ?></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <div>
                                    <div class="text-xs font-bold text-gray-600">Start_date</div>
                                    <div class="text-lg font-bold text-gray-800"><?php echo $start_date; ?></div>
                                </div>
                                <div class="text-right">
                                    <div class="text-xs font-bold text-gray-600">End_Date</div>
                                    <div class="text-lg font-bold text-gray-800"><?php echo $end_date; ?></div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between mt-4">
                                <div>
                                    <div class="text-xs font-bold text-gray-600">Address</div>
                                    <div class="text-lg font-bold text-gray-800"><?php echo $address ?></div>
                                </div>
                                <div class="text-right">
                                    <div class="text-xs font-bold text-gray-600">Download file</div>
                                    <div class="text-lg font-bold text-gray-800"><?php echo $file; ?></div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between mt-4">
                                <div>
                                    <div class="text-lg font-bold text-gray-800">Preview Link</div>
                                    <div class="text-base  font-normal text-blue-600">
                                        <a href="../admin/company-contract/upload/<?php echo $file; ?>">Download</a>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-lg font-bold text-gray-800">Status</div>
                                    <?php
                                    function dateDifference($date1, $date2)
                                    {
                                        $date1_ts = strtotime($date1);
                                        $date2_ts = strtotime($date2);
                                        $diff = $date2_ts - $date1_ts;
                                        return round($diff / 86400);
                                    }
            

                                    $date1 = date('Y-m-d');
                                    $date2 = $end_date;

                                    $dateDiff =  dateDifference($date1, $date2);
                                    if ($dateDiff < 0) {
                                        $contractColor = "text-red-600";
                                    } else if ($dateDiff < 7) {
                                        $contractColor = "text-yellow-600";
                                    } else {
                                        $contractColor = "text-green-600";
                                    }
                                    ?>
                                    <div class="text-base  font-normal <?php echo $contractColor; ?>">
                                        <?php echo $status; ?> (<?php echo $dateDiff; ?> Days)
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between mt-4">
                                <div>
                                    <div class="text-xs font-bold text-gray-600">Manager</div>
                                    <div class="text-lg font-bold text-gray-800"><?php echo $manager; ?></div>
                                </div>
                                <div class="text-right">
                                    <div class="text-xs font-bold text-gray-600">ISCO Supervisor</div>
                                    <div class="text-lg font-bold text-gray-800"><?php echo $isco_supervisor; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                }
            }
            ?>

</html>