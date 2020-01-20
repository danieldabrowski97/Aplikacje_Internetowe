<?php
function createNewAuthor($param){
    require_once('../db/sql_connect.php');   // points to the correct file
    $sql = "INSERT INTO authors (`name`,`surname`,`nationality`) VALUES (?,?,?)";
    if($statement = $mysqli->prepare($sql)){
        if($statement->bind_param('sss',$param['name'],$param['surname'],$param['nationality'])){
            $statement->execute();
            echo json_encode("OK");
        }
    } else{
        die('Niepoprawne zapytanie'.$mysqli->err_message());
    }
}
