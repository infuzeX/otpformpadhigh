<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json; charset=UTF-8");

require './db.php';
require './response.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

if(isset($data)){

//classs array

//store object data in variable
$parent = $data ->parent;
$student = $data ->student;
$email = $data ->email;
$contact = $data ->contact;
$clas = $data ->class;
$city = $data ->city;

/*insert data*/
$query = "INSERT INTO course3 (`parent`, `student`, `email`, `contact`, `class`, `city`) VALUES ('$parent','$student',$email,'$contact','$clas'. '$city')";
$inserted = mySqli_query($con , $query);

$res = new Response;
if($inserted){
    $res -> success = true;
    $res -> message = "https://padhhigh.com/demo".$clas.".html";
   }else{
    $res -> success = false;
    $res -> message = "failed to apply";
}
/*insert data*/
echo json_encode($res);
}
?>