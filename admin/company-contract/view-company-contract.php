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
            <div> <img class="h-12" src="../../resources/img/logo.png"> </div>
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
                    
                    <div class="h-200 w-full p-2 flex items-center justify-center">
                        <table class="w-full" cellspacing="10 border border-gray-400">
                            <tr class="bg-gray-900 text-white p-2 border border-gray-900 rounded-r-md rounded-l-md" colspan="3">
                                <th class="p-2"> Id </th>
                                <th class="p-2"> Contract ID </th>
                                <th class="p-2"> Company Name </th>
                                <th class="p-2"> Rem .Days </th>
                                <th class="p-2"> Status </th>
<<<<<<< HEAD
                                <th class="p-2"> Actions </th>
=======
                                <th class="p-2"  Actions </th>
>>>>>>> 4e579997526905a0036842f76e95fb4fd562c343
                            </tr>

                            <?php
                            include_once('../../resources/connection.php');

                            $query = "SELECT id, contract_id ,company_name, end_date from companycontracts"; // Fetch all the records from the table address
                            $result = mysqli_query($con, $query);

                            while ($array = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <td><?php echo $array['id']; ?></td>
                                    <td><?php echo $array[1]; ?></td>
                                    <td><?php echo $array[2]; ?></td>
                                    <td><?php echo $array[3]; ?></td>
                                    <td ><a href="update-company-contract-form.php?id=<?php echo $array['id']; ?>"><i class="fas fa-user-edit"></i></a></td>
                                    
                                </tr>

                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>