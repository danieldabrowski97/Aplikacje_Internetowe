<?php

function getAllRentedBooks(){
    require_once('../db/sql_connect.php');
        $sql = "SELECT books.*,reservations.*,authors.name,authors.surname FROM books INNER JOIN reservations ON books.id = reservations.id_book INNER JOIN authors ON books.id_author = authors.id WHERE books.is_reserved = 1";
        $result = $mysqli->query($sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }