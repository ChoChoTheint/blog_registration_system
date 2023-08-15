<?php
include "connection.php";
$sql = "SELECT * FROM post";
$sql = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($sql, MYSQLI_ASSOC);

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

foreach ($row as $post) {
    $html .= '<h1>' . $post['title'] . '</h1>';
    $html .= '<p>' . $post['content'] . '</p>';
    $html .= '<br>';
}

$html .= '</body></html>';

$mpdf->WriteHTML($html);
$mpdf->Output('blog.pdf', 'D');
?>
