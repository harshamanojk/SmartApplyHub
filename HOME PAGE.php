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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HOME PAGE | SmartApplyHub</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="INCLUDES/navbar.css">
  <link rel="icon" href="imgs/LOGO.ico" type="image/x-icon">
  <style>
    body {
      margin: 0;
      padding: 0;
    }
    .hero {
      margin-top: 100px;
      padding: 40px 20px;
      background-color: #f8f9fa;
    }
    .new1 {
      width: 60px;
      border: 2px solid #0d6efd;
      margin: 0 auto;
    }
    .features-section h2 {
      font-weight: bold;
    }
  </style>
</head>
<body>

<?php include('INCLUDES/navbar.php'); ?>

<section class="hero text-center">
  <h1 class="display-5 fw-bold">SMARTAPPLY HUB</h1>
  <p class="lead mb-4">Apply to Jobs with Just your LinkedIn.</p>
  <p class="lead mb-4">No resumes. No forms. Just paste your profile and click apply.</p>
</section>

<section class="features-section text-center py-5">
  <hr class="mb-4 new1">
  <h2 class="mb-4"><u>How It Works</u></h2>
  <div class="row justify-content-center">
    <div class="col-md-4">
      <i class="bi bi-search fs-1"></i>
      <h4>1. Find a Job</h4>
      <p>Browse through curated listings and pick one you love.</p>
    </div>
    <div class="col-md-4">
      <i class="bi bi-linkedin fs-1"></i>
      <h4>2. Share LinkedIn</h4>
      <p>Paste your LinkedIn profile link—no resume needed.</p>
    </div>
    <div class="col-md-4">
      <i class="bi bi-send-check fs-1"></i>
      <h4>3. Apply Instantly</h4>
      <p>Submit in one click. We'll handle the rest.</p>
    </div>
  </div>
</section>

<section class="features-section text-center py-5">
  <hr class="mb-4 new1">
  <h2><u>Why SmartApplyHub?</u></h2>
  <div class="row mt-4 justify-content-center">
    <div class="col-md-4">
      <i class="bi bi-lightning-charge fs-1 text-primary"></i>
      <h5 class="mt-3">Fast Applications</h5>
      <p>Apply to jobs in seconds without the hassle of forms or resumes.</p>
    </div>
    <div class="col-md-4">
      <i class="bi bi-person-check fs-1 text-success"></i>
      <h5 class="mt-3">Verified Recruiters</h5>
      <p>We work only with trusted companies to ensure authentic job listings.</p>
    </div>
    <div class="col-md-4">
      <i class="bi bi-shield-lock fs-1 text-danger"></i>
      <h5 class="mt-3">Privacy First</h5>
      <p>Your data is never stored or shared without your permission.</p>
    </div>
  </div>
</section>

<footer class="text-center py-4 bg-dark text-light">
  <p>&copy; 2025 SmartApplyHub. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
