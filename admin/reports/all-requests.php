<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../../index.php?msg=You are not logged in');
    exit;
}

if ($_SESSION['usertype'] != 'admin') {
    header('Location: ../../index.php?msg=You are not the Admin');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>All Requests</title>
    <link href="../../resources/css/tailwind.css" rel="stylesheet">
    <link href="../../resources/fontawesome/css/all.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div>
        <!--Header Area-->
        <div class="flex items-center justify-between text-2xl w-full bg-white h-16 px-4 py-2  shadow">
            <div class="font-bold"> E-Contracts </div>
            <div class="font-light"> Admin
                <a href="../index.php" class="bg-red-500 text-white text-sm py-2 px-4 font-bold rounded-2xl shadow"> Back to Dashboard</a>
            </div>
            <div> <img class="h-12" src="../../resources/img/logo.png"> </div>
        </div>


        <button onclick="printDiv()" class="flex-wrap w-full focus:outline-none font-bold items-center justify-center mt-2 text-lg rounded shadow py-2">
            <p class="w-full text-center"><i class="fas fa-print mr-2"></i> All Pending Requests</p>
            <p class="text-xs w-full text-center">Click to Print</p>
        </button>

        <div id="allcontracts"  class="w-full px-16 mt-8 flex items-center justify-center mb-16">

            <table class="w-3/4 bg-white p-2 rounded shadow" cellspacing="10">
                <tr class="bg-gray-900 text-white p-2 border-b border-gray-900 rounded-r-md rounded-l-md" colspan="6">
                    <th class="p-2 text-left"> Contract ID </th>
                    <th class="p-2 text-left"> Manager/User </th>
                    <th class="p-2 text-left"> Phone Number </th>
                    <th class="p-2 text-left"> Action</th>
                    <th class="p-2 text-left"> Status </th>
                    <th class="p-2 text-left"> Date</th>
                    <th class="p-2 text-left"> User Reason</th>
                    <th class="p-2 text-left"> Request Type</th>
                </tr>

                <?php
                include_once('../../resources/connection.php');

                $query = "select * from requests"; // Fetch all the records from the table address
                $result = mysqli_query($con, $query);

                while ($array = mysqli_fetch_array($result)) { ?>


                    <tr class="border-b border-gray-900">
                        <td class="p-2 text-left"><?php echo $array['contract_id'];
                                                    ?></td>
                        <td class="p-2 text-left"><?php echo $array['manager'];
                                                    ?></td>
                        <td class="p-2 text-left"><?php echo $array['phone_number'];
                                                    ?></td>
                        <td class="p-2 text-left"><?php echo $array['action'];
                                                    ?></td>
                        <td class="p-2 text-left"><?php echo $array['status'];
                                                    ?></td>
                        <td class="p-2 text-left"><?php echo $array['date'];
                                                    ?></td>
                        <td class="p-2 text-left"><?php echo $array['user_reason'];
                                                    ?></td>
                        <td class="p-2 text-left"><?php echo $array['request_type'];
                                                    ?></td>
                    </tr>

                    <?php
                }
                ?>
            </table>
        </div>
        <script>
            function printDiv() {
                let divContents = document.getElementById("allcontracts").innerHTML;
                let a = window.open('', '', 'height=500, width=1200');
                a.document.write('<html>');
                a.document.write("<body> <img src='../../resources/img/logo.png'>");
                a.document.write('<h1>ECAS All Expired Contracts <br>');
                a.document.write(divContents);
                a.document.write('</body></html>');
                a.document.close();
                a.print();
            }
        </script>
</body>

</html>