"use strict"
document.addEventListener("DOMContentLoaded", function() {
    let loading = document.getElementById("loading");
    loading.innerHTML = 'Cargando...'
    fetch("http://localhost:8080/api/cities", {
        headers: {
            Authorization: 'Bearer 0xTasxdhzNlBWyB6Gr4dTq9xVfoW6XXrXT3fCBny'
        }
    }).then(
        function(response) {
            return response.json();
        }
    ).then(function(json) {
        loading.innerHTML = '';
        console.log(json);
        let table = document.getElementById("city");
        table.innerHTML = '';
        for (let city of json) {
            table.innerHTML += '<tr>' + '<td>' + city.name + '</td>' + '<td>' + city.population + ' habitantes </td>' + '</tr>';
        }
    })
});