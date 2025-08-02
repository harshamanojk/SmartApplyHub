<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location: LOGIN.php');
    exit();
}
include('INCLUDES/db.php');
include('INCLUDES/navbar.php');

$jobs = [];
$sql = "SELECT * FROM job_openings";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $jobs[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>COMPANY OPENINGS | SmartApplyHub</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Explore the latest job openings from top companies and apply easily using SmartApplyHub.">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="INCLUDES/navbar.css">
  <link rel="icon" href="imgs/LOGO.ico" type="image/x-icon">
</head>
<body>

<div class="container mt-5 pt-5">
  <h2 class="text-center mt-2 mb-4"><u>Job Openings</u></h2>
  <div class="row">
    <?php if (empty($jobs)): ?>
      <div class="col-12 text-center text-muted">
        <p>No job openings available at the moment. Please check back later.</p>
      </div>
    <?php else: ?>
      <?php foreach ($jobs as $job): ?>
        <div class="col-md-4 mb-4">
          <div class="card shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
              <img src="<?= htmlspecialchars($job['logo']) ?: 'default-logo.png' ?>"
                   alt="Logo of <?= htmlspecialchars($job['company']) ?>"
                   style="width: 60px; height: 60px;"
                   class="me-3"
                   onerror="this.onerror=null;this.src='default-logo.png';">
              <div>
                <h5 class="card-title mb-1"><?= htmlspecialchars($job['title']) ?></h5>
                <p class="mb-1"><?= htmlspecialchars($job['company']) ?> – <?= htmlspecialchars($job['location']) ?></p>
                <a href="FORMS.php?job_id=<?= $job['id'] ?>" class="btn btn-primary btn-sm mt-2" target="_blank" aria-label="Apply for <?= htmlspecialchars($job['title']) ?> at <?= htmlspecialchars($job['company']) ?>">Apply</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<footer class="text-center py-4 bg-dark text-light mt-5">
  <p>&copy; 2025 SmartApplyHub. All rights reserved.</p>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
