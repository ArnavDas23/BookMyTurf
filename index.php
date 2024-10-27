<?php

    require_once 'conn.php';

    $query = 'SELECT * FROM city';
    $result = $mysqli->query($query);
    while ($row = $result->fetch_assoc()) {
        $city[] = $row;
    }

?>

<!DOCTYPE html>
<html lang = "en">

    <head>

        <!-- TITLE -->
            <title>
                Book My Turf
            </title>
        
        <!-- CSS -->
            <link
                href = ".stylesheets/index.css"
                rel = "stylesheet"
                type = "text/css"
            >
        
        <!-- JAVASCRIPT -->
            <script src = "fetchapi.js">
            </script>

        <!-- OTHER-->
            <meta
                charset = "utf-8"
                name = "viewport"
                content = "
                    width = device-width,
                    initial-scale = 1
                "
            >

    </head>

    <body>
        
        <!-- NAVBAR -->
            <div id = "navbar">
                Navbar
            </div>


        <!-- CITIES -->
            <div id = "cities">
            </div>

            <script>

                let show_cities = [
                    <?php
                        for ($i = 0; $i < count($city); $i++) { 
                            echo "'". $city[$i]['name'] . "', ";
                        }
                    ?>
                ]

                const cities = document.getElementById('cities');

                show_cities.forEach(function(city, index) {
                    console.log(index + ": " + city);

                    const city_button = document.createElement('button');
                    city_button.textContent = city;
                    cities.appendChild(city_button);
                    city_button.addEventListener('click', function() {
                        getTurf(city);
                    });
                });

            </script>

        <!-- TURFS -->
            <div id = "turfs">
            </div>

            <script>

                const turfs =  document.getElementById('turfs');

                function getTurf(city) {
                    const apiUrl = "getTurf.php"
                    var formData = new FormData()
                    formData.append("city", city)

                    bdPostData(apiUrl, formData).then((response) => {
                        turf(response)
                    })
                }

                function turf(response) {
                    turfs.innerHTML = "";
                    for (let x in response) {
                        console.log(response[x]['name'])
                        // s = s + "<br>" + response[x]['name'];

                        const turf_button = document.createElement('button');
                        turf_button.textContent = response[x]['name'];

                        turfs.appendChild(turf_button);
                    }
                    // turfs.innerHTML = s;
                }

            </script>

        <!-- BOOK -->
            <div id = "turf_details">
            </div>

            <script>

                const turf_details =  document.getElementById('turfs');

            </script>

    </body>

</html>