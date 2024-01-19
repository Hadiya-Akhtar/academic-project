<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>learn</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body style="background-color:rgb(175,204,202,255);">

    <!--navbar-->
    <nav>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li class="menu">
                <a href="#">Courses</a>
                <ul class="sub-menu">
                    <li><a href="bca.php">BCA</a></li>
                    <li><a href="diploma.php">Diploma</a></li>
                    <li><a href="btech.php">B.tech</a></li>
                    <li><a href="mca.php">MCA</a></li>
                </ul>
            </li>
            <li><a href="roadmap.php">Roadmaps</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>


    <div class="content-wrapper">
      <div class="left-content">
        <p>Design to provide all the information regarding the college ,user can easily access all the information such as notices, notes, previous year question paper and many more and they can raise queries as per their need and get the solution. </p>
        <button class="leftb"><a href="roadmap.php">Get started</a></button>
        <div class="collab">
        <form  action="index.php" method="post">
        <h2>Project Collaboration</h2>
        <?php
            require_once 'database.php';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $email =$_POST['email'];
                $projectDescription =$_POST['project'];
                $skills =$_POST['skills'];
                $timeline =$_POST['timeline'];
            
                    // Insert data into the database
                    $sql = "INSERT INTO collab (name, email, project_description, skills, timeline) VALUES ('$name', '$email', '$projectDescription', '$skills', '$timeline')";
            
                    if ($conn->query($sql) === TRUE) {
                        echo "Data entered successfully!<br>";
                    }
                }

            if (isset($_POST['showUsers']) && $_POST['showUsers'] == 'yes') {
                $sql = "SELECT name ,email  FROM register"; // Adjust the query as needed to fetch relevant user data
            
            $result = $conn->query($sql);

            // Display list of available users
            if ($result->num_rows > 0) {
                echo "<h2>List of Users Available for Collaboration:</h2>";
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li>" . $row["name"] . "</li>";
                }
                echo "</ul>";
            } else {
                echo "No users found.";
            }
            }
        ?> 
            <div class="form-row">
            <label for="showUsers">Do you want to see the list of available users?
                <input type="checkbox" id="showUsers" name="showUsers" value="yes">
                Yes, show available users
            </label>
            </div>        
            
            <div class="form-row">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
        
            <div class="form-row">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
           
            <div class="form-row">
                <label for="project">Project Description:</label>
                <textarea id="project" name="project" required></textarea>
            </div>
           
            <div class="form-row">
                <label for="skills">Skills (comma-separated):</label>
                <input type="text" id="skills" name="skills" required>
            </div>
           
            <div class="form-row">
            <label for="timeline">Timeline:</label>
           <input type="text" id="timeline" name="timeline" required><br>
            </div>
        
           <input type="submit" value="Submit">
        </form>
    </div>
      </div>

      <div class="right-content">
        <img src="/major_project/img/nav_bg.jpeg" alt="">
      </div>
    </div>

    <div id="about">
        <h3>About us</h3>
        <p>Welcome to LearnKro! We are passionate about learning and dedicated to providing a platform that nurtures curiosity and empowers individuals to thrive in the digital age. Our mission is to make education accessible, engaging, and effective for everyone. With a diverse range of courses spanning from cutting-edge technology to timeless academic subjects, we strive to cater to every learner's needs. Our team comprises educators and industry experts committed to delivering high-quality content, fostering a collaborative learning environment, and supporting our learners on their educational journey. Join us and embark on an enriching learning experience that transcends boundaries and unlocks limitless possibilities.</p>
    </div>


<!--about the team now-->
<section class="team">
        <h1 class="heading">Team</h1>
        <div class="box-contain">
            <div class="box">
                <h3>Aditi dwivedi</h3>
                <p>BCA student</p>
                <div class="share">
                    <a href="https://www.instagram.com/" target="_blank" title="contact"><i class="fa fa-instagram"></i></a>
                    <a href="https://in.pinterest.com/" target="_blank" title="contact"><i class="fab fa-pinterest"></i></a>
                    <a href="https://www.linkedin.com/" target="_blank" title="contact"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>

            <div class="box">
                <h3>Hadiya Akhtar</h3>
                <p>BCA student</p>
                <div class="share">
                    <a href="https://www.instagram.com/" target="_blank" title="contact"><i class="fa fa-instagram"></i></a>
                    <a href="https://in.pinterest.com/" target="_blank" title="contact"><i class="fab fa-pinterest"></i></a>
                    <a href="https://www.linkedin.com/" target="_blank" title="contact"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>

            <div class="box">
                <h3>Jyoti kumari</h3>
                <p>BCA student</p>
                <div class="share">
                    <a href="https://www.instagram.com/" target="_blank" title="contact"><i class="fa fa-instagram"></i></a>
                    <a href="https://in.pinterest.com/" target="_blank" title="contact"><i class="fab fa-pinterest"></i></a>
                    <a href="https://www.linkedin.com/" target="_blank" title="contact"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>

            <div class="box">
                <h3>Mansi Saini</h3>
                <p>BCA student</p>
                <div class="share">
                    <a href="https://www.instagram.com/" target="_blank" title="contact"><i class="fa fa-instagram"></i></a>
                    <a href="https://in.pinterest.com/" target="_blank" title="contact"><i class="fab fa-pinterest"></i></a>
                    <a href="https://www.linkedin.com/" target="_blank" title="contact"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>

            <div class="box">
                <h3>Pranjali Pandey</h3>
                <p>BCA student</p>
                <div class="share">
                    <a href="https://www.instagram.com/" target="_blank" title="contact"><i class="fa fa-instagram"></i></a>
                    <a href="https://in.pinterest.com/" target="_blank" title="contact"><i class="fab fa-pinterest"></i></a>
                    <a href="https://www.linkedin.com/" target="_blank" title="contact"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </section>


    <!--footer part-->
  <footer class="footer">
    <div class="footer-column">
        <img src="your_logo.png" alt="Logo">
        <p>Lorem ipsum dolor sit amet, <br>consectetur adipiscing elit.</p>
    </div>
    <div class="footer-column">
        <h3>Courses</h3>
        <ul>
            <li>BCA</li>
            <li>Diploma</li>
            <li>BTech</li>
            <li>MCA</li>
        </ul>
    </div>
    <div class="footer-column">
        <h3>links</h3>        
        <ul>
            <li><a href="./home.php">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="">Courses</a></li>
            <li><a href="./roadmap.php">Roadmap</a></li>
            <li><a href="./login.php">Login</a></li>
        </ul>
    </div>
    <div class="footer-column">
        <h3>Contact</h3>
        <ul class="social-icons">
            <li><a href="#"><i class="fab fa-facebook-f"></i> </a></li>
            <li><a href="#"><i class="fab fa-instagram"></i> </a></li>
            <li><a href="#"><i class="fab fa-youtube"></i> </a></li>
            <li><a href="#"><i class="fab fa-pinterest"></i> </a></li>
        </ul>
    </div>
</footer>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">

  </script>


</body>
</html>