<?php
$user = 0;
$success = 0;
$match = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connection.php';
    if (isset($_POST['signUp'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);

        $sql = "Select * from `signup` where name='$username'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                $user = 1;
            } else {
                if ($password === $cpassword) {
                    $sql = "insert into `signup` (name,password) values ('$username','$password')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        $success = 1;
                    } else {
                        die(mysqli_query($conn, $result));
                    }
                } else {
                    $match = 1;
                }
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
    <title>Registration Project</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php
    if ($user) {
        echo "<div class='alert alert-danger' role='alert' id='fail-message' >
                    User already exits
            </div>";
    } else {
        if ($success) {
            echo "<div class='alert alert-success' role='alert' id='success-message'>
                    SignUp successfully
                </div>";
        } else {
            if ($match) {
                echo "<div class='alert alert-danger' role='alert' id='fail-message'>
                        Password didn't match
                    </div>";
            }
        }
    }
    ?>


    <div class="container my-3" style="position: fixed;top:100px;left:100px">
        <div class="row justify-content-center py-5">
            <div class="col-md-4 col-xm-12 my-3 py-5">
                <form action="" method="post">
                    <h2>Sign Up</h2>
                    <div class="mb-3">
                        <label for="username" class="form-label">Enter Name</label>
                        <input type="text" class="form-control" id="username" name="username" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Enter Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                    </div>
                    <div class="mb-3 ">
                        <label for="cpassword" class="form-label">Enter Comfirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-success w-100" name="signUp">Sign Up</button>
                </form>
            </div>
            <div class="col-md-4 col-xm-12 my-5 py-5">
                <form action="login.php" method="post">
                    <h2>Login</h2>
                    <div class="mb-3">
                        <label for="username" class="form-label">Enter Name</label>
                        <input type="text" class="form-control" id="username" name="username" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Enter Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-dark w-100" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>
    <!-- js file -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script> -->
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