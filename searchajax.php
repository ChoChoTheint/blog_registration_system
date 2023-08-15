<?php
include "connection.php";
if(isset($_POST['title']) || isset($_POST['content'])){
$title = $_POST['title'];
$content = $_POST['content'];
$sql = "SELECT * FROM post WHERE title LIKE '{$title}%' OR content LIKE '{$content}%'";
$query = mysqli_query($conn,$sql);

$data = '';
if($query){
    while($row = mysqli_fetch_assoc($query)){
        $data .= "<div class='row'>
            <div class='col-4 d-flex justify-content-center align-items-center mb-2'>
                <div class='card'>
                    <div class='card-body' style='width: 18rem;'>
                        <h5 class='card-title'>". $row['title']."</h5>
                        <p class='card-text'>". $row['content']."</p>
                        <a href='detail.php?id='". $row['id']. " class='btn btn-primary'>Read More</a>
                    </div>
                </div>
            </div>
    </div>";
    }
 }else{ 
    echo "<div>
            <p>No data found</p>
        </div>";
 }
echo $data;
}


?>