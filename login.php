<?php
//start session
session_start();
$error_message = '';
if ($_POST) {
  include('database/connection.php');
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = 'SELECT * FROM users WHERE users.email ="' . $username . '" AND users.password ="' . $password . '"';
  $stmt = $conn->prepare($query);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $user = $stmt->fetchAll()[0];
    $_SESSION['user'] = $user;
    header('Location:dashboard.php');
  } else {
    $error_message = "Please make sure that username and password are correct.";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IMS Login</title>
  <link rel="stylesheet" href="./css/login.css" />
</head>

<body>
  <?php if (!empty($error_message)) { ?>
    <div class="errorMessage">
      <p>Error: <?php echo $error_message ?></p>
    </div>
  <?php } ?>
  <div class="container">
    <div class="loginHeader">
      <h1>IMS</h1>
      <h3>inventory management system</h3>
      <div class="underline"></div>
    </div>
    <div class="loginBody">
      <form action="login.php" method="POST">
        <div class="loginInput">
          <label for="">Username</label>
          <input type="text" placeholder="username" name="username" />
        </div>
        <div class="loginInput">
          <label for="">Password</label>
          <input type="password" placeholder="password" name="password" />
        </div>
        <div class="loginButton">
          <button>login</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>