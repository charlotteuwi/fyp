<?php
session_start();
?>
<!DOCTYPE html>
<html>

<body>

    <?php
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();

    //redirect to Login page
    header('Location: index.php?msg=Thanks to use the system!😒😍');
    ?>

</body>

</html>