<?php

    require_once 'conn.php';

    $city = $_POST["city"];
    $query = "select t1.name, t1.location, t1.price from turf as t1, city as t2 where t1.city_id = t2.id AND t2.name = '$city'";
    $result = $mysqli->query($query);
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }


    function returnres($httpCode, $data)
    {
        ob_start();
        ob_clean();
        header_remove();
        header("Content-type: application/json; charset=utf-8");
        http_response_code($httpCode);
        echo json_encode($data);
        die();
    }
    returnres('200', $data);

?>