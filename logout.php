<?php
session_start();

echo "<script>
        alert('Logged Out!');
        </script>";

unset($_SESSION['email']);
session_destroy();

header("Location: index.php");
exit();
?>
