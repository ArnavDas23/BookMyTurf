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

$query = 'SELECT * FROM city';
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
    $city[] = $row;

}

// var_dump($city);

?>

<div id="my_div">
</div>

<script>

    let my_city = [
        <?php
            for ($i = 0; $i < count($city); $i++) { 
                echo "'". $city[$i]['name'] . "', ";
            }
        ?>]

    const my_div = document.getElementById('my_div');

    my_city.forEach(function(city, index) {
        console.log(index + ": " + city);
        
        const add_city = document.createElement('button');
        add_city.textContent = city;
        my_div.appendChild(add_city);
    });


</script>