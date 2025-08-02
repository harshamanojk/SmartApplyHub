<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location: LOGIN.php');
    exit();
}
include('INCLUDES/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ABOUT US | SmartApplyHub</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="about.css">
  <link rel="stylesheet" href="INCLUDES/navbar.css">
  <link rel="icon" href="imgs/LOGO.ico" type="image/x-icon">
</head>
<body>
<?php include('INCLUDES/navbar.php'); ?>

<div class="container mt-5">
  <div class="about-section">
    <h1 class="text-center"><u>HISTORY</u></h1>
    <p>SmartApplyHub was founded with a clear mission: to simplify and modernize the job application process.
    Born out of frustration with lengthy forms and outdated portals, our platform was launched in 2025 to offer a smarter alternative. With a single LinkedIn link, candidates can now apply for jobs in seconds — no resumes, no repetition.
    Our journey began in India, but our vision is global. We're continuously growing, partnering with forward-thinking companies, and helping thousands of candidates discover opportunities that match their skills and goals.</p>

    <hr class="section-divider">

    <h1 class="text-center"><u>A MESSAGE FROM THE OWNER</u></h1>
    <h3>Dear Users,</h3>
    <p>When I started SmartApplyHub, the idea was simple — job applications should not feel like a job in themselves. I’ve seen talented people give up because the process was too complicated. That needed to change.
    Our goal is to make hiring fast, fair, and frictionless — for both companies and candidates.
    Thank you for being part of this journey. Whether you're a job seeker, a recruiter, or a supporter, you're helping us build a smarter future of work.</p>

    <p>Warmest regards,<br>
    Harsha Manoj Kumar<br>
    <strong>Founder & Owner</strong><br>
    <strong>SmartApplyHub</strong></p>
    <img src="imgs/profiles/HARSHA MANOJ K.jpg" alt="OWNER" style="width:125px;">

    <hr class="section-divider">

    <h1 class="text-center"><u>OUR MISSION</u></h1>
    <p>To empower every job seeker with a faster, simpler, and smarter way to apply — using just their LinkedIn profile. We aim to break down barriers in hiring by eliminating outdated processes and helping companies connect with talent instantly.</p>

    <hr class="section-divider">

    <h1 class="text-center"><u>OUR VALUES AND PHILOSOPHY</u></h1>
    <p><strong>1. Simplicity</strong>: We believe the best solutions are the simplest. Applying for a job should take minutes, not hours.</p>
    <p><strong>2. Candidate-Centric</strong>: Everything we build is designed to reduce candidate effort and maximize opportunity.</p>
    <p><strong>3. Trust and Transparency</strong>: We value honesty in hiring. No hidden criteria. No unnecessary steps.</p>
    <p><strong>4. Speed with Quality</strong>: While we aim for fast applications, we never compromise on quality matching.</p>
    <p><strong>5. Innovation with Purpose</strong>: We embrace technology, but only when it genuinely improves user experience.</p>
  </div>
</div>

</body>
</html>