<?php
require_once('includes/connect.php');


$project_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($project_id === 0) {
    echo "Invalid project ID.";
    exit;
}

// Query to fetch project details
$project_query = "SELECT * FROM project WHERE project_id = $project_id";
$project_result = mysqli_query($connect, $project_query);

if (!$project_result) {
    die('Query failed: ' . mysqli_error($connect));
}

$project_data = mysqli_fetch_assoc($project_result);

if (!$project_data) {
    echo "No project found.";
    exit;
}

// Query to fetch associated media
$media_query = "SELECT file_path, media_type FROM media WHERE project_id = $project_id";
$media_result = mysqli_query($connect, $media_query);

$media_files = [];
while ($row = mysqli_fetch_assoc($media_result)) {
    $media_files[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/grid.css">
  <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
  <title>Case Study</title>
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
      <div class="grid-con">
      <div class="case-hero col-span-full l-col-span-full">
        <?php 
        $hero_image = null;
        foreach ($media_files as $media) {
            if ($media['media_type'] === 'image') {
                $hero_image = $media['file_path'];
                break;
            }
        }
        if ($hero_image): ?>
            <img src="images/<?php echo htmlspecialchars($hero_image); ?>" alt="<?php echo htmlspecialchars($project_data['title']); ?>">
        <?php else: ?>
            <p>No hero image available.</p>
        <?php endif; ?>
      </div>
      </div>
      

      
      <section class="case-bg">
        <div class="grid-con">
          <div class="col-span-full" id="projects-dis">
            <div class="projects-details">
              <h2>Title</h2>
              <p><?php echo htmlspecialchars($project_data['title']); ?></p>
            </div>
            <div class="projects-details">
              <h2>Team</h2>
              <p><?php echo htmlspecialchars($project_data['team']); ?></p>
            </div>
            <div class="projects-details">
              <h2>Role</h2>
              <p><?php echo htmlspecialchars($project_data['role']); ?></p>
            </div>
            <div class="projects-details">
              <h2>Duration</h2>
              <p><?php echo htmlspecialchars($project_data['duration']); ?></p>
            </div>
          </div>
        </div>  
      </section>

      <section class="case-content">
        <div class="grid-con">
          <div class="col-span-full case-content-2">
            <h3>The Problem</h3>
            <p><?php echo nl2br(htmlspecialchars($project_data['challenge'])); ?></p>
          </div>
        </div>
      </section>

      <
      <section class="case-content">
        <div class="grid-con">
          <div class="col-span-full case-content-2">
            <h3>The Solution</h3>
            <p><?php echo nl2br(htmlspecialchars($project_data['solution'])); ?></p>
          </div>
        </div>
      </section>

      
      <section class="case-gallery">
        <div class="grid-con">
        <div class="col-span-full">
          <?php foreach ($media_files as $media): ?>
            <?php if ($media['media_type'] === 'image'): ?>
              <div class="col-span-full case-content-1">
                <img src="images/<?php echo htmlspecialchars($media['file_path']); ?>" alt="Gallery Image">
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
        </div>
        
      </section>

      
      <section class="case-content">
        <div class="grid-con">
          <div class="col-span-full case-content-2">
            <h3>The Outcome</h3>
            <p><?php echo nl2br(htmlspecialchars($project_data['outcome'])); ?></p>
          </div>
        </div>
      </section>


      <section id="case-video">
  
        <video class="player" controls>
          <?php
          foreach ($media_files as $media) {
              if ($media['media_type'] === 'video') {
                  echo '<source src="images/' . htmlspecialchars($media['file_path']) . '" type="video/mp4">';
                  break; 
              }
          }
          ?>
          Your browser doest support the video tag.
        </video>
      </section>
    </main>

    <footer class="grid-con">
      <div class="col-span-full footer-con">
        <small>© OGBEIDE ONOH. ALL RIGHTS RESERVED.</small> 
      </div>
    </footer>

    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
