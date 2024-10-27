<?php

    // Return JSON Response
    function returnres($httpCode, $data)
    {
        // remove any string that could create an invalid JSON 
        // such as PHP Notice, Warning, logs...
        ob_start();
        ob_clean();

        // this will clean up any previously added headers, to start clean
        header_remove();

        // Set the content type to JSON and charset 
        // (charset can be set to something else)
        // add any other header you may need, gzip, auth...
        header("Content-type: application/json; charset=utf-8");

        // Set your HTTP response code, refer to HTTP documentation
        http_response_code($httpCode);

        // encode your PHP Object or Array into a JSON string.
        // stdClass or array
        echo json_encode($data);

        // making sure nothing is added
        die();
    }

    require_once 'conn.php';

    $city = $_POST["city"];

    $query = "select t1.name, t1.location, t1.price from turf as t1, city as t2 where t1.city_id = t2.id AND t2.name = '$city'";
    
    $result = $mysqli->query($query);
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    returnres('200', $data);