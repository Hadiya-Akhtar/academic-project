<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bca.css">
    <title>BTECH DASHBOARD</title>
    <link rel="stylesheet" href="style_courses.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <header>
        <h1>Bachelor of Technology</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#1st year subjects">1st year subjects</a></li>
            <li><a href="#2nd year subject">2nd year subject</a></li>
            <li><a href="#3rd year subjects">3rd year subjects</a></li>
            <li><a href="4th year subjects">4th year subjects</a></li>
            
        </ul>
    </nav>
    <main>
        <section>
            <h1>Bachelor of Technology(BTech)</h1>
            <p>Bachelor of Technology (B.Tech) is an undergraduate academic degree awarded in various engineering disciplines. It is a four-year program that focuses on providing students with a strong foundation in engineering principles and technical skills. B.Tech programs typically include a combination of classroom lectures, laboratory work, and practical projects</p>
            <p>Specializations: B.Tech programs offer specializations in various engineering disciplines such as Civil Engineering, Mechanical Engineering, Electrical Engineering, Computer Science and Engineering, Electronics and Communication Engineering, and more.</p>
            <p>Curriculum: The curriculum is designed to cover fundamental engineering subjects in the first few years, followed by more specialized and advanced topics in the chosen branch during the later years. It often includes practical training, industrial visits, and internships.</p>
            <p>Admission: Admission to B.Tech programs is usually based on entrance exams, with each country or region having its own set of exams. Some well-known entrance exams include JEE (Joint Entrance Examination) in India, SAT (Scholastic Assessment Test) in the United States, and others.</p>

            <p>Degree Recognition: B.Tech is a globally recognized degree, and graduates often find opportunities for employment or further studies in various parts of the world.</P>

            <p>Career Opportunities: B.Tech graduates can pursue careers in diverse industries such as information technology, manufacturing, construction, telecommunications, and research and development. Job roles may include software engineer, mechanical engineer, electrical engineer, and more.</p>

        </section>
    </main>

    <div class="container">
        <h1>Notes Update System</h1>
        <form action="btech.php" method="post">
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
        <p>&copy; 2023 Btech Dashboard</p>
    </footer>
</body>
</html>