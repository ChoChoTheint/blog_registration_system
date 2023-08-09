<?php
include "connection.php";

if (isset($_REQUEST['new_post'])) {
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];
    $sql = "INSERT INTO post(title,content) VALUES('$title','$content')";
    mysqli_query($conn, $sql);
    header("Location: welcome.php?info=added");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog using PHP and MySQL</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- css file -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt-5">
        <form action="" method="post">
            <input type="text" name="title" placeholder="Blog Title" class="form-control text-dark my-3">
            <textarea name="content" placeholder="Blog Content" id="" cols="30" rows="10" class="form-control text-dark my-3"></textarea>
            <button name="new_post" type="submit" class="btn btn-dark">Add Post</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>