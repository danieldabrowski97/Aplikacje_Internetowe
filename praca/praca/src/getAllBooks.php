<?php
function getAllBooks(){
    require_once('../db/sql_connect.php');
        $sql = "SELECT books.*,authors.name,authors.surname FROM books INNER JOIN authors ON books.id_author = authors.id";
        $result = $mysqli->query($sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }