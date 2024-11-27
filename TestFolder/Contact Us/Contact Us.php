<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="style.css">
    <title>Contact Form</title>
</head>
<body>
    <div class="container">
        <div class="contact-form">
            <h1>CONTACT US</h1>
            <p><strong>Our Mission:</strong> Please use the form below to send us a message and we will reply within one business day.<br> 
            You can also drop us an email anytime or feel free to give us a call. We’d love to hear from you!</p>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['message']);

                $to = "lighthousecafe@gmail.com";
                $subject = "New Contact Form Submission";
                $body = "Name: $name\nEmail: $email\nMessage: $message";
                $headers = "From: $email";

                if (mail($to, $subject, $body, $headers)) {
                    echo "<p class='success'>Message sent successfully!</p>";
                } else {
                    echo "<p class='error'>Failed to send message. Please try again later.</p>";
                }
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
                <input type="text" id="name" name="name" placeholder="Your Name" required><br>
                <input type="email" id="email" name="email" placeholder="Your Email" required><br>
                <textarea id="message" name="message" placeholder="Your Message or Comments" required></textarea><br>
                <input type="submit" value="SEND">
            </form>
        </div>

        <div class="location-info">
            <h1>WE ARE LOCATED AT</h1>
            <div class="info-rows">
                <div class="address">
                    <div class="info-item">
                        <img src="Image/maps-and-flags.png" alt="Address" width="70" height="70">
                        <div>
                            <h2>Our address:</h2>
                            <p>Ground floor, Lighthouse Bible Baptist Church, 89 ROTC Hunters St.,<br>
                            Barangay Tatalon, Quezon City, Philippines</p>
                        </div>
                    </div>
                </div>
                <div class="contact-details">
                    <div class="info-item">
                        <img src="Image/call.png" alt="Phone" width="70" height="70">
                        <div>
                            <h2>Phone:</h2>
                            <p>0995 925 1083</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <img src="Image/mail.png" alt="Email" width="70" height="70">
                        <div>
                            <h2>Email:</h2>
                            <p>lighthousecafe@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="map"></div>
        </div>
    </div>
    
    <script>
        // Function to initialize Google Maps
        function initMap() {
            var location = {lat: 14.6192, lng: 121.0521};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: location
            });
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }

        // Form validation function
        function validateForm() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var message = document.getElementById('message').value;

            if (name == "" || email == "" || message == "") {
                alert("All fields must be filled out.");
                return false;
            } else {
                return true;
            }
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
</body>
</html>
