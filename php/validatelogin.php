<?php

$servername = "localhost";
$username = "root";
$password = "Jordan54321";
$dbname ="yxh";

// 创建连接
$mysqli=new mysqli($servername,$username,$password,$dbname);
if(mysqli_connect_errno()) {
    echo "连接数据库失败：" . mysqli_connect_error();
    $mysqli = null;
    exit;
}


$name = $pwd = $email ="";
if ($_SERVER["REQUEST_METHOD"]=="GET")
{
    $name = test_input($_GET["name"]);
    $pwd = test_input($_GET["password"]);
    $email = test_input($_GET["email"]);
    $date =date("Y-m-d H:i:s" );
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>