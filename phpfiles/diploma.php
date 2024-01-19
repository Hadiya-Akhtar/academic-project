<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bca.css">
    <title>diploma DASHBOARD</title>
    <link rel="stylesheet" href="style_courses.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <header>
        <h1>DIPLOMA</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#1st year subjects">1st year subjects</a></li>
            <li><a href="#2nd year subject">2nd year subject</a></li>
            <li><a href="#3rd year subjects">3rd year subjects</a></li>
            
            
        </ul>
    </nav>
    <main>
        <!-- Dashboard content goes here -->
        <section>
            <h1>DIPLOMA</h1>
            <p>A diploma is a certificate or credential awarded by an educational institution, typically after the completion of a specific course of study. Here are some key points related to diplomas:</p>
            <p>Level of Education: A diploma is often associated with post-secondary education and is considered to be at a level below a bachelor's degree. However, there are also high school diploma programs.</p>
            <p>Duration: Diploma programs vary in length, ranging from a few months to a couple of years, depending on the field of study and the educational institution..</p>
            <p>Specializations: Diplomas are available in a wide range of fields, including business, technology, healthcare, arts, and more. They may provide specialized knowledge and practical skills related to a specific industry or profession..</p>

            <p>Entry Requirements: Admission to diploma programs typically requires a high school diploma or equivalent. Some programs may have additional entrance exams or criteria..</P>

            <p>Professional Development: Some professionals choose to pursue diplomas as a form of professional development, allowing them to acquire new skills or stay updated in their field without committing to a more extensive degree program.</p>

        </section>
    </main>

    <div class="container">
        <h1>Notes Update System</h1>
        <form action="diploma.php" method="post">
          <label for="subject">Select Subject:</label>
          <select name="subject" id="subject">
            <option value="BCA">BCA</option>
            <option value="Diploma_CS">Diploma in Computer Science</option>
            <option value="Btech_CS">B.Tech Computer Science</option>
            <option value="MCA">MCA</option>
          </select>
          <br><br>
          <label for="notes">Update Notes:</label>
          <textarea name="notes" id="notes" cols="30" rows="10"></textarea>
          <br><br>
          <input type="submit" value="Update Notes">
        </form>
    </div>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once 'database.php';
            // Check if both subject and notes are set and not empty
            if (isset($_POST['subject']) && isset($_POST['notes']) && !empty($_POST['subject']) && !empty($_POST['notes'])) {
                // Sanitize user input to prevent SQL injection or other attacks
                $subject = htmlspecialchars($_POST['subject']);
                $notes = htmlspecialchars($_POST['notes']);
                
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                // Prepare SQL statement to insert user input into the database
                $sql = "INSERT INTO notes_table (subject, notes) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                
                // Bind parameters and execute the statement
                $stmt->bind_param("ss", $subject, $notes);
                
                if ($stmt->execute()) {
                    echo "Notes updated successfully!";
                } else {
                    echo "Error updating notes: " . $stmt->error;
                }
                
                // Close the statement and connection
                $stmt->close();
                $conn->close();
            } else {
                echo "Please fill out both subject and notes.";
            }
        }    
    ?>

    <footer>
        <p>&copy; 2023 Diploma Dashboard</p>
    </footer>
</body>
</html>