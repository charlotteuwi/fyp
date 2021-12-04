<html>

<head>
    <title>Log In Page</title>
    <link href="resources/css/tailwind.css" rel="stylesheet">
    <link href="resources/fontawesome/css/all.css" rel="stylesheet">
</head>

<body>
    <div class="h-full w-full flex items-center justify-center">
        <div class="bg-blue-600 p-4 text-white  w-1/4 rounded">
            <form action="check-login.php" method="POST">
                <p class="bg-red-500 rounded text-white px-2 py-1 text-xs">
                    <?php
                        if(isset($_GET['msg'])){
                            echo $_GET['msg'];
                        }
                    ?>
                </p>
                <div class="flex-row">
                    <div class="mt-2">
                        <p class="font-bold border-b border-1 border-gray-800 w-full rounded p-1">Log In Page</p>
                    </div>
                    <div><input type="text" required name="username" placeholder="Username" class="px-2 mt-2 w-full focus:outline-none py-1 rounded text-blue-500"></div>
                    <div><input type="password" required name="password" placeholder="Password" class="px-2 mt-2 w-full focus:outline-none py-1 rounded text-blue-500"></div>
                    <div><input type="submit" required name="submit" class="px-2 mt-2 w-full focus:outline-none py-1 bg-gray-800 rounded text-blue-200"></div>
                </div>
            </form>
        </div>
        <div>
</body>
</body>

</html>