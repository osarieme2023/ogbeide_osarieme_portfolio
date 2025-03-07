<?php
// Database connection using PDO
require_once('includes/connect.php');

try {
    $stmt = $connect->prepare("SELECT p.project_id AS pid, p.title AS proj_title, m.file_path AS img_path 
                               FROM project p 
                               LEFT JOIN media m ON p.project_id = m.project_id 
                               WHERE m.media_type = 'image'");
    $stmt->execute();
    $projectData = $stmt->fetchAll();
} catch (PDOException $e) {
    die('Database error: ' . $e->getMessage());
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
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script type="module" src="js/main.js"></script>
    <title>Onoh's Portfolio</title>
</head>
<body>
    <header>
        <div class="header-sec grid-con">
            <nav class="navigation col-span-full">
                <picture>
                    <img src="images/main-logo.svg" alt="Onoh's Logo" />
                </picture>
                <ul class="sidebar" id="desk-hid">
                    <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" /></svg></a></li>
                    <li><a href="index.php">PORTFOLIO</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
                <ul>
                    <li class="hidemobile"><a href="index.php">PORTFOLIO</a></li>
                    <li class="hidemobile"><a href="about.html">ABOUT</a></li>
                    <li class="hidemobile"><a href="contact.php">CONTACT</a></li>
                    <li class="hideondesktop"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" /></svg></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="index-hero-section">
            <div class="grid-con hero-section">
                <div class="col-span-full hero-section-text">
                    <h1>Hello!</h1>
                    <p>Welcome, I'm Onoh—a product, motion, and 3D designer based in London, Ontario. I specialize in crafting comprehensive UX/UI designs and immersive 3D animations that blend interactivity with visual appeal, creating seamless and engaging user experiences.</p>
                </div>
            </div>
        </section>

        <section class="projects-section">
            <div class="grid-con projects">
                <div class="col-span-full">
                    <video class="player" controls>
                        <source src="images/demo-reel.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="down-icon col-span-full">
                    <img src="images/down-arrow.svg" alt="Scroll down">
                </div>

                <?php
                $projectTitles = ['zima', 'ceci', 'zenbuds'];
                $positions = [
                    'zima' => 'l-col-start-1 l-col-span-6',
                    'ceci' => 'l-col-start-7 l-col-span-6',
                    'zenbuds' => 'l-col-start-1 l-col-span-6'
                ];
                foreach ($projectTitles as $key) {
                    foreach ($projectData as $proj) {
                        if (stripos($proj['proj_title'], $key) !== false) {
                            echo "<div class='col-span-full {$positions[$key]} projects-text project' id='$key'>";
                            echo "<a href='case-study.php?id=" . htmlspecialchars($proj['pid']) . "'>";
                            echo "<img src='images/" . htmlspecialchars($proj['img_path']) . "' alt='" . htmlspecialchars($proj['proj_title']) . "' width='600'>";
                            echo "</a>";
                            echo "<div class='btns'>";
                            echo "<button>Product Design</button><button>Branding</button>";
                            echo "</div>";
                            echo "</div>";
                            break;
                        }
                    }
                }
                ?>
                <div class="col-span-full l-col-start-7 l-col-span-6 construction">
                    <img src="images/Portfolio-image/Cover images/under-construction.png" alt="Under construction">
                </div>
            </div>
        </section>

        <section class="connect">
            <div class="grid-con connect-content">
                <div class="col-span-full connect-text">
                    <h3>You got to the end?</h3>
                    <h4>Amazing!</h4>
                    <img src="images/Portfolio-image/Cover images/web-img.png" width="300" alt="Footer image">
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
                    <img src="images/Portfolio-image/Cover images/LinkedIn.png" alt="LinkedIn" width="30">
                </a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@latest/bundled/lenis.min.js"></script>
    <script type="module">
        import { initSidebar } from './js/sidebar.js';
        import { animateHeader, animateProjects } from './js/animations.js';
        const player = new Plyr('.player');
        initSidebar();
        animateHeader();
        animateProjects();

        const lenis = new Lenis();
        function raf(time) { lenis.raf(time); requestAnimationFrame(raf); }
        requestAnimationFrame(raf);
    </script>
</body>
</html>