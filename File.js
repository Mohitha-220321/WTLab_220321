
    function getWeather(){
        var city = document.getElementById("cityInput").value;
        var date = document.getElementById("dateInput").value;
        var temp = "28°C";
        var weather = "Sunny";

        document.getElementById("cityName").innerText = city;
        document.getElementById("temperature").innerText = temp;
        document.getElementById("condition").innerText = weather;
        document.getElementById("dateDisplay").innerText = date;
    }
    function goToDemo() {
    window.location.href = "demo.html";
}




