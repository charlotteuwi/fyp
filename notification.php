<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php?msg=You are not logged in');
    exit;
}
?>
<html>

<head>
    <title>NOTIFICATION PAGE </title>
    <link href="resources/css/tailwind.css" rel="stylesheet">
    <link href="resources/fontawesome/css/all.css" rel="stylesheet">
</head>

<body class="bg-gray=100">
    <div>
        <!----header--->

        <div class=" flex items-center justify-between text-2xl w-full bg-gray-200 h-30 py-2 px-4 shadow">
            <div class="font-bold">ECAS </div>
            <div class="w-full items-center text-center p-4 text-lg">
                <i class="fa fa-bell"></i>
                NOTIFICATION
            </div>
            <div> <img class="h-12" src="resources/img/logo.png"> </div>
        </div>

        <div class="flex items-center justify-center w-full mt-8">
            <div class="w-1/4 rounded flex-wrap items-center justify-center text-center bg-gray-900 p-4">

                <div class="mt-4 text-white items-left h-8 pr-4">
                    <p class="font-bold">Hello <?php echo $_SESSION['name']; ?>🤗 </p>
                    <p class="text-xs">
                        <?php
                        if (isset($_GET['notification'])) {
                            echo $_GET['notification'];
                        }
                        ?>
                    </p>
                </div>

                <div class="w-full items-center text-center mt-8">
                    <button onclick="goback()" class="border-b text-xs border-gray-900 bg-red-600 rounded-full px-2 py-1 w-64 text-white">
                        GO BACK
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function goback() {
            window.history.back();
        }
    </script>
</body>

</html>