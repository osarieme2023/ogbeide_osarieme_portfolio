<?php
// Include the database connection
require_once('includes/connect.php');

// Query to fetch all projects with their hero image
$query = "SELECT project.project_id, project.title, media.file_path 
          FROM project 
          LEFT JOIN media ON project.project_id = media.project_id 
          WHERE media.media_type = 'image'";

// Execute the query
$results = mysqli_query($connect, $query);

// Check if the query was successful
if (!$results) {
    die('Query failed: ' . mysqli_error($connect));
}

// Fetch all project data
$projects = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/grid.css">
  <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

  <title>Document</title>
</head>

<body>
<header>
    <div class="header-sec grid-con">
      <nav class="navigation col-span-full l-col-start-">
        <picture>
          <img src="images/main-logo.svg" alt="Logo" />
        </picture>

        <ul class="sidebar" id="desk-hid">
          <li>
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                fill="#e8eaed">
                <path
                  d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
              </svg></a>
          </li>
          <li><a href="index.php">PORTFOLIO</a></li>
          <li><a href="about.html">ABOUT</a></li>
          <li><a href="contact.html">CONTACT</a></li>
        </ul>

        <ul>
          <li class="hidemobile"><a href="index.php">PORTFOLIO</a></li>
          <li class="hidemobile"><a href="about.html">ABOUT</a></li>
          <li class="hidemobile"><a href="contact.html">CONTACT</a></li>
          <li class="hideondesktop">
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                fill="#000">
                <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
              </svg>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </header>


<main>
  <section class="index-hero-section">
    <div class="grid-con hero-section">
      <div class="col-span-full hero-section-text">
        <h1>Hello!</h1>
          <p>Welcome, I'm Onoh—a product, motion, and 3D designer based in London, Ontario. I specialize in crafting
            comprehensive UX/UI designs and immersive 3D animations that blend interactivity with visual appeal, creating
            seamless and engaging user experiences.
          </p>
      </div>
    </div>
  </section>

  <section class="projects-section">
    <div class="grid-con projects">
      <div class="col-span-full">
        <!-- Video Section -->
        <video class="player" controls>
          <source src="images/demo-reel.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>

      <div class="down-icon col-span-full">
        <img src="images/down-arrow.svg" alt="">
      </div>

      <!-- Zima Project -->
      <div class="col-span-full l-col-start-1 l-col-span-6 projects-text" id="zima">
        <?php
        foreach ($projects as $project) {
            if (stripos($project['title'], 'zima') !== false) { // Match Zima title partially
                ?>
                <a href="case-study.php?id=<?php echo $project['project_id']; ?>">
                    <img src="images/<?php echo htmlspecialchars($project['file_path']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" width="600">
                </a>
                <div class="btns">
                    <button>Product Design</button>
                    <button>Branding</button>
                </div>
                <?php
                break; // Stop after finding Zima
            }
        }
        ?>
      </div>

      <!-- Ceci Project -->
      <div class="col-span-full l-col-start-7 l-col-span-6 projects-text" id="ceci">
        <?php
        foreach ($projects as $project) {
            if (stripos($project['title'], 'ceci') !== false) { // Match Ceci title partially
                ?>
                <a href="case-study.php?id=<?php echo $project['project_id']; ?>">
                    <img src="images/<?php echo htmlspecialchars($project['file_path']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" width="600">
                </a>
                <div class="btns">
                    <button>Visual Design</button>
                    <button>Branding</button>
                </div>
                <?php
                break; // Stop after finding Ceci
            }
        }
        ?>
      </div>


      <!-- Zenbuds Project -->
      <div class="col-span-full l-col-start-1 l-col-span-6 projects-text" id="zenbuds">
        <?php
        foreach ($projects as $project) {
            if (stripos($project['title'], 'zenbuds') !== false) { // Match Zenbuds title partially
                ?>
                <a href="case-study.php?id=<?php echo $project['project_id']; ?>">
                    <img src="images/<?php echo htmlspecialchars($project['file_path']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" width="600">
                </a>
                <div class="btns">
                    <button>Product Design</button>
                    <button>Branding</button>
                </div>
                <?php
                break; // Stop after finding Zenbuds
            }
        }
        ?>
      </div>


      <div class="col-span-full l-col-start-7 l-col-span-6 construction">
        <img src="images/Portfolio-image/Cover images/under-construction.png" alt="Under-construction cover image">
      </div>
    </div>
  </section>
  
  <!-- Image and Buttons Section -->

  <section class="connect">
    <div class="grid-con connect-content">
      <div class="col-span-full connect-text">
        <h3>You got to the end?</h3>
        <h4>Amazing!</h4>
        <img src="images/Portfolio-image/Cover images/web-img.png" width="300" alt="footer image">
        <p>Let's Connect</p>
      </div>
    </div>
  </section>
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


<script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
<script src="js/main.js"></script>
</body>

</html>