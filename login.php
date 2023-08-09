<?php
session_start();
$login = 0;
$invalid = 0;
$match = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql = "Select * from `signup` where name='$username' and password='$password'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                $login = 1;
                $_SESSION['username'] = $username;
                header('location:welcome.php');
            } else {
                $invalid = 1;
                // echo "Invalid credentials";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    if ($login) {
        echo "<div class='alert alert-success' role='alert' id='success-message'>
            Login Successfully
        </div>";
    } else {
        if ($invalid) {
            echo "<div class='alert alert-danger' role='alert' id='fail-message'>
                    Invalid credentials
                </div>";
        }
    }
    ?>
    <!-- js file -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        setTimeout(function() {
            $('#success-message').fadeOut('slow');
        }, 3000);
        setTimeout(function() {
            $('#fail-message').fadeOut('slow');
        }, 3000);
    </script>
</body>

</html>