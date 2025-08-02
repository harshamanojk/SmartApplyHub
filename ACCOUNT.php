<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location: LOGIN.php');
    exit();
}
include('INCLUDES/db.php');
include('INCLUDES/navbar.php');

// Fetch current user
$uid = $_SESSION['uid'];
$getUserQuery = mysqli_query($conn, "SELECT * FROM users WHERE id = '$uid'");
$thisuser = mysqli_fetch_assoc($getUserQuery);

// Handle profile update
if (isset($_POST['updateAcount'])) {
    if ($_FILES['img']['name'] == "") {
        $upq = mysqli_query($conn, "UPDATE `users` SET `img` = '', `name`='" . $_POST['name'] . "', `contact`='" . $_POST['contact'] . "', `email`='" . $_POST['email'] . "' WHERE id = '" . $thisuser['id'] . "'");
        $msg = $upq ? "User updated successfully! _success" : "Unknown Error! _danger";
    } else {
        $target_dir = "imgs/profiles/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if ($check === false) {
            $msg = "File is not an image! _danger";
        } elseif (file_exists($target_file)) {
            $msg = "Sorry, file already exists! _danger";
        } elseif (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            $upq = mysqli_query($conn, "UPDATE `users` SET `img` = '$target_file', `name`='" . $_POST['name'] . "', `contact`='" . $_POST['contact'] . "', `email`='" . $_POST['email'] . "' WHERE id = '" . $thisuser['id'] . "'");
            if ($upq) {
                echo "<script>location.replace('ACCOUNT.php');</script>";
                exit();
            } else {
                $msg = "Unknown Error! _danger";
            }
        } else {
            $msg = "Sorry, there was an error uploading your file! _danger";
        }
    }
}

// Handle password change
if (isset($_POST['changePassword'])) {
    if (md5($_POST['old']) == $thisuser['password']) {
        if ($_POST['new'] == $_POST['confirm']) {
            $hash = md5($_POST['new']);
            $upq = mysqli_query($conn, "UPDATE `users` SET `password`='$hash' WHERE id = '" . $thisuser['id'] . "'");
            $msg = $upq ? "Password changed successfully! _success" : "Unknown Error! _danger";
        } else {
            $msg = "Passwords don't match! _danger";
        }
    } else {
        $msg = "Incorrect password! _danger";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ACCOUNT | SmartApplyHub</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="INCLUDES/navbar.css">
  <link rel="icon" href="imgs/LOGO.ico" type="image/x-icon">
  <style>
    body {
      padding: 0;
      margin: 0;
    }
    .delete-btn {
      background-color: #dc3545;
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .delete-btn:hover {
      background-color: #bb2d3b;
    }

    .main-content {
      margin-top: 80px;
    }
  </style>
</head>
<body>

<div class="container-fluid main-content">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="card m-3 shadow">
        <div class="card-body">
          <h4 class="text-center mb-3">Personal Details</h4>
          <form action="ACCOUNT.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-2">
                  <label for="img">Image</label>
                  <input type="file" name="img" onchange="showPreview(event);" accept="image/*" class="form-control">
                </div>
              </div>
              <div class="col-md-6 text-center">
                <img src="<?= isset($thisuser['img']) && $thisuser['img'] != '' ? $thisuser['img'] : 'imgs/profiles/user.png' ?>" id="profile-img" class="w-25 rounded-circle">
              </div>
              <div class="col-md-6">
                <div class="form-group mb-2">
                  <label>Name</label>
                  <input type="text" value="<?= $thisuser['name'] ?>" required name="name" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-2">
                  <label>Email</label>
                  <input type="email" value="<?= $thisuser['email'] ?>" required name="email" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-2">
                  <label>Contact</label>
                  <input type="text" value="<?= $thisuser['contact'] ?>" required name="contact" class="form-control">
                </div>
              </div>
              <div class="col-md-6 text-end">
                <div class="form-group mb-2">
                  <button name="updateAcount" type="submit" class="btn btn-primary mt-4">Update</button>
                </div>
              </div>
            </div>
          </form>

          <form action="DELETE_ACCOUNT.php" method="post" class="text-center mt-3">
            <input type="hidden" name="action" value="delete">
            <button type="submit" class="delete-btn">Delete My Account</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('INCLUDES/notify.php'); ?>

<script>
  function showPreview(event) {
    if (event.target.files.length > 0) {
      const src = URL.createObjectURL(event.target.files[0]);
      document.getElementById("profile-img").src = src;
    }
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
