<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bca.css">
    <title>BCA Dashboard</title>
    <link rel="stylesheet" href="style_courses.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <header>
        <h1>BACHELOR OF COMPUTER APPLICATIONS</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#1st year subjects">1st year subjects</a></li>
            <li><a href="#2nd year subject">2nd year subject</a></li>
            <li><a href="#3rd year subjects">3rd year subjects</a></li>
            
        </ul>
    </nav>
    <main>
        <section>
            <h1>Bachelor of Computer Applications (BCA)</h1>
            <p>
            Definition: BCA is an undergraduate degree program in the field of computer applications. It is a three-year program that is designed to provide students with a strong foundation in computer science and its applications.

            <p>Curriculum: The BCA curriculum typically includes subjects related to programming languages, database management, computer networks, software engineering, web development, and computer architecture.</p>

            <p>Eligibility: Generally, students who have completed their 10+2 education in the science stream with mathematics as a core subject are eligible for admission to BCA programs. Some universities may also have entrance exams for admission.</p>

            <p>Skills: BCA graduates acquire skills in programming, software development, database management, networking, and problem-solving. They are equipped to work in various roles within the IT industry.</p>

            <p>Career Opportunities: BCA graduates have opportunities in a wide range of fields such as software development, web development, database administration, system analysis, network administration, and more. They can work in both the private and public sectors.</P>

            <p>Further Studies: After completing BCA, many students choose to pursue higher education like Master of Computer Applications (MCA) or other specialized postgraduate programs in computer science.</p>

            <p>Importance: With the increasing reliance on technology in various industries, BCA plays a crucial role in providing skilled professionals to meet the growing demand for IT expertise.</p>

            <p>Job Profiles: BCA graduates can work as software developers, system analysts, database administrators, network administrators, web developers, and more.</p>
        </section>
    </main>

    <div class="container">
        <h1>Notes Update System</h1>
        <form action="bca.php" method="post">
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
        <p>&copy; 2023 BCA Dashboard</p>
    </footer>
</body>
</html>