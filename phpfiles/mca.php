<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bca.css">
    <title>MCA DASHBOARD</title>
    <link rel="stylesheet" href="style_courses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <header>
        <h1>MCA</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#1st year subjects">1st year subjects</a></li>
            <li><a href="#2nd year subject">2nd year subject</a></li>
            
        </ul>
    </nav>
    <main>
        <section>
            <h1>Master of Computer Applications(MCA)</h1>
            <p>Duration: Typically a postgraduate program spanning two to three years.</p>

            <p>Curriculum: Covers a range of computer science subjects, including programming, software development, system design, database management, and project management.</p>

            <p>Focus Areas: Emphasizes both theoretical concepts and practical applications to prepare students for the IT industry.</p>

            <p>Career Opportunities: Graduates can pursue careers in software development, systems analysis, IT consulting, and various roles within the computer applications field.</p>

            <p>Project Work: Often includes a significant project component, allowing students to apply their knowledge to real-world scenarios.</p>

            <p>Skill Development: Aims to enhance programming skills, problem-solving abilities, and expertise in handling complex software projects.</p>
        </section>
    </main>

    <div class="container">
        <h1>Notes Update System</h1>
        <form action="mca.php" method="post">
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
        <p>&copy; 2023 MCA DASHBOARD</p>
    </footer>
</body>
</html>