<?php
include "connection.php";
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM post WHERE id = $id";
    $query = mysqli_query($conn,$sql);
}
if (isset($_REQUEST['update'])) {
    $id = $_REQUEST['id'];
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];
    $sql = "UPDATE post SET title= '$title', content= '$content' WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    header("Location: welcome.php?info=updated");
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
    <div class="container mt-5" style="position: fixed;left:100px;top: 100px;">
        <?php foreach($query as $q){?>
            <form action="" method="post">
                <input type="text" name="title" placeholder="Blog Title" class="form-control  my-3" value="<?php echo $q['title']; ?>">
                <textarea name="content" placeholder="Blog Content" id="" cols="30" rows="10" class="form-control my-3" value=""><?php echo htmlspecialchars($q['content']); ?></textarea>
                <button name="update" type="submit" class="btn btn-dark">Update</button>
            </form>
        <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>