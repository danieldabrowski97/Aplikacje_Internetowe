<?php

function getAllFreeBooks(){
    require_once('../db/sql_connect.php');
        $sql = "SELECT books.*,authors.* FROM books INNER JOIN authors ON books.id_author = authors.id WHERE is_reserved = 0";
        $result = $mysqli->query($sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }