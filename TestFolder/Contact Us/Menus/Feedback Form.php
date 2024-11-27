<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="FeedbackForm.css">
    <title>Feedback Form</title>
</head>
<body class="feed-back-body">
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_lighthouse";

    // Create connection
    $con = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pageRating = isset($_POST['page_rating']) ? $_POST['page_rating'] : null;
    $devices = isset($_POST['devices']) ? implode(", ", $_POST['devices']) : '';
    $otherDevice = isset($_POST['otherDevice']) ? $_POST['otherDevice'] : '';
    $comment = $_POST['comment'];

    if (!empty($otherDevice)) {
        $devices .= ", " . $otherDevice;
    }

    $sql = "INSERT INTO feedback (name, email, page_rating, devices, comment) VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssiss", $name, $email, $pageRating, $devices, $comment);

    if ($stmt->execute()) {
        echo "<p style='color: green;'>Feedback submitted successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $sql . "<br>" . $con->error . "</p>";
    }

    $stmt->close();
    $con->close();
}
?>
<div id="feedback-container">
  <div id="feedback-title">Tell us what you think!</div>
  <form method="POST" action="">
   
   
    <label for="rbPgRating"><div class="feedbackLabel">How would you rate our site?</div></label>
      <fieldset class="selections">
      <label>Needs Work</label>
      <input type="radio" name="page_rating" value="0">
      <input type="radio" name="page_rating" value="1">
      <input type="radio" name="page_rating" value="2">
      <input type="radio" name="page_rating" value="3">
      <input type="radio" name="page_rating" value="4">
      <input type="radio" name="page_rating" value="5">
      <input type="radio" name="page_rating" value="6">
      <input type="radio" name="page_rating" value="7">
      <input type="radio" name="page_rating" value="8">
      <input type="radio" name="page_rating" value="9">
      <input type="radio" name="page_rating" value="10">
      <label>Great</label>
    </fieldset>
    <label for="rbPgRating"><div class="feedbackLabel">What devices do you use to access our site?</div></label>
    <fieldset class="selections">
      <span class="deviceList">
        <input type="checkbox" class="userDevice" id="Tablet" name="devices[]" value="Tablet"><label for="Tablet">Tablet</label>
      </span>
      <span class="deviceList">
        <input type="checkbox" class="userDevice" id="SmartPhone" name="devices[]" value="SmartPhone"><label for="SmartPhone">Smart Phone</label>
      </span>
      <span class="deviceList">
        <input type="checkbox" class="userDevice" id="Desktop" name="devices[]" value="Desktop"><label for="Desktop">Desktop</label>
      </span>
      <br><br>
      <span class="deviceList">
        <input type="checkbox" class="userDevice" id="Other" name="devices[]" value="Other"><label for="Other"><input type="text" class="userDevice" name="otherDevice" placeholder="Other Device" maxlength="25"></label>
      </span>
    </fieldset>
    <label for="comment">
      <div class="feedbackLabel">Additional Comments:</div>
    </label>
    <br>
    <textarea id="comment" class="feedbackInfo comment" name="comment" rows="5" maxlength="700" placeholder="What is your feedback to us?"></textarea>
    <input type="submit" class="btnSubmit" id="btnSubmit">
  </form>
</div>
</body>
</html>
