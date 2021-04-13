<?php 

require_once "database.php";
require_once "image.php";

$db = new Database('mysql:host=localhost;dbname=route_34_sat_5','root','',array(PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',));
// print_r($db->selectAll("employees"));

if(isset($_POST['submit'])){
    $uploadimg= new Image($_FILES['myfile']); 
    if($uploadimg->validate()){
        $uploadimg->rename()->upload();
        echo "Done uploading Image";
    }else{
        echo "Invalid Image";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="myfile">   
        <button type="submit" name="submit">Upload</button>
    </form>
</body>
</html>