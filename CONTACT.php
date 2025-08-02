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
  <title>TIMINGS & CONTACT  | SmartApplyHub</title>
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
  <div class="about-section text-center">
    <h1 class="mb-4"><u>Our Timings ⏲️</u></h1>
    <p><strong>Monday – Friday:</strong> 08:00 AM – 08:00 PM</p>
    <p><strong>Saturday & Sunday:</strong> 08:00 AM – 02:00 PM</p>

    <hr class="my-4">

    <h1 class="mb-4"><u>Contact 📞</u></h1>
    <address class="text-start mx-auto" style="max-width: 600px;">
      <p><i class="fas fa-building"></i> <strong>Address:</strong> 210, Gandhi Nagar, Bandra, Mumbai, Maharashtra, India</p>
      <p><i class="fas fa-envelope"></i> <strong>Email:</strong> 
        <a href="mailto:smartapplyhub@gmail.com?subject=Inquiry%20via%20Website&body=Hello%2C%0AI%20have%20a%20question%20regarding..." class="text-decoration-underline">
          smartapplyhub@gmail.com
        </a>
      </p>
      <p><i class="fas fa-mobile-alt"></i> <strong>Mobile (TIA):</strong> 0229614351</p>
      <p><i class="fas fa-phone"></i> <strong>Landline:</strong> 0222456789</p>
    </address>

    <hr class="my-4">
  </div>
</div>

<footer class="text-center py-4 bg-dark text-light">
  <p>&copy; 2025 SmartApplyHub. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

