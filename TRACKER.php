<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location: LOGIN.php');
    exit();
}

include('INCLUDES/db.php');
include('INCLUDES/navbar.php');

// Function to delete an application
function deletejob($conn, $job_id) {
    $stmt = $conn->prepare("DELETE FROM applications WHERE job_id = ?");
    $stmt->bind_param('i', $job_id);
    return $stmt->execute();
}

// Handle deletion request
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $job_id = intval($_POST['job_id']);
    if (deleteJob($conn, $job_id)) {
        $message = "Application deleted successfully.";
    } else {
        $message = "Error deleting application: " . $conn->error;
    }
}

// Fetch all applications
$sql = "SELECT * FROM applications";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOB TRACKER | SmartApplyHub</title>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="INCLUDES/navbar.css">
    <link rel="icon" href="imgs/LOGO.ico" type="image/x-icon">
    
    <!-- Internal Styles -->
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: "DM Sans", sans-serif;
            letter-spacing: -0.04em;
        }
        body {
            margin-top: 80px; 
            background-color: #f8f9fa;
        }
        .left {
            width: 95%;
            margin: auto;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="left">
    <h2><u>Job Application</u></h2>
    <?php if ($message): ?>
        <div class="alert <?= strpos($message, 'successfully') ? 'alert-success' : 'alert-danger' ?>">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>
    <p>Name: <?= htmlspecialchars($_SESSION['fullname']) ?></p>
    <p>Email ID: <?= htmlspecialchars($_SESSION['email']) ?></p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Company</th>
                <th>Designation</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['fullname']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['company']) ?></td>
                        <td><?= htmlspecialchars($row['job_description']) ?></td>
                        <td><?= htmlspecialchars($row['status']) ?></td>
                        <td>
                            <form method="POST" onsubmit="return confirm('Are you sure you want to delete this order?');">
                                <input type="hidden" name="job_id" value="<?= htmlspecialchars($row['job_id']) ?>">
                                <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No Applications found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php $conn->close(); ?>
