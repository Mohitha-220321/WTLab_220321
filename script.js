function showWeather() {
    let city = document.getElementById("city").value;

    if (city === "") {
        alert("Please enter a city name");
        return;
    }

    document.getElementById("cityName").innerText = city;
    document.getElementById("temperature").innerText = "29°C";
    document.getElementById("condition").innerText = "Sunny ☀️";
}
