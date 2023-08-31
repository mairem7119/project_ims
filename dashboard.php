<?php
session_start();
if (!isset($_SESSION['user'])) header('Location: login.php');
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IMS Dashboard</title>
  <link rel="stylesheet" href="./css/dashboard.css" />
  <script src="https://kit.fontawesome.com/43a9581a47.js" crossorigin="anonymous"></script>
</head>

<body>
  <div id="dashboard_main_container">
    <?php include('partials/sidebar.php') ?>
    <div class="dashboard_content_container" id="dashboard_content_container">
      <?php include('partials/top-navigation.php') ?>
      <div class="dashboard_content">
        <div class="dashboard_contain_main"></div>
      </div>
    </div>
  </div>

  <script src="javascript/sidebar-hide.js"></script>
</body>

</html>