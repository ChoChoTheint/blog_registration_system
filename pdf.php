<?php
include "connection.php";
$title = $_POST['title'];
$content = $_POST['content'];
// search post
$s_sql = "SELECT * FROM post WHERE title like '%".$title."%' OR content like '%".$content."%'";
$data = '';

// all post
$sql = "SELECT * FROM post";
if($s_sql){
    $sql = mysqli_query($conn,$s_sql);
    
}else{
    $sql = mysqli_query($conn,$sql);
}
$row = mysqli_fetch_assoc($sql);

// Include mPDF library
require_once __DIR__ .'/vendor/autoload.php';
use Mpdf\Mpdf;
$mpdf = new Mpdf();
$html = '<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>';
while($row){
    '<h1>' .$row['title']. '</h1>
    <p>'. $row['content'] .'</p>';
}
'</body>
</html>';


$mpdf->WriteHTML($html);
$mpdf->Output('blog.pdf', 'D');

?>
