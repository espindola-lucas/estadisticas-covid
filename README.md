# Project of the subject Web Programming II, Faculty of Exact Sciences. Tandil, Buenos Aires

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/60a16024fe4c44d78a764c0e4f8a9afd)](https://app.codacy.com/gh/espindola-lucas/estadisticas-covid?utm_source=github.com&utm_medium=referral&utm_content=espindola-lucas/estadisticas-covid&utm_campaign=Badge_Grade)
[![codecov](https://codecov.io/gh/espindola-lucas/estadisticas-covid/branch/master/graph/badge.svg)](https://codecov.io/gh/espindola-lucas/estadisticas-covid)
<!-- ![Static Code Analysis](https://github.com/espindola-lucas/estadisticas-covid/workflows/Static%20Code%20Analysis/badge.svg)
![Dusk Tests](https://github.com/espindola-lucas/estadisticas-covid/workflows/Dusk%20Tests/badge.svg)
![Laravel](https://github.com/espindola-lucas/estadisticas-covid/workflows/Laravel/badge.svg) -->
![Deploy](https://github.com/espindola-lucas/estadisticas-covid/workflows/Deploy/badge.svg)

<h2>Link to the application deployed in heroku</h2>

https://statistics-covid-app.herokuapp.com/

<h3>Steps to follow to have the application running on your machine:</h3>
    <ol>
        <li>
            Install docker for your operating system (https://docs.docker.com/get-docker/)        
        </li>
        <li>
            Clone the repository
        </li>
        <li>
            Make a copy of the .env.example file, and rename it as .env and configure the following
        <ul>
            <li> 
                DB_CONNECTION=pgsql 
            </li>
            <li> 
                DB_HOST=database 
            </li>
            <li> 
                DB_PORT=5432 
            </li>
            <li> 
                DB_DATABASE=mydb  
            </li>
            <li> 
                DB_USERNAME=myuser 
            </li>
            <li> 
                DB_PASSWORD=thisisasecretpassword
            </li>
          </ul>
        <li>
            Execute the command (sudo docker run --rm -v $ (pwd): / app composer install) to download missing files for the correct operation of the application
        </li>
        <li>
            Generate the key for the .env file with the following command (php artisan key: generate)
        </li>
        <li>
            Run docker-compose up -d, open the browser and go to localhost:8080 (or whatever port you have exposed)
        </li>
    </ol>
