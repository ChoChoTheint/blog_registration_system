<?php
include 'connection.php';
$sql = "SELECT * FROM post";
$query = mysqli_query($conn, $sql);
session_start();
if (!isset($_SESSION['username'])) {
    header('location:index.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog using PHP and MySQL</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container py-5">
        <div class="jumbotron">
            <h2>Welcome <?php echo $_SESSION['username']; ?></h2>
            <p>Are you not sure what to say when you want to share the perfect picture? Not to worry, we have collected all the best captions for myself to help you out. So if you are looking for captions about myself for Instagram, you have come to the right place..</p>
            <a href="index.php" class="btn btn-danger mb-3">Logout</a>
        </div>

        <?php if (isset($_REQUEST['info'])) { ?>
            <?php if ($_REQUEST['info'] == "added") { ?>
                <div class="alert alert-success" id="success-message">
                    Post has been added successfully!
                </div>
            <?php }else if($_REQUEST['info'] == "updated"){ ?>
                <div class="alert alert-success" id="success-message">
                    Post has been updated successfully!
                </div>
            <?php }else if($_REQUEST['info'] == "delete"){ ?>
                <div class="alert alert-success" id="success-message">
                    Post has been deleted successfully!
                </div>
            <?php } ?>

        <?php } ?>

        <div class="text-center">
            <div class="input-group mb-4 mt-3">
                <div class="form-outline">
                    <input type="text" placeholder="Search" class="p-1 mb-1" id="search" name="search">
                </div>
                <div class="mx-1">
                    <a href="create.php" class="btn btn-dark mb-3">Create a new post</a>
                </div>
                <div class="mx-1">
                    <a href="pdf.php" class="btn btn-success mb-3">Download</a>
                </div>
            </div>
            
        </div>

        <div class="row">
            <?php foreach ($query as $q) { ?>
                <div class="col-4 d-flex justify-content-center align-items-center mb-2">
                    <div class="card" id="showdata">
                        <div class="card-body" style="width: 18rem;">
                            <h3 class="card-title"><?php echo $q['title']; ?></h3>
                            <p class="card-text"><?php echo mb_strimwidth($q['content'],0,100,'....'); ?></p>
                            <a href="detail.php?id=<?php echo $q['id']; ?>" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- js file -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
        setTimeout(function() {
            $('#success-message').fadeOut('slow');
        }, 3000);
        $(document).ready(function(){
            $('#search').on("keyup",function(){
                var search = $(this).val();
                $.ajax({
                    method: 'POST',
                    url: 'searchajax.php',
                    data:{title:search,content:search},
                    success:function(data){
                        $('#showdata').html(data);
                    }
                });
            });
        });
    </script>

</body>

</html>