
  <!DOCTYPE html>
<html lang="en">
<head>
    <title>Weather Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="weather-card">
    <h2> Weather Dashboard</h2>

    <form class="form-section">
        <input type="text" id="cityInput" placeholder="Enter city name" required>
    </form>
     
    <form class="form-section">
        <label>Select Date:</label><br>
        <input type="date" id="dateInput"><br><br>
        <button type="button" onclick="getWeather()">Get Weather</button>
    </form>

    <div class="weather-info">
        <h3 id="cityName">City</h3>
        <div class="temp" id="temperature">--°C</div>
        <div class="condition" id="condition">Condition</div>
    </div>

    <!-- <form class="form-section">
        <h4>Feedback</h4>
        <input type="text" placeholder="Your Name"><br>
        <textarea placeholder="Your feedback"></textarea><br>
        <button type="submit">Submit</button>
    </form> -->
    <button type="button" onclick="goToDemo()">More Details</button>
</div>
<script src="File.js"></script>
        
</body>
</html>
