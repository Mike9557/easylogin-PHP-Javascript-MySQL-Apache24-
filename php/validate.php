<?php
/**
 * Created by PhpStorm.
 * User: Jordan Yang
 * Date: 2017-07-07
 * Time: 8:36 PM*/

date_default_timezone_set('PRC');

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

$sql = "CREATE TABLE login( ".
    "user_id INT NOT NULL AUTO_INCREMENT, ".
    "personname VARCHAR(100) NOT NULL, ".
    "password VARCHAR(40) NOT NULL, ".
    "email VARCHAR(50) NOT NULL,".
    "submission_date DATE, ".
    "PRIMARY KEY ( user_id )); ";


$mysqli->query($sql);

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

$sql = "select personname, from login";

$result = $mysqli->query($sql);

if (!$result) {
    printf("Error: %s\n", mysqli_error($sql));
    exit();
}

    while( $row = mysqli_fetch_row($result) ){
        echo $row['personname'];
        if ($row['personname'] == $name ){
            echo"hello";
            echo '<script>alert(\'this username has been taken\');history.go(-1);</script>';
            break;
        }

}

?>