<?php
// Include the database connection
require_once('includes/connect.php');

// Get the project_id from the URL (e.g., case-study.php?id=1)
$project_id = isset($_GET['id']) ? (int)$_GET['id'] : 0; // Sanitize input by casting to integer

// Check if the project ID is valid
if ($project_id === 0) {
    echo "Invalid project ID.";
    exit;
}

// Query to get the project details and associated media
$query = "SELECT project.project_id, project.title, project.challenge, project.solution, project.outcome, 
                 project.team, project.role, project.duration, 
                 media.file_path, media.media_type 
          FROM project 
          LEFT JOIN media ON project.project_id = media.project_id 
          WHERE project.project_id = $project_id";

// Execute the query
$results = mysqli_query($connect, $query);

// Check if the query was successful
if (!$results) {
    die('Query failed: ' . mysqli_error($connect));
}

// Fetch the project data
$project_data = mysqli_fetch_assoc($results);

// If no data found for the given project ID, display a message
if (!$project_data) {
    echo "No project found.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/grid.css">
  <title>Case-study Page</title>
</head>

<body>
    <header>
        <div class="logo">
          <img src="images/portfolio-logo.svg" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.html">PORTFOLIO</a></li>
                <li><a href="about.html">ABOUT</a></li>
                <li><a href="contact.html">CONTACT</a></li>
            </ul>
        </nav>
    </header>

    <main>
      <div class="case-hero">
        <img src="images/Portfolio-image/zima/zima1.png" alt="Zima-bottles" width="600"> 
      </div>

      <section class="case-bg">
        <div class="grid-con">
          <div class="col-span-full" id="projects-dis">
            <div class=" projects-details ">
              <h2>Project Details</h2>
              <p><strong>Title:</strong> <?php echo htmlspecialchars($project_data['title']); ?></p>
            </div>
      
    
            <div class=" projects-details ">
              <h2>Team</h2>
              <p>Wisdom Okutepa</p>
              <p>Ogbeide Osarieme</p>
            </div>
      
            <div class="projects-details ">
              <h2>Role</h2>
              <p>3D Animator</p>
              <p>Video Editor</p>
            </div>
  
            <div class="projects-details">
              <h2>Duration</h2>
              <p>14 Weeks</p>
            </div>
          </div>
        </div>  
      </section>
  
      <div class="col-span-full case-content-1">
        <img src="images/Portfolio-image/zima/zima2.png" alt="bottle2" width="600">
      </div>

      <section class="case-content">
        <div class="grid-con">
          
           
          <div class="col-span-full case-content-2">
            <p>
              Zima, a nostalgic malt beverage originally launched in 1993, has been reimagined 
              with a fresh twist in our project. Our team developed a brand that pays homage to 
              Zima's unique legacy while introducing exciting new flavors: Red Mango Blend,  
              Berry Bliss Blend, and Blend Zero. Each flavor is crafted to evoke the refreshing 
              essence of Zima, aiming to attract both loyal fans and new consumers looking for 
              a vibrant and enjoyable drink experience.
            </p>
          </div> 
        </div>
      </section>
    
      <div class="col-span-full case-content-1">
        <img src="images/Portfolio-image/zima/zima3.png" alt="bottle3" width="600">
      </div>

      <section class="case-content">
        <div class="grid-con">
          
          
          <div class="col-span-full case-content-2">
            <h3>The Challenge</h3>
            <p>
              During the project, I struggled to align the 3D animation's <br>
            color palette with Zima's brand identity, requiring multiple <br>
            iterations and teamwork to achieve a cohesive visual narrative <br>
            that appealed to both nostalgic and new audiences.<br>
            </p>
          </div>
        </div>
      </section>
    
      <div class="col-span-full case-content-1">
        <img src="images/Portfolio-image/zima/zima4.png" alt="bottle4" width="600">
      </div>
  
      <section class="case-content">
        <div class="grid-con">
          
          
          <div class="col-span-full case-content-2">
            <h3>The Solution</h3>
          <p>To address this, I collaborated with my teammate to develop a 
          unified color palette that blended Zima's original branding 
          with modern hues. By applying this palette in Cinema 4D and 
          using color grading techniques in After Effects, we achieved a 
          consistent and engaging visual representation of the brand.
          </div>
        </div>
      </section>
  
    
      <div class="col-span-full case-content-1">
        <img src="images/Portfolio-image/zima/zima5.png" alt="bottle5" width="600">
      </div>

      <section class="case-content">
        <div class="grid-con">
          <div class="col-span-full case-content-2">
            <h3>The Outcome</h3>
            <p>The project resulted in a visually appealing promotional video
            that effectively showcased the new Zima brand and its flavors,
            appealing to both nostalgic and younger audiences.
            </p>
          </div>
        </div>
      </section>
  
    
  
      <section>
        <video width="640" height="360" controls>
        <source src="images/Zima-infomacial.MP4" type="video/mp4">
        Your browser does not support the video tag.
        </video>
      </section>

      <div>
        <a href="zenbuds.html">
          <button><strong>Next Project</strong></button>
        </a>
      </div>
    </main>
  
    <footer class="grid-con">
      <div class="col-span-full footer-con">
        <small>© OGBEIDE ONOH. ALL RIGHTS RESERVED.</small> 
          <div>
            <a href="https://www.linkedin.com/in/your-profile" target="_blank">
              <img src="images/Portfolio-image/Cover images/LinkedIn.png" alt="LinkedIn Profile" width="30">
            </a>
          </div>
      </div>
  </footer> 
</body>

</html>
