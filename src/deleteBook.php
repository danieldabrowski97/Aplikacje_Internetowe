<?php
function deleteBook($param){
    require_once('../db/sql_connect.php');
    $sql = "DELETE FROM books WHERE id = ?";
    if($statement = $mysqli->prepare($sql)){
        if($statement->bind_param('i',$param['id_book'])){
            $statement->execute();
            echo json_encode("OK");
        }
    }
}