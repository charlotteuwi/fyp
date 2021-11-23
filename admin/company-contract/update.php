<?php
include_once('../../resources/connection.php');

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
    <link href="../../resources/css/tailwind.css" rel="stylesheet">
    <link href="../../resources/fontawesome/css/all.css" rel="stylesheet">
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

                    <a href="index.php">
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
                        <a href="add-company-contract.php"> Add New contracts
                        </a>
                        <div class="mr-8 flex items-center justify-center">
                            <input class="px-4 py-1 rounded-full shadow-lg h-8 pr-8 text-gray-400 focus:outline-none" type="text" name="">
                            <p class="text-red-600 -ml-8"><i class="fas fa-search "></i></p>
                        </div>
                    </div>
                    <div class="h-200 w-full p-2 flex items-center justify-center">

                        <?php

                       

                        if (isset($_POST['update'])) {
                            $id = $_POST['id'];
                            $company_name = $_POST['company_name'];
                            $tin_number = $_POST['tin_number'];
                            $description = $_POST['description'];
                            $manager = $_POST['manager'];
                            $phone_number = $_POST['phone_number'];
                            $address = $_POST['address'];
                            $contract_id = $_POST['contract_id'];
                            $start_date = $_POST['start_date'];
                            $end_date = $_POST['end_date'];
                            $isco_supervisor = $_POST['isco_supervisor'];

                            $query = mysqli_query($con, "update companycontracts set company_name='$company_name',tin_number='$tin_number',
                            description='$description',manager='$manager',phone_number='phone_number',address='$address',contract_id='$contract_id'
                            ,start_date='$start_date',end_date='$end_date',isco_supervisor='$isco_supervisor' WHERE id='$id' ");
                            //$query = $con->exec($sqli);
                        }
                        @$id = $_GET['id'];
                        $select = $con->query("SELECT * FROM companycontracts WHERE id='$id'");
                        //while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                           // $id = $row['id'];
                            $client_name = $row['company_name'];
                            $tin_number = $row['tin_number'];
                            $asset_description = $row['description'];
                            $manager = $row['manager'];
                            $phone_number = $row['phone_number'];
                            $address = $row['address'];
                            $contract_id = $row['contract_id'];
                            $start_date = $row['start_date'];
                            $end_date = $row['end_date'];
                            $isco_supervisor = $row['isco_supervisor'];
                        }
                        ?>
                        <form action="../../update.php" method="POST">
                            <table>
                                <tr>
                                    <td> Id</td>
                                    <td><input type="text" name="id" value="<?php echo $id ?>"></td>
                                </tr>
                                <tr>
                                    <td>company name</td>
                                    <td><input type="text" name="company_name" value="<?php echo $company_name ?>"></td>
                                </tr>
                                <tr>
                                    <td>tin number</td>
                                    <td><input type="text" name="tin_number" value="<?php echo $tin_number ?>"></td>
                                </tr>
                                <tr>
                                    <td>description</td>
                                    <td><input type="text" name="description" value="<?php echo $description ?>"></td>
                                </tr>
                                <tr>
                                    <td>manager</td>
                                    <td><input type="text" name="manager" value="<?php echo $manager ?>"></td>
                                </tr>
                                <tr>
                                    <td>phone number</td>
                                    <td><input type="text" name="phone_number" value="<?php echo $phone_number ?>"></td>
                                </tr>
                                <tr>
                                    <td>address</td>
                                    <td><input type="text" name="address" value="<?php echo $address ?>"></td>
                                </tr>
                                <tr>
                                    <td>contract id</td>
                                    <td><input type="text" name="contract_id" value="<?php echo $contract_id ?>"></td>
                                </tr>
                                <tr>
                                    <td>start date</td>
                                    <td><input type="text" name="start_date" value="<?php echo $start_date ?>"></td>
                                </tr>
                                <tr>
                                    <td>end date</td>
                                    <td><input type="text" name="end_date" value="<?php echo $end_date ?>"></td>
                                </tr>
                                <tr>
                                    <td>isco_supervisor</td>
                                    <td><input type="text" name="isco_supervisor" value="<?php echo $isco_supervisor ?>"></td>
                                </tr>

                            </table>
                            <div class="flex items-center w-full justify-center"><input type="submit" name="update" class="bg-red-600 text-white  p-4 py-2  rounded-full mt-2" value="update">
                                <a href="contracts.php"> BACK </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>