<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: LOGIN.php");
    exit();
}

$company = isset($_GET['company']) ? htmlspecialchars($_GET['company']) : 'the company';
$title = isset($_GET['title']) ? htmlspecialchars($_GET['title']) : 'the job';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Application Submitted | SmartApplyHub</title>
  <link rel="icon" href="imgs/LOGO.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
</head>
<body>
<div class="container text-center mt-5 pt-5">
  <h1 class="text-success mb-4">🎉 Application Submitted!</h1>

  <h4 class="mb-3">
    Thank you, <span class="text-primary"><?= htmlspecialchars($_SESSION['fullname']) ?></span>!
  </h4>

  <p class="lead mb-4">
    Your application for <strong><?= $title ?></strong> at <strong><?= $company ?></strong> has been successfully submitted.<br>
    Our team or the company will reach out to you soon if you're shortlisted.
  </p>

  <a href="OPENINGS.php" class="btn btn-outline-primary me-2">🔙 View More Jobs</a>
  <a href="HOME PAGE.php" class="btn btn-primary me-2">👤 Go to Home Page</a>
  <a href="TRACKER.php" class="btn btn-primary me-2" target="_blank">🔎 Track Your Job Application</a>
</div>

<footer class="text-center py-4 bg-dark text-light mt-5">
  <p>&copy; 2025 SmartApplyHub. All rights reserved.</p>
</footer>

<!-- Confetti -->
<script>
  window.onload = function () {
    confetti({
      particleCount: 120,
      spread: 90,
      origin: { y: 0.6 }
    });
  };
</script>
</body>
</html>
