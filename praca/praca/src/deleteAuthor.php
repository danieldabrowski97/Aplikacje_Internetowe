<?php
function deleteAuthor($param){
    require_once('../db/sql_connect.php');   // points to the correct file
    $sql = "DELETE FROM authors WHERE id = ?";
    if($statement = $mysqli->prepare($sql)){
        if($statement->bind_param('i',$param['id_author'])){
            $statement->execute();
                if($mysqli->query("DELETE FROM books WHERE id_author = ".$param['id_author'])){
                    echo json_encode("OK");
             }
        }
    }
}