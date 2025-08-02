<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: LOGIN.php");
    exit();
}

include('INCLUDES/db.php');

if (!isset($_GET['job_id'])) {
    echo "Invalid job ID.";
    exit();
}

$job_id = intval($_GET['job_id']);

// Fetch job info
$stmt = $conn->prepare("SELECT * FROM job_openings WHERE id = ?");
$stmt->bind_param("i", $job_id);
$stmt->execute();
$result = $stmt->get_result();
$job = $result->fetch_assoc();

if (!$job) {
    echo "Job not found.";
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_SESSION['fullname'];
    $email = $_SESSION['email'];
    $linkedin = trim($_POST['linkedin']);
    $job_description = $job['title']; 
    $company = $job['company'];

    if (!empty($linkedin)) {
        $insert = $conn->prepare("INSERT INTO applications
            (job_id, job_description, company, fullname, email, linkedin_url) 
            VALUES (?, ?, ?, ?, ?, ?)");
        $insert->bind_param("isssss", $job_id, $job_description, $company, $fullname, $email, $linkedin);
        $insert->execute();

        header("Location: CONFIRMATION.php?company=" . urlencode($company) . "&title=" . urlencode($job_description));
        exit();
    } else {
        $error = "Please enter your LinkedIn profile URL.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>APPLY TO <?= htmlspecialchars($job['title']) ?> | SmartApplyHub</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="imgs/LOGO.ico" type="image/x-icon">
</head>
<body>
<div class="container mt-5 pt-4">
  <h2 class="text-center mb-4">
    Apply for <u><?= htmlspecialchars($job['title']) ?></u> at <u><?= htmlspecialchars($job['company']) ?></u>
  </h2>

  <!-- Company Logo -->
  <div class="text-center mb-4">
    <img src="<?= htmlspecialchars($job['logo']) ?>" alt="<?= htmlspecialchars($job['company']) ?> Logo"
         style="max-height: 100px;" class="img-fluid">
  </div>

  <?php if (isset($error)): ?>
    <div class="alert alert-danger text-center">❌ <?= $error ?></div>
  <?php endif; ?>

  <!-- Application Form -->
  <form method="POST" class="mx-auto" style="max-width: 600px;">
    <div class="mb-3">
      <label class="form-label">Full Name</label>
      <input type="text" name="fullname" class="form-control" value="<?= htmlspecialchars($_SESSION['fullname']) ?>" readonly>
    </div>

    <div class="mb-3">
      <label class="form-label">Email Address</label>
      <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($_SESSION['email']) ?>" readonly>
    </div>

    <div class="mb-3">
      <label class="form-label">Job Title</label>
      <input type="text" class="form-control" value="<?= htmlspecialchars($job['title']) ?>" readonly>
    </div>

    <div class="mb-3">
      <label class="form-label">Company</label>
      <input type="text" class="form-control" value="<?= htmlspecialchars($job['company']) ?>" readonly>
    </div>

    <div class="mb-3">
      <label class="form-label">LinkedIn Profile URL</label>
      <input type="url" name="linkedin" class="form-control" required placeholder="https://www.linkedin.com/in/yourname"
             pattern="https://(www\.)?linkedin\.com/in/.+">
      <small class="form-text text-muted">Must start with https://www.linkedin.com/in/</small>
    </div>

    <button type="submit" class="btn btn-primary w-100">Submit Application</button>
  </form>
</div>

<footer class="text-center py-4 bg-dark text-light mt-5">
  <p>&copy; 2025 SmartApplyHub. All rights reserved.</p>
</footer>
</body>
</html>
