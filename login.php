<?php

include("DataBase.php");
$userName = $_GET["userName"];
$password = $_GET["password"];
$sql = $conn->prepare("SELECT * FROM `users` where username='$userName' and password='$password'");
    if($sql->execute()){
        foreach($sql as $row){
            $responsedata[]=Array(
                "id" => $row['id'],
                "username" => $row['username'],   
                "password" => $row['password'],   
            );
    
            $json = Array(
                "HttpCode" => 200,
                "message" => "success",
                "data" => array(),
            );    
        }
        if(count($responsedata)>0) {
            $json['data']=$responsedata;
            echo json_encode($json);
        } else {
            $json = Array(
                "HttpCode" => 500,
                "message" => "failure",
                "data" => array(),
            );   
            echo json_encode($json); 
        }
    } else {
        $json = Array(
            "HttpCode" => 500,
            "message" => "failure",
            "data" => array(),
        );   
        echo json_encode($json); 
    }
?>