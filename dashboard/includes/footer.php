<html>
<style>
  html, body {
    height: 50%;
    margin: 0;
    padding: 0;
  }

  .wrapper {
    min-height: 100%;
    margin-bottom: -70px; 
  }

  .content {
    padding-bottom: 70px; 
  }
  .footer {
    height: 70px; 
  }


</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<body>
<div class="wrapper">
  
</div>

<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                <p class="m-0 p-0">Follow us on social media:</p> <br>
                <ul class="list-inline">
                    <?php
                    // Define an array of social media platforms and their URLs
                    $socialMedia = [
                        'Facebook' => 'https://www.facebook.com/',
                        'Twitter' => 'https://twitter.com/?lang=en',
                        'Instagram' => 'https://www.instagram.com/',
                        'LinkedIn' => 'https://www.linkedin.com/'
                        // Add more social media platforms as needed
                    ];

                    // Iterate over the array to generate the HTML for social media icons
                    foreach ($socialMedia as $platform => $url) {
                        echo '<li class="list-inline-item"><a href="' . $url . '"><i class="fab fa-' . strtolower($platform) . ' fa-2x" style="color: white; margin-right: 12px;"></i></a></li>';
                    }
                    ?>
                </ul>
               
            </div>
            <div class="col-md-6 text-center text-md-end">
                <section class="credit">
                    <p>Created by <span>Group 30</span> | All rights reserved!</p>
                </section>
                <?php
            // Define the API endpoint URL and the API key
            $endpoint = "https://api.openweathermap.org/data/2.5/weather";
            $apiKey = "2a1d1e901fd14da5a91e00522576195d";

            // Define the city and country code for the weather information you want to retrieve
            $city = "Pristina";
            $countryCode = "xk";

            // Build the API request URL with the city, country code, and API key
            $requestUrl = $endpoint . "?q=" . $city . "," . $countryCode . "&appid=" . $apiKey;

            // Send the API request and get the response data
            $response = file_get_contents($requestUrl);

            // Parse the response data as JSON
            $weatherData = json_decode($response, true);

            // Extract the temperature and weather description from the weather data
            $temperature = $weatherData["main"]["temp"];
            $description = $weatherData["weather"][0]["description"];

            // Print out the temperature and weather description
            echo "The temperature in " . $city . " is " . $temperature . " Kelvin. The weather is " . $description . ".<br>";
            // Check if there is a session variable for the number of visits and increment it
            if ( ! isset ( $_SESSION [ 'page_visit_count' ])) {
                $_SESSION [ 'page_visit_count' ] = 1 ; // Initialize the visit count if it doesn't exist
                } else {
                $_SESSION [ 'page_visit_count' ] += 1 ; // Increase the number of visits
                }
                
                echo "The number of visits to this page is: " . $_SESSION [ 'page_visit_count' ];
                
            ?>
            </div>
        </div>
    </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        if(document.getElementById('search')) {
            document.getElementById('search').addEventListener('keyup', (e) => {
                switch(e.keyCode) {
                    case 13:
                        window.location.href = `http://localhost/e-commerce/shop.php?search=${e.target.value}`
                        break
                }
            })
        }
</script>

<div style="text-align: center; font-size:large">


</body>
</html>