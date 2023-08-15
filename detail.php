<?php
include "connection.php";
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM post WHERE id = $id";
    $query = mysqli_query($conn,$sql);
}

if(isset($_REQUEST['delete'])){
    $id = $_REQUEST['id'];
    $sql = "DELETE FROM post WHERE id = $id";
    $query = mysqli_query($conn,$sql);
    header("Location:welcome.php?info=delete");
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
    <div class="container my-5" style="position: fixed;top:100px;left:500px">
   
        <?php foreach ($query as $q) { ?>
                <div class="col-4 d-flex justify-content-center align-items-center mb-2">
                    <div class="card" >
                        <div class="card-body" style="width: 18rem;">
                            <h5 class="card-title"><?php echo $q['title']; ?></h5>
                            <p class="card-text"><?php echo $q['content']; ?></p>
                            <div class="d-flex mt-2 justify-content-center align-items-center">
                                <a href="welcome.php" class="btn btn-success btn-sm ml-2 m-2">List</a>
                                <a href="edit.php?id=<?php echo $q['id']; ?>" class="btn btn-info btn-sm ml-2 m-2">Edit</a>
                                <form action="" method="post">
                                    <input type="text" hidden name="id" value="<?php echo $q['id']; ?>">
                                    <button class="btn btn-danger btn-sm ml-2" name="delete">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
 
        
           
    </div>
    <!-- js file -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>