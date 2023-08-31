<?php
session_start();
$user = $_SESSION['user'];
$_SESSION['table'] = 'users';
$users = include('database/show-users.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IMS Dashboard</title>
  <link rel="stylesheet" href="./css/register.css" />
  <script src="https://kit.fontawesome.com/43a9581a47.js" crossorigin="anonymous"></script>
</head>

<body>
  <div id="dashboard_main_container">
    <?php include('partials/sidebar.php') ?>
    <div class="dashboard_content_container" id="dashboard_content_container">
      <?php include('partials/top-navigation.php') ?>
      <div class="dashboard_content">
        <div class="dashboard_contain_main">
          <div class="row">
            <div class="column column-5">
              <h1 class="section_header"><i class="fa fa-plus" style="margin-right: 5px;"></i>Create User</h1>
              <div class="form_register">
                <form action="database/user-add.php" method="POST" class="addForm">
                  <div class="addFormDiv">
                    <div class="col-25">
                      <label for="">First Name:</label>
                    </div>
                    <div class="col-75">
                      <input type="text" class="addInput" id="first_name" name="first_name" value="<?php echo isset($_SESSION['data']['first_name']) ? $_SESSION['data']['first_name'] : ''; ?>">
                    </div>
                  </div>
                  <?php if (isset($_SESSION['errors']['first_name'])) {
                    echo '<p style="float: right;color: red;">' . $_SESSION['errors']['first_name'] . '</p>';
                    unset($_SESSION['errors']['first_name']);
                  } ?>
                  <div class="addFormDiv">
                    <div class="col-25">
                      <label for="">Last Name:</label>
                    </div>
                    <div class="col-75">
                      <input type="text" class="addInput" id="last_name" name="last_name" value="<?php echo isset($_SESSION['data']['last_name']) ? $_SESSION['data']['last_name'] : ''; ?>">
                    </div>
                  </div>
                  <?php if (isset($_SESSION['errors']['last_name'])) {
                    echo '<p style="float: right;color: red;">' . $_SESSION['errors']['last_name'] . '</p>';
                    unset($_SESSION['errors']['last_name']);
                  } ?>
                  <div class="addFormDiv">
                    <div class="col-25">
                      <label for="">Email:</label>
                    </div>
                    <div class="col-75">
                      <input type="text" class="addInput" id="email" name="email" value="<?php echo isset($_SESSION['data']['email']) ? $_SESSION['data']['email'] : ''; ?>">
                    </div>
                  </div>
                  <?php if (isset($_SESSION['errors']['email'])) {
                    echo '<p style="float: right;color: red;">' . $_SESSION['errors']['email'] . '</p>';
                    unset($_SESSION['errors']['email']);
                  } ?>
                  <div class="addFormDiv">
                    <div class="col-25">
                      <label for="">Password:</label>
                    </div>
                    <div class="col-75">
                      <input type="password" class="addInput" id="password" name="password" value="<?php echo isset($_SESSION['data']['password']) ? $_SESSION['data']['password'] : ''; ?>">
                    </div>
                  </div>
                  <?php if (isset($_SESSION['errors']['password'])) {
                    echo '<p style="float: right;color: red;">' . $_SESSION['errors']['password'] . '</p>';
                    unset($_SESSION['errors']['password']);
                  } ?>
                  <div class="addFormDiv">
                    <button type="submit" name="submit"><i class="fa fa-plus"></i>Add User</button>
                  </div>
                </form>
                <?php unset($_SESSION['data']); ?>
                <?php if (isset($_SESSION['response'])) {
                  $response_message = $_SESSION['response']['message'];
                  $is_success = $_SESSION['response']['success'];
                ?>
                  <div class="response-message">
                    <p class="<?= $is_success ? "responseMess_success" : "responseMess_error" ?>">
                      <?= $response_message ?>
                    </p>
                  </div>
                <?php unset($_SESSION['response']);
                  unset($_SESSION['errors']);
                } ?>
              </div>
            </div>
            <div class="column column-7">
              <h1 class="section_header"><i class="fa fa-list" style="margin-right: 5px;"></i>List of Users</h1>
              <div class="section_content">
                <div class="users">
                  <table>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($users as $index => $user) { ?>
                        <tr>
                          <td><?= $index + 1 ?></td>
                          <td><?= $user['first_name'] ?></td>
                          <td><?= $user['last_name'] ?></td>
                          <td><?= $user['email'] ?></td>
                          <td><?= date('F d,Y', strtotime($user['created_at'])) ?></td>
                          <td><?= date('F d,Y', strtotime($user['updated_at'])) ?></td>
                          <td>
                            <a href="" class="editUser"><i class="fa fa-pencil"></i>Edit</a>
                            <a href="" class="deleteUser" data-userid="<?= $user['id'] ?>" data-fname="<?= $user['first_name'] ?>" data-lname="<?= $user['last_name'] ?>">
                              <i class="fa fa-trash"></i>Delete</a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <p class="userCount"><?= count($users); ?> users</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="javascript/sidebar-hide.js"></script>
  <script src="javascript/jquery/jquery-3.7.1.min.js"></script>
  <script src="javascript/delete-user.js"></script>
</body>

</html>