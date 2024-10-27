<?php

function conn()
{
    // Create connection
    $conn = new mysqli(
        'localhost',
        'arnav',
        'm7',
        'bookmyturfdb'
    );

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else {
        // echo 'Connection successful';
    }

    return $conn;
}

$mysqli = conn();

?>