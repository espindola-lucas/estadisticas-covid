"use strict"
document.addEventListener("DOMContentLoaded", function(event) {
    let unorderedList = document.getElementById("city");
    unorderedList.innerHTML = '<li> Cargando...</li>'
    fetch("http://localhost:8080/api/cities", {
        headers: {
            Authorization: 'Bearer LoPwjQMVNk3C0wpB1eIjnIfOn5rm4hOV8ezIXAm1'
        }
    }).then(
        function(response) {
            return response.json();
        }
    ).then(function(json) {
        console.log(json);
        unorderedList.innerHTML = '';
        for (let city of json) {
            unorderedList.innerHTML += '<li>' + city.name + '</li>';
        }
    })
});