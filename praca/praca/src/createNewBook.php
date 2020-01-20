<?php

function createNewBook($param){
    require_once('../db/sql_connect.php');
    $sql = "INSERT INTO books (`title`,`released`,`description`,`id_author`) VALUES (?,?,?,?)";
    if ($statement = $mysqli->prepare($sql)) {
        if ($statement->bind_param('sisi', $param['title'], $param['released'], $param['description'], $param['id_author'])) {
            $statement->execute();
            echo json_encode("OK");
        }
    } else {
        die('Niepoprawne zapytanie' . $mysqli->err_message());
    }

}
