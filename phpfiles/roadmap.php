<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bca.css">
    <title>Roadmap</title>
    <link rel="stylesheet" href="style_courses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

    <header>
        <h1>HERE IS YOUR ROADMAP</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#">WEB_DEVLOPMENT</a></li>
            <li><a href="#">DATA_SCIENCE</li>
            <li><a href="#">FRONTEND</a></li>
            <li><a href="#">BACKEND</a></li>
            <li><a href="#">SKILLBASE_ROADMAP</a></li>
            
        </ul>
    </nav>
    <main>

    <div class="form-container">
    <form action="roadmap.php" method="post">
      <div class="form-group">
        <label for="fieldOfInterest">Field of Interest:</label>
        <select name="fieldOfInterest" id="fieldOfInterest" required>
          <option value="">Select Field</option>
          <option value="Web Development">Web Development</option>
          <option value="Data Science">Data Science</option>
          <option value="Frontend">Frontend</option>
          <option value="Frontend">Backend</option>
          <option value="Frontend">Python</option>
        </select>
      </div>
      <div class="form-group">
        <label for="duration">Duration:</label>
        <input type="text" name="duration" id="duration" placeholder="e.g., 2 months" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div><br><br><br><br>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'database_for_resources.php';

    // Check if form fields are set and not empty
    if (isset($_POST['fieldOfInterest']) && isset($_POST['duration'])) {
        $fieldOfInterest = $_POST['fieldOfInterest'];
        $duration = $_POST['duration'];

        // Insert data into the database
        $sql = "INSERT INTO user_input (field, duration) VALUES ('$fieldOfInterest', '$duration')";

        if ($conn->query($sql) === TRUE) {
            echo "Data entered successfully!<br>";

            // Execute recommendation.py and capture output
            $pythonOutput = shell_exec('python recommendation.py 2>&1');

            // Display Python script output
            if ($pythonOutput !== null) {
                echo "<h3>Learning path:</h3>";
                echo "<pre>$pythonOutput</pre>"; // Output within <pre> tags for formatting
            } else {
                echo "Error executing Python script";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Field of Interest or Duration is missing";
    }
}
?>


  <section>
      <h3>Resources to study topics</h3>
      <ul>
          <li><a href="web_devlopment.php">WEB_DEVLOPMENT</a></li>
          <br>
          <li><a href="datascience.php">DATA_SCIENCE</li>
          <br>
          <li><a href="frontend.php">FRONTEND</a></li>
          <br>
          <li><a href="backend.php">BACKEND</a></li>
          <br>
      
      </ul>
  </section>
    </main>
    <footer>
        <p>&copy; 2023 BCA</p>
    </footer>
</body>
</html>