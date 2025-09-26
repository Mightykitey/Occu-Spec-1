<?php

function new_console($conn, $post){
    try{
        $sql = "INSERT INTO console (Manufacturer, C_name, Release_date, Controller_no, Bit) VALUES (?,?,?,?,?)" ; //we are doing a prepared statement
        $stmt = $conn->prepare($sql);  //prepare to sql

        $stmt->bindParam(1, $post['Manufacturer']); //bind parameters for seurity
        $stmt->bindParam(2, $post['name']); // binding the data from my form. which make it more secured from a sql infections
        $stmt->bindParam(3, $post['date']);
        $stmt->bindParam(4, $post['controller']);
        $stmt->bindParam(5, $post['bit']);

        $stmt->execute(); //run the query to insert
        $conn = null; // closes the connection so cant be abused
    }catch (PDOException $e){
        error_log('Console datebase error: '. $e->getMessage());
        throw new Exception('Console database error'. $e);}



