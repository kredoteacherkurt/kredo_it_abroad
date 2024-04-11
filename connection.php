<?php 

function connection(){
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'kredo_it_abroad';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db_name);
    
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
        return $conn;
    
}